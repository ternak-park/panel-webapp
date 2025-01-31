<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    }

    public function welcome(): View
    {
        return view('welcome');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
    
        $userAnyar = \DB::table('users')
            ->where('type', 0) // Filter hanya user dengan type = 0
            ->orderBy('id', 'desc') // Urutkan berdasarkan ID dari yang terbaru
            ->limit(5) // Batasi hasil maksimal 5 user
            ->get();

        // Siapkan data yang akan diteruskan ke tampilan
        $data = [
            'judul' => 'Dashboard',
            'main' => 'Ternak',
            'userAnyar' => $userAnyar, // Masukkan data userAnyar ke dalam array data
        ];

        // Return tampilan dengan data
        return view('admin.index', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function executiveHome(): View
    {
        // Ambil 5 user terbaru
        $userAnyar = \DB::table('users')
            ->where('type', 0) // Filter hanya user dengan type = 0
            ->orderBy('id', 'desc') // Urutkan berdasarkan ID dari yang terbaru
            ->limit(5) // Batasi hasil maksimal 5 user
            ->get();

        $data = [
            'main' => 'Executive',
            'judul' => 'Dashboard',
            'userAnyar' => $userAnyar, 
        ];

        return view('executive.index', $data);
    }

    public function redirectToHome()
    {
        $userType = auth()->user()->type;

        switch ($userType) {
            case 'admin':
                return redirect()->route('admin.home');
            case 'user':
                return redirect()->route('home');
            case 'executive':
                return redirect()->route('executive.home');
            default:
                return redirect()->route('not-found');
        }
    }
}
