<?php

namespace App\Exports;

use App\Models\TernakHewan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class HewanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TernakHewan::with([
            'detailTernakHewans',
            'jenis',
            'detailTernakHewans.program',
            'detailTernakHewans.status',
            'detailTernakHewans.kesehatan',
            'detailTernakHewans.ternakKandang',
            'detailTernakHewans.pemilik',
        ])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Tag Hewan',
            'Jenis Kelamin',
            'Jenis',
            'Tag Induk Betina',
            'Tag Induk Jantan',
            'Tag Anak',
            'Kandang',
            'Pemilik',
            'Tanggal Masuk',
            'Status',
            'Kesehatan',
            'Program',
            'Usia (bulan)',
            'Lama Hari di Peternakan',
            'Tanggal Terjual/Mati',
            'BB Masuk/Lahir (kg)',
            'BB Terbaru (kg)',
            'Tanggal Timbang Terbaru',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        $detail = $row->detailTernakHewans->first();
        
        return [
            $row->id,
            $row->tag_hewan,
            $row->sex_hewan,
            optional($row->jenis)->nama_jenis ?? '',
            $detail ? $detail->tag_induk_betina : '',
            $detail ? $detail->tag_induk_jantan : '',
            $detail ? $detail->tag_anak : '',
            $detail && $detail->ternakKandang ? $detail->ternakKandang->kode_kandang : '',
            $detail && $detail->pemilik ? $detail->pemilik->name : '',
            $detail ? $detail->tanggal_masuk : '',
            $detail && $detail->status ? $detail->status->nama_status : '',
            $detail && $detail->kesehatan ? $detail->kesehatan->nama_kesehatan : '',
            $detail && $detail->program ? $detail->program->nama_program : '',
            $detail ? $detail->ternak_usia : '',
            $detail ? $detail->lama_hari_dipeternakan : '',
            $detail ? $detail->tgl_terjual_mati : '',
            $detail ? $detail->bb_masuk_lahir : '',
            $detail ? $detail->bb_terbaru : '',
            $detail ? $detail->tgl_timbang_terbaru : '',
        ];
    }
}