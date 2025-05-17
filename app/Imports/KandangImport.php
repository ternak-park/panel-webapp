<?php

namespace App\Imports;

use App\Models\TernakKandang;
use App\Models\DetailTernakKandang;
use App\Models\Pemilik;
use App\Models\Petugas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\DB;

class KandangImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Get pemilik ID
        $pemilikId = $row['pemilik'];
        if (!is_numeric($pemilikId)) {
            $pemilik = Pemilik::where('nama_pemilik', $pemilikId)->first();
            $pemilikId = $pemilik ? $pemilik->id : null;
        }
        
        // Get petugas ID
        $petugasId = $row['petugas'] ?? null;
        if ($petugasId && !is_numeric($petugasId)) {
            $petugas = Petugas::where('nama_petugas', $petugasId)->first();
            $petugasId = $petugas ? $petugas->id : null;
        }
        
        // We need to create both TernakKandang and DetailTernakKandang
        // Since ToModel requires us to return a model, we'll handle the detail in a transaction
        DB::transaction(function() use ($row, $pemilikId, $petugasId) {
            // Create the main TernakKandang record
            $kandang = TernakKandang::create([
                'kode_kandang' => $row['kode_kandang'],
                'total_ternak_kandang' => $row['total_ternak_kandang'],
                'nama_pemilik_id' => $pemilikId,
            ]);
            
            // Create the DetailTernakKandang record
            DetailTernakKandang::create([
                'kode_kandang_id' => $kandang->id,
                'total_ternak' => $row['total_ternak'] ?? 0,
                'total_bb' => $row['total_bb'] ?? 0,
                'nama_petugas_id' => $petugasId,
                'nama_pemilik_id' => $pemilikId,
            ]);
        });
        
        // ToModel requires us to return a model, but we've already created our models
        // in the transaction. To avoid errors, we'll just return null.
        return null;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'kode_kandang' => 'required|unique:ternak_kandang,kode_kandang',
            'total_ternak_kandang' => 'required|numeric|min:0',
            'pemilik' => 'required',
            'total_ternak' => 'nullable|numeric|min:0',
            'total_bb' => 'nullable|numeric|min:0',
            'petugas' => 'nullable',
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'kode_kandang.required' => 'Kode kandang wajib diisi.',
            'kode_kandang.unique' => 'Kode kandang sudah digunakan.',
            'total_ternak_kandang.required' => 'Total ternak kandang wajib diisi.',
            'total_ternak_kandang.numeric' => 'Total ternak kandang harus berupa angka.',
            'total_ternak_kandang.min' => 'Total ternak kandang minimal 0.',
            'pemilik.required' => 'Pemilik kandang wajib diisi.',
            'total_ternak.numeric' => 'Total ternak harus berupa angka.',
            'total_ternak.min' => 'Total ternak minimal 0.',
            'total_bb.numeric' => 'Total BB harus berupa angka.',
            'total_bb.min' => 'Total BB minimal 0.',
        ];
    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 100;
    }
}