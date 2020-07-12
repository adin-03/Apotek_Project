<?php

namespace App\Http\Controllers\Apotek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apotek;
use Illuminate\Support\Facades\Auth;

class AuthApotekController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:apotek')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth-apotek.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('apotek')->attempt($credentials, $request->member)) {
            $user = Auth::guard('apotek')->user();
            return redirect()->route('apotek.dashboard')->with('success', 'selamat datang '.$user->nama.'');
        }


        return redirect()->back()->with('error', 'email dan password salah');
    }

    public function logout()
    {
        Auth::guard('apotek')->logout();
        return redirect()->route('show.apotek.login');
    }
}
