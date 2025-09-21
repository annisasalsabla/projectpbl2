@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <img src="{{ asset('storage/images/image.png') }}" class="rounded-circle" width="80" alt="Logo">
        <h5 class="mt-2">REGISTER</h5>
    </div>

    <div class="card p-4 shadow-sm mx-auto" style="max-width: 500px;">
        <h4 class="text-center">Daftar Akun Baru</h4>
        <p class="text-center text-muted">Buat akun untuk mulai berbelanja di <b>Poppy Suhaimi Craft</b></p>

        {{-- Pesan error umum --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <small>Silakan periksa kembali form Anda.</small>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Lengkap *</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                       placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email Address *</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       placeholder="contoh@email.com" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nomor HP *</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                           placeholder="081234567890" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Kota *</label>
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" 
                           placeholder="Masukkan kota" value="{{ old('city') }}">
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label>Password *</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Minimal 6 karakter">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password *</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" 
                       placeholder="Ulangi password">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-dark w-100">Daftar Sekarang</button>
        </form>

        <div class="text-center my-3">
            <small class="text-muted">atau daftar dengan</small>
        </div>

        <div class="d-grid mb-3">
            <a href="{{ route('login.google') }}" class="btn btn-outline-danger">
                <i class="fab fa-google me-2"></i> Daftar dengan Google
            </a>
        </div>

        <div class="text-center">
            <small>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></small>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">⬅ Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection