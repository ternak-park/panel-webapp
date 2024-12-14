<?php
namespace App\Http\Controllers\Embed;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TernakHewan;

class TrackerController extends Controller
{
    public function index()
    {
        // Total hewan ternak untuk menghitung persentase
        $totalHewan = TernakHewan::count();

        // Ambil jumlah jantan dan betina
        $data = TernakHewan::select('sex')
            ->selectRaw('COUNT(*) as jumlah')
            ->groupBy('sex')
            ->get();

        // Hitung persentase
        $result = $data->map(function ($item) use ($totalHewan) {
            $item->persentase = ($totalHewan > 0) ? ($item->jumlah / $totalHewan) * 100 : 0;
            return $item;
        });

        // Return data ke view
        return view('admin.hewan.index', ['data' => $result]);
    }
}
