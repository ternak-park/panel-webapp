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
        return TernakKandang::with(['pemilik', 'detailTernakKandangs.petugas'])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Kode Kandang',
            'Total Ternak Kandang',
            'Pemilik',
            'Total Ternak',
            'Total BB',
            'Petugas',
            'Tanggal Dibuat',
            'Terakhir Diperbarui'
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        $detail = $row->detailTernakKandangs->first();
        
        return [
            $row->kode_kandang,
            $row->total_ternak_kandang,
            $row->pemilik ? $row->pemilik->nama_pemilik : 'Tidak Ada Pemilik',
            $detail ? $detail->total_ternak : 0,
            $detail ? $detail->total_bb : 0,
            $detail && $detail->petugas ? $detail->petugas->nama_petugas : 'Tidak Ada Petugas',
            $row->created_at->format('d/m/Y H:i:s'),
            $row->updated_at->format('d/m/Y H:i:s')
        ];
    }
}