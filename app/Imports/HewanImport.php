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
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class HewanImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            DB::transaction(function () use ($row) {
                // Konversi tanggal ke format yang benar
                $tanggalMasuk = null;
                if (!empty($row['tanggal_masuk'])) {
                    try {
                        // Coba parse tanggal dengan Carbon - ini akan menangani berbagai format
                        $tanggalMasuk = $this->parseDate($row['tanggal_masuk']);
                    } catch (\Exception $e) {
                        // Jika gagal, gunakan tanggal hari ini
                        $tanggalMasuk = now()->format('Y-m-d');
                    }
                } else {
                    $tanggalMasuk = now()->format('Y-m-d');
                }

                // Cari ID berdasarkan nama
                $tipeId = $this->getTipeId($row['tipe'] ?? null);
                $statusId = $this->getStatusId($row['status'] ?? null);
                $kesehatanId = $this->getKesehatanId($row['kesehatan'] ?? null);
                $programId = $this->getProgramId($row['program'] ?? null);
                $kandangId = $this->getKandangId($row['kandang'] ?? null);
                $pemilikId = $this->getPemilikId($row['pemilik'] ?? null);

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
            });
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

    // Fungsi untuk mendapatkan ID berdasarkan nama
    private function getTipeId($nama)
    {
        if (empty($nama)) return null;
        $tipe = Tipe::where('nama_tipe', $nama)->first();
        return $tipe ? $tipe->id : null;
    }

    private function getStatusId($nama)
    {
        if (empty($nama)) return null;
        $status = Status::where('nama_status', $nama)->first();
        return $status ? $status->id : null;
    }

    private function getKesehatanId($nama)
    {
        if (empty($nama)) return null;
        $kesehatan = Kesehatan::where('nama_kesehatan', $nama)->first();
        return $kesehatan ? $kesehatan->id : null;
    }

    private function getProgramId($nama)
    {
        if (empty($nama)) return null;
        $program = Program::where('nama_program', $nama)->first();
        return $program ? $program->id : null;
    }

    private function getKandangId($kode)
    {
        if (empty($kode)) return null;
        $kandang = TernakKandang::where('kode_kandang', $kode)->first();
        return $kandang ? $kandang->id : null;
    }

    private function getPemilikId($nama)
    {
        if (empty($nama)) return null;
        $pemilik = User::where('name', $nama)->first();
        return $pemilik ? $pemilik->id : null;
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