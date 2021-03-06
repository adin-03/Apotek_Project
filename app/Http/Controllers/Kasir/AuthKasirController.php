<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthKasirController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:kasir')->except('logout');
    }

    public function showLoginForm(){
        return view('auth-kasir.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('kasir')->attempt($credentials, $request->member)) {
            $user = Auth::guard('kasir')->user();
            return redirect()->route('kasir.dashboard')->with('success', 'selamat datang '.$user->nama.'');
        }

        return redirect()->back()->withInput($request->only('email'))->with('error', 'email dan password salah');
    }

    public function logout()
    {
        Auth::guard('kasir')->logout();
        return redirect()->route('show.kasir.login');
    }
}
