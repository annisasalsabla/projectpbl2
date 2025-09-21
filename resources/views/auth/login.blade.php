@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <img src="{{ asset('storage/images/image.png') }}" class="rounded-circle" width="80" alt="Logo">
        <h5 class="mt-2">LOGIN</h5>
    </div>

    <div class="card p-4 shadow-sm mx-auto" style="max-width: 400px;">
        <h4 class="text-center">Masuk ke Akun Anda</h4>
        <p class="text-center text-muted">Masuk untuk melanjutkan berbelanja di <b>Poppy Suhaimi Craft</b></p>

        {{-- Pesan error umum --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <small>Silakan periksa kembali form Anda.</small>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       placeholder="contoh@email.com" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Masukkan password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-dark w-100">Masuk ke Akun</button>
        </form>

        <div class="text-center my-3">
            <small class="text-muted">atau masuk dengan</small>
        </div>

        <div class="d-grid mb-3">
            <a href="{{ route('login.google') }}" class="btn btn-outline-danger">
                <i class="fab fa-google me-2"></i> Masuk dengan Google
            </a>
        </div>

        <div class="text-center">
            <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">⬅ Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection