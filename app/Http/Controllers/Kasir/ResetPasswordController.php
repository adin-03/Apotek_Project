<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Kasir;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = 'travel/tdashboard';

    public function __construct()
    {
        $this->middleware('guest:kasir');
    }

    public function guard()
    {
        return Auth::guard('kasir');
    }

    public function broker()
    {
        return Password::broker('kasirs');
    }

    public function showResetForm(Request $request, $token  = null)
    {
        return view('auth-kasir.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function reset(Request $request)
    {
        $kasir = Kasir::where('email', $request->email)->first();
        $kasir->password = Hash::make($request->password);
        $kasir->setRememberToken(Str::random(60));
        $kasir->update();

        return redirect()->route('show.kasir.login')->with('success', 'berhasil reset password, silahkan login kembali');
    }
}
