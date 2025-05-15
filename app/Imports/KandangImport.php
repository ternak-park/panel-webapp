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
use Maatwebsite\Excel\Concerns\ToCollection;

class KandangImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Find or create pemilik
            $pemilik = Pemilik::firstOrCreate(
                ['nama' => $row['nama_pemilik']],
                ['nama' => $row['nama_pemilik']]
            );

            // Find or create petugas
            $petugas = Petugas::firstOrCreate(
                ['nama' => $row['nama_petugas']],
                ['nama' => $row['nama_petugas']]
            );

            // Create kandang
            $kandang = TernakKandang::create([
                'kode_kandang' => $row['kode_kandang'],
                'total_ternak_kandang' => $row['total_ternak'],
                'pemilik_id' => $pemilik->id,
                // Add other fields as needed
            ]);

            // Create detail kandang
            DetailTernakKandang::create([
                'kandang_id' => $kandang->id,
                'petugas_id' => $petugas->id,
                // Add other fields as needed
            ]);
        }
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'kode_kandang' => 'required|unique:ternak_kandang,kode_kandang',
            'total_ternak' => 'required|integer',
            'nama_pemilik' => 'required',
            'nama_petugas' => 'required',
        ];
    }
}
