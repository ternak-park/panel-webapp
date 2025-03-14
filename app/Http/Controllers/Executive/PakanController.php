<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'main' => 'Pakan',
            'judul' => 'Manajemen Pakan',
            'sub_judul' => 'Data Kandang'
        ];


        return view('executive.pakan.index', $data);
    }
}
