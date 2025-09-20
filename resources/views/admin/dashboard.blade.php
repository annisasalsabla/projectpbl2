@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="content-card welcome-card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1">Selamat Datang, {{ $user->name }}!</h3>
                        <p class="mb-0 opacity-75">Senang melihat Anda kembali di admin panel PICRAFT</p>
                    </div>
                    <div class="display-4 opacity-50">
                        <i class="bi bi-emoji-smile"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="content-card text-center">
                <div class="mb-3">
                    <i class="bi bi-box-seam display-4" style="color: #800020;"></i>
                </div>
                <h5>Total Produk</h5>
                <h3 style="color: #800020;">42</h3>
                <p class="text-muted">Item tersedia</p>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="content-card text-center">
                <div class="mb-3">
                    <i class="bi bi-cart-check display-4 text-success"></i>
                </div>
                <h5>Pesanan</h5>
                <h3 class="text-success">18</h3>
                <p class="text-muted">Pesanan bulan ini</p>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="content-card text-center">
                <div class="mb-3">
                    <i class="bi bi-currency-dollar display-4 text-info"></i>
                </div>
                <h5>Pendapatan</h5>
                <h3 class="text-info">Rp 5.2Jt</h3>
                <p class="text-muted">Bulan ini</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="content-card">
                <h5 class="mb-4" style="color: #800020;">Aktivitas Terbaru</h5>
                <div class="list-group">
                    <div class="list-group-item border-0 d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-plus-circle-fill text-success me-2"></i>
                            <span>Produk baru ditambahkan</span>
                            <small class="text-muted d-block">Gelang Rajut Modern - 10 menit lalu</small>
                        </div>
                        <span class="badge bg-light text-dark">Produk</span>
                    </div>
                    <div class="list-group-item border-0 d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-cart-check me-2" style="color: #800020;"></i>
                            <span>Pesanan baru diterima</span>
                            <small class="text-muted d-block">Order #PS2024-012 - 1 jam lalu</small>
                        </div>
                        <span class="badge bg-light text-dark">Pesanan</span>
                    </div>
                    <div class="list-group-item border-0 d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-check-circle-fill text-info me-2"></i>
                            <span>Pembayaran dikonfirmasi</span>
                            <small class="text-muted d-block">Order #PS2024-008 - 3 jam lalu</small>
                        </div>
                        <span class="badge bg-light text-dark">Keuangan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection