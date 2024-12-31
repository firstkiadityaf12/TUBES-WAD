<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Menampilkan form login
     */
    public function showLoginForm()
    {
        return view('login'); // Mengarahkan ke login.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = DB::table('loginregister')->where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::loginUsingId($user->id);
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Berhasil login!');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:loginregister,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::table('loginregister')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
