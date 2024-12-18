<?php

namespace App\Exports;

use App\Models\Tipe;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TipeExport implements FromView, WithStyles, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('admin.tipe.export.excel', [
            'tipe' => Tipe::all()
        ]);

        // return Excel::download(new TipeExport, 'tipe_' . Carbon::now()->format('Y-m-d_H-i-s') . '.xlsx');

    }

}
