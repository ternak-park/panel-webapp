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
        $this->middleware('auth');
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
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view(view: 'admin.index');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petugasHome(): View
    {
        return view('petugas.index');
    }

    public function redirectToHome()
    {
        $userType = auth()->user()->type;

        switch ($userType) {
            case 'admin':
                return redirect()->route('admin.home');
            case 'user':
                return redirect()->route('home');
            case 'petugas':
                return redirect()->route('petugas.home');
            default:
                return redirect()->route('not-found');
        }
    }
}
