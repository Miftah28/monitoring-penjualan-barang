<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $credentials = [
            'email' => $input['email'],
            'password' => $input['password'],
        ];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
                if (auth()->user()->role == 'penjual') {
                    alert()->toast('Welcome <b>' . $user->penjual->name . '</b>, you have been successfully logged in!', 'success')->position('top-end');
                    return redirect()->route('home');
            } else {
                // Cek apakah username ada dalam database
                $user = User::where('email', $input['email'])->first();
                if ($user) {
                    alert()->toast('Email dan Password anda salah', 'error')->position('top-end');
                } else {
                    alert()->toast('Akun Anda Tidak Ditemukan, Silakan Anda Daftar Dahulu', 'error')->position('top-end');
                }
                return redirect()->route('login');
            }
        }
    }
}
