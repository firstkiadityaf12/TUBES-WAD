@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-black text-center">Login</h2>
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label" style="color: black;">Email</label>
            <input type="email" name="email" class="form-control" style="color: black;" required>
            <small class="form-text text-muted">Masukkan email yang sudah terdaftar.</small> <!-- Keterangan tambahan -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: black;">Password</label>
            <input type="password" name="password" class="form-control" style="color: black;" required>
            <small class="form-text text-muted">Masukkan password yang terkait dengan akun Anda.</small> <!-- Keterangan tambahan -->
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3" style="color: black;">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
</div>
@endsection
