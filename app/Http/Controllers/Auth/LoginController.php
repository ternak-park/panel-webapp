<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;// Import SweetAlert facade

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle the login process with SweetAlert for success/error.
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        // Validate the email or username and password
        $this->validate($request, [
            'username_or_email' => 'required',
            'password' => 'required',
        ]);
        $field = filter_var($input['username_or_email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt([$field => $input['username_or_email'], 'password' => $input['password']])) {


            if (auth()->user()->type == 'admin') {
                Session::flash('success', 'Login berhasil!');
                return redirect()->route('admin.home');
            } else if (auth()->user()->type == 'executive') {
                Session::flash('success', 'Login berhasil!');
                return redirect()->route('executive.home');
            } else {
                Session::flash('success', 'Login berhasil!');
                return redirect()->route('home');
            }
        } else {
            Session::flash('error', 'Username atau password salah!');

            return redirect()->route('login');
        }
    }
}
