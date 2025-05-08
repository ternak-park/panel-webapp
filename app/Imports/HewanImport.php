<?php

namespace App\Imports;

use App\Models\Kesehatan;
use App\Models\Program;
use App\Models\Status;
use App\Models\TernakHewan;
use App\Models\TernakKandang;
use App\Models\Tipe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class HewanImport implements ToCollection, WithHeadingRow, WithValidation
{
    // Untuk menyimpan error yang terjadi selama import
    protected $errors = [];
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            try {
                DB::transaction(function () use ($row, $index) {
                    // Konversi tanggal ke format yang benar
                    $tanggalMasuk = null;
                    if (!empty($row['tanggal_masuk'])) {
                        try {
                            // Coba parse tanggal dengan Carbon - ini akan menangani berbagai format
                            $tanggalMasuk = $this->parseDate($row['tanggal_masuk']);
                        } catch (\Exception $e) {
                            // Jika gagal, gunakan tanggal hari ini
                            $tanggalMasuk = now()->format('Y-m-d');
                            $this->logError($index, "Format tanggal tidak valid: {$row['tanggal_masuk']}, menggunakan tanggal hari ini");
                        }
                    } else {
                        $tanggalMasuk = now()->format('Y-m-d');
                    }

                    // Cari ID berdasarkan nama atau ID
                    $tipeId = $this->getFlexibleId('tipe', $row['tipe'] ?? null, $index);
                    $statusId = $this->getFlexibleId('status', $row['status'] ?? null, $index);
                    $kesehatanId = $this->getFlexibleId('kesehatan', $row['kesehatan'] ?? null, $index);
                    $programId = $this->getFlexibleId('program', $row['program'] ?? null, $index);
                    $kandangId = $this->getFlexibleId('kandang', $row['kandang'] ?? null, $index);
                    $pemilikId = $this->getFlexibleId('pemilik', $row['pemilik'] ?? null, $index);

                    // Insert ke tabel ternak_hewan
                    $hewanId = DB::table('ternak_hewan')->insertGetId([
                        'tag' => $row['tag'],
                        'jenis' => $row['jenis'] ?? 'Domba',
                        'sex' => $row['sex'],
                        'ternak_tipe' => $tipeId,
                        'gambar_hewan' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Insert ke tabel ternak_detail
                    DB::table('ternak_detail')->insert([
                        'ternak_tag' => $row['tag'],
                        'ternak_induk' => $row['ternak_induk'] ?? null,
                        'sex' => $row['sex'],
                        'tanggal_masuk' => $tanggalMasuk,
                        'ternak_status' => $statusId,
                        'ternak_tipe' => $tipeId,
                        'ternak_kesehatan' => $kesehatanId,
                        'ternak_program' => $programId,
                        'ternak_kandang' => $kandangId,
                        'pemilik' => $pemilikId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    
                    // Log sukses
                    Log::info("Berhasil import data hewan: {$row['tag']}");
                });
            } catch (\Exception $e) {
                // Tangkap error dan simpan untuk ditampilkan nanti
                $this->errors[] = "Baris " . ($index + 2) . ": " . $e->getMessage();
                Log::error("Error import data hewan baris " . ($index + 2) . ": " . $e->getMessage());
            }
        }
        
        // Jika ada error, throw exception dengan semua error
        if (count($this->errors) > 0) {
            throw new \Exception(implode("<br>", $this->errors));
        }
    }

    /**
     * Parse berbagai format tanggal dan konversi ke format Y-m-d
     */
    private function parseDate($dateString)
    {
        // Jika sudah dalam format Y-m-d, langsung kembalikan
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateString)) {
            return $dateString;
        }
        
        // Coba parse dengan Carbon
        try {
            // Untuk format MM/DD/YYYY atau DD/MM/YYYY
            if (strpos($dateString, '/') !== false) {
                $parts = explode('/', $dateString);
                
                // Jika format adalah MM/DD/YYYY (format US)
                if (count($parts) === 3 && $parts[0] <= 12) {
                    // Coba deteksi apakah format MM/DD/YYYY atau DD/MM/YYYY
                    if ($parts[1] <= 12) {
                        // Bisa jadi keduanya, gunakan format default Carbon
                        return Carbon::parse($dateString)->format('Y-m-d');
                    } else {
                        // Pasti format MM/DD/YYYY karena bulan <= 12 dan hari > 12
                        return Carbon::createFromFormat('m/d/Y', $dateString)->format('Y-m-d');
                    }
                } 
                // Jika format adalah DD/MM/YYYY (format non-US)
                else if (count($parts) === 3 && $parts[0] > 12 && $parts[0] <= 31) {
                    return Carbon::createFromFormat('d/m/Y', $dateString)->format('Y-m-d');
                }
            }
            
            // Untuk format dengan tanda hubung (-)
            if (strpos($dateString, '-') !== false) {
                $parts = explode('-', $dateString);
                
                // Jika format adalah DD-MM-YYYY
                if (count($parts) === 3 && strlen($parts[0]) <= 2 && strlen($parts[2]) === 4) {
                    return Carbon::createFromFormat('d-m-Y', $dateString)->format('Y-m-d');
                }
            }
            
            // Jika tidak ada format khusus yang cocok, gunakan Carbon parse default
            return Carbon::parse($dateString)->format('Y-m-d');
        } catch (\Exception $e) {
            // Jika semua gagal, gunakan tanggal hari ini
            return now()->format('Y-m-d');
        }
    }

    /**
     * Mendapatkan ID berdasarkan input fleksibel (bisa ID atau nama)
     */
    private function getFlexibleId($type, $value, $rowIndex)
    {
        if (empty($value)) return null;
        
        // Jika input adalah angka, coba cari sebagai ID
        if (is_numeric($value)) {
            $id = $this->getIdByNumericValue($type, $value);
            if ($id !== null) {
                return $id;
            }
        }
        
        // Jika bukan angka atau ID tidak ditemukan, cari berdasarkan nama
        $id = $this->getIdByName($type, $value);
        
        // Jika masih tidak ditemukan, log error
        if ($id === null) {
            $this->logError($rowIndex, "Data $type '$value' tidak ditemukan di database");
        }
        
        return $id;
    }
    
    /**
     * Mencari ID berdasarkan nilai numerik
     */
    private function getIdByNumericValue($type, $value)
    {
        switch ($type) {
            case 'tipe':
                return Tipe::where('id', $value)->exists() ? $value : null;
            case 'status':
                return Status::where('id', $value)->exists() ? $value : null;
            case 'kesehatan':
                return Kesehatan::where('id', $value)->exists() ? $value : null;
            case 'program':
                return Program::where('id', $value)->exists() ? $value : null;
            case 'kandang':
                return TernakKandang::where('id', $value)->exists() ? $value : null;
            case 'pemilik':
                return User::where('id', $value)->exists() ? $value : null;
            default:
                return null;
        }
    }
    
    /**
     * Mencari ID berdasarkan nama
     */
    private function getIdByName($type, $name)
    {
        switch ($type) {
            case 'tipe':
                $tipe = Tipe::where('nama_tipe', $name)->first();
                return $tipe ? $tipe->id : null;
            case 'status':
                $status = Status::where('nama_status', $name)->first();
                return $status ? $status->id : null;
            case 'kesehatan':
                $kesehatan = Kesehatan::where('nama_kesehatan', $name)->first();
                return $kesehatan ? $kesehatan->id : null;
            case 'program':
                $program = Program::where('nama_program', $name)->first();
                return $program ? $program->id : null;
            case 'kandang':
                $kandang = TernakKandang::where('kode_kandang', $name)->first();
                return $kandang ? $kandang->id : null;
            case 'pemilik':
                $pemilik = User::where('name', $name)->first();
                return $pemilik ? $pemilik->id : null;
            default:
                return null;
        }
    }
    
    /**
     * Log error untuk baris tertentu
     */
    private function logError($rowIndex, $message)
    {
        $this->errors[] = "Baris " . ($rowIndex + 2) . ": " . $message;
        Log::warning("Import warning baris " . ($rowIndex + 2) . ": " . $message);
    }

    public function rules(): array
    {
        return [
            'tag' => 'required|string|unique:ternak_hewan,tag',
            'sex' => 'required|in:Jantan,Betina',
            'jenis' => 'nullable|in:Domba,Kambing',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'tag.required' => 'Tag ternak harus diisi.',
            'tag.unique' => 'Tag ternak sudah ada dalam database.',
            'sex.required' => 'Jenis kelamin ternak harus diisi.',
            'sex.in' => 'Jenis kelamin harus Jantan atau Betina.',
            'jenis.in' => 'Jenis hewan harus Domba atau Kambing.',
        ];
    }
}