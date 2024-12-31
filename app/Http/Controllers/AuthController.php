<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session
            return redirect()->route('dashboard.index')->with('success', 'Berhasil login!');
        }
    
        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();

        // $user = DB::table('loginregister')->where('email', $request->email)->first();

        // if ($user && Hash::check($request->password, $user->password)) {
        // Auth::loginUsingId($user->id);
        // return redirect()->route('dashboard.index')->with('success', 'Berhasil login!');
        // }

        // return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Menampilkan form registrasi
     */
    public function showRegisterForm()
    {
        return view('register'); // Mengarahkan ke register.blade.php
    }

    /**
     * Proses registrasi user
     */
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
