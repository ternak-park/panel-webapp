<?php

namespace App\Imports;

use App\Models\Jenis;
use App\Models\Kesehatan;
use App\Models\Program;
use App\Models\Status;
use App\Models\TernakHewan;
use App\Models\DetailTernakHewan;
use App\Models\TernakKandang;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HewanImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        DB::beginTransaction();
        
        try {
            foreach ($rows as $row) {
                // Validate required fields are present
                if (empty($row['tag']) || empty($row['sex_hewan'])) {
                    continue; // Skip this row
                }
                
                // Format date correctly
                $tanggalMasuk = $this->parseDate($row['tanggal_masuk'] ?? now());
                
                // First, create the TernakHewan record
                $ternakHewan = TernakHewan::create([
                    'tag_hewan' => $row['tag'],
                    'sex_hewan' => $row['sex_hewan'],
                    'ternak_jenis_id' => $this->resolveJenis($row['jenis'] ?? null),
                    'gambar_hewan' => null, // No image from CSV import
                ]);
                
                // Now create the DetailTernakHewan record with the TernakHewan id
                DetailTernakHewan::create([
                    'ternak_tag' => $ternakHewan->id, // Use the ID rather than tag_hewan
                    'tag_induk_betina' => $row['ternak_induk_betina'] ?? null,
                    'tag_induk_jantan' => $row['ternak_induk_jantan'] ?? null,
                    'tag_anak' => $row['tag_anak'] ?? null,
                    'ternak_kandang' => $this->resolveKandang($row['kandang'] ?? null),
                    'nama_pemilik' => $this->resolvePemilik($row['pemilik'] ?? null),
                    'tanggal_masuk' => $tanggalMasuk,
                    'ternak_sex' => $row['sex_hewan'],
                    'ternak_jenis' => $this->resolveJenis($row['jenis'] ?? null),
                    'ternak_kesehatan' => $this->resolveKesehatan($row['kesehatan'] ?? null),
                    'ternak_program' => $this->resolveProgram($row['program'] ?? null),
                    'ternak_status' => $this->resolveStatus($row['status'] ?? null),
                    'ternak_usia' => $row['ternak_usia'] ?? '0',
                    'lama_hari_dipeternakan' => $row['lama_hari_dipeternakan'] ?? 0,
                    'tgl_terjual_mati' => isset($row['tgl_terjual_mati']) ? $this->parseDate($row['tgl_terjual_mati']) : null,
                    'ternak_fisik' => 1, // Default value
                    'bb_masuk_lahir' => $row['bb_masuk_lahir'] ?? 0,
                    'bb_terbaru' => $row['bb_terbaru'] ?? 0,
                    'tgl_timbang_terbaru' => isset($row['tgl_timbang_terbaru']) ? $this->parseDate($row['tgl_timbang_terbaru']) : now(),
                ]);
            }
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    
    /**
     * Parse various date formats
     */
    private function parseDate($dateString)
    {
        if (empty($dateString)) {
            return now();
        }
        
        try {
            // Try to parse various date formats
            return Carbon::parse($dateString);
        } catch (\Exception $e) {
            // Default to current date if parsing fails
            return now();
        }
    }
    
    /**
     * Resolve Jenis ID from name or ID
     */
    private function resolveJenis($input)
    {
        if (empty($input)) {
            return null;
        }
        
        // If input is numeric, treat as ID
        if (is_numeric($input)) {
            return $input;
        }
        
        // Otherwise look up by name
        $jenis = Jenis::where('nama_jenis', $input)->first();
        return $jenis ? $jenis->id : null;
    }
    
    /**
     * Resolve Status ID from name or ID
     */
    private function resolveStatus($input)
    {
        if (empty($input)) {
            return null;
        }
        
        if (is_numeric($input)) {
            return $input;
        }
        
        $status = Status::where('nama_status', $input)->first();
        return $status ? $status->id : null;
    }
    
    /**
     * Resolve Kesehatan ID from name or ID
     */
    private function resolveKesehatan($input)
    {
        if (empty($input)) {
            return null;
        }
        
        if (is_numeric($input)) {
            return $input;
        }
        
        $kesehatan = Kesehatan::where('nama_kesehatan', $input)->first();
        return $kesehatan ? $kesehatan->id : null;
    }
    
    /**
     * Resolve Program ID from name or ID
     */
    private function resolveProgram($input)
    {
        if (empty($input)) {
            return null;
        }
        
        if (is_numeric($input)) {
            return $input;
        }
        
        $program = Program::where('nama_program', $input)->first();
        return $program ? $program->id : null;
    }
    
    /**
     * Resolve Kandang ID from code or ID
     */
    private function resolveKandang($input)
    {
        if (empty($input)) {
            return null;
        }
        
        if (is_numeric($input)) {
            return $input;
        }
        
        $kandang = TernakKandang::where('kode_kandang', $input)->first();
        return $kandang ? $kandang->id : null;
    }
    
    /**
     * Resolve Pemilik ID from name or ID
     */
    private function resolvePemilik($input)
    {
        if (empty($input)) {
            return null;
        }
        
        if (is_numeric($input)) {
            return $input;
        }
        
        $pemilik = User::where('name', $input)->first();
        return $pemilik ? $pemilik->id : null;
    }
    
    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            '*.tag' => 'required|string|max:255',
            '*.sex_hewan' => 'required|in:Jantan,Betina',
        ];
    }
}