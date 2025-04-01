<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        $remember = $request->has('remember') ? true : false;

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        } else if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ], $remember)) {

            $request->session()->regenerate();
            Session::flash('success', 'Selamat datang di Helpdesk!');
            return redirect('/dashboard');
        } else {
            Session::flash('error', "Login gagal. Pastikan Anda memasukkan identitas dengan benar.");
            return redirect('/login')->withErrors($validator)
                ->withInput();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flash('logout', 'Anda telah berhasil logout.');

        return redirect('/login');
    }
}
