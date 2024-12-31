@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-black text-center">Register</h2>
    <form action="{{ route('register.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label" style="color: black;">Nama</label>
            <input type="text" name="name" class="form-control" style="color: black;" required>
            <small class="form-text text-muted">Masukkan nama lengkap Anda.</small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label" style="color: black;">Email</label>
            <input type="email" name="email" class="form-control" style="color: black;" required>
            <small class="form-text text-muted">Gunakan email yang valid untuk akun Anda.</small> <!-- Keterangan tambahan -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: black;">Password</label>
            <input type="password" name="password" class="form-control" style="color: black;" required>
            <small class="form-text text-muted">Password harus terdiri dari minimal 8 karakter.</small> <!-- Keterangan tambahan -->
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label" style="color: black;">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" style="color: black;" required>
            <small class="form-text text-muted">Masukkan kembali password Anda untuk konfirmasi.</small> <!-- Keterangan tambahan -->
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
    <p class="mt-3" style="color: black;">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</div>
@endsection
