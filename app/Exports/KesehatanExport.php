<?php

namespace App\Exports;

use App\Models\Kesehatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KesehatanExport implements FromView, WithStyles, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('admin.kesehatan.export.excel', [
            'kesehatan' => Kesehatan::all()
        ]);

        // return Excel::download(new KesehatanExport, 'kesehatan_' . Carbon::now()->format('Y-m-d_H-i-s') . '.xlsx');

    }

}
