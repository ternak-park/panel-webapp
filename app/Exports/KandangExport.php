<?php

namespace App\Exports;

use App\Models\TernakKandang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KandangExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TernakKandang::with(['pemilik', 'detail_kandang.petugas'])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Kode Kandang',
            'Total Ternak',
            'Nama Pemilik',
            'Nama Petugas',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->kode_kandang,
            $row->total_ternak_kandang,
            $row->pemilik->nama ?? 'N/A',
            $row->detail_kandang->petugas->nama ?? 'N/A',
        ];
    }
}
