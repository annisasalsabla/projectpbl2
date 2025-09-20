@extends('layouts.app')

@section('styles')
<style>
    .text-maroon {
        color: #8B0000 !important;
    }
    
    .btn-outline-maroon {
        border-color: #8B0000;
        color: #8B0000;
    }
    
    .btn-outline-maroon:hover {
        background-color: #8B0000;
        color: white;
    }
    
    .about-hero {
        background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 245, 225, 0.9)), 
                    url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%23f8f9fa"/><path d="M0,0 L100,100 M100,0 L0,100" stroke="%23e9ecef" stroke-width="1"/></svg>');
        background-size: cover;
        padding: 80px 0;
        border-radius: 15px;
        margin-bottom: 50px;
    }
    
    .passion-section {
        background: linear-gradient(to right, #fff 50%, #f8f9fa 50%);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 50px;
    }
    
    .passion-content {
        padding: 40px;
    }
    
    .passion-image {
        height: 100%;
        min-height: 400px;
        background: url("{{ asset('storage/images/image.png') }}") center/cover no-repeat;
        position: relative;
    }
    
    .passion-image:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(139,0,0,0.1), rgba(139,0,0,0.05));
    }
    
    .category-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        height: 100%;
    }
    
    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(139,0,0,0.15);
    }
    
    .category-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 2rem;
    }
    
    .value-card {
        border: none;
        border-radius: 15px;
        padding: 30px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        height: 100%;
        background: white;
    }
    
    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139,0,0,0.12);
    }
    
    .contact-info {
        background: linear-gradient(135deg, #FFF5E1, #faf0dc);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .cta-section {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border-radius: 15px;
        padding: 50px 30px;
        text-align: center;
    }
    
    @media (max-width: 768px) {
        .passion-section {
            background: #fff;
        }
        
        .passion-image {
            min-height: 300px;
        }
    }
</style>
@endsection

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <div class="about-hero text-center mb-5">
        <span class="badge bg-light text-dark px-3 py-2 mb-3">TENTANG KAMI</span>
        <h2 class="fw-bold display-5 mb-3">Cerita di Balik <br> <span class="text-maroon">Poppy Suhaimi Craft</span></h2>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Perjalanan kami dimulai pada tahun 2018 dengan visi menciptakan kerajinan tangan berkualitas tinggi 
            yang memadukan keindahan tradisional dengan kebutuhan modern.
        </p>
    </div>

    {{-- Dari Passion Menjadi Bisnis --}}
    <div class="row passion-section mb-5">
        <div class="col-lg-6 passion-content">
            <h3 class="fw-bold text-maroon mb-4">Dari Passion Menjadi Bisnis</h3>
            <p class="mb-4">
                Poppy Suhaimi Craft lahir dari kecintaan terhadap seni kerajinan tangan tradisional. 
                Berlokasi di Kota Padang, Sumatera Barat, kami memulai perjalanan dengan fokus pada 
                tiga kategori produk utama: tas handmade, tempat tumbler, dan kopiah tradisional.
            </p>
            <p class="mb-4">
                Setiap produk yang kami hasilkan merupakan karya seni yang dibuat dengan penuh dedikasi, 
                menggunakan bahan berkualitas tinggi dan teknik kerajinan yang telah diwariskan turun-temurun.
            </p>
            <p>
                Dengan dukungan teknologi modern melalui platform e-commerce ini, kami berkomitmen 
                untuk memberikan pengalaman berbelanja yang mudah dan memuaskan bagi semua pelanggan 
                di seluruh Indonesia.
            </p>
        </div>
        <div class="col-lg-6 p-0">
            <div class="passion-image"></div>
        </div>
    </div>

    {{-- Nilai-Nilai Kami --}}
    <div class="mb-5">
        <h3 class="text-center fw-bold mb-4 display-6">Nilai-Nilai Kami</h3>
        <p class="text-center text-muted mb-5 lead">Prinsip yang memandu setiap langkah perjalanan kami</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="value-card text-center">
                    <div class="category-icon">
                        <i class="fas fa-hands"></i>
                    </div>
                    <h5 class="fw-bold">Handmade Premium</h5>
                    <p class="text-muted">Setiap produk dibuat dengan tangan oleh pengrajin berpengalaman dengan perhatian pada setiap detail.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card text-center">
                    <div class="category-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h5 class="fw-bold">Kualitas Terjamin</h5>
                    <p class="text-muted">Menggunakan bahan berkualitas tinggi dan proses kontrol kualitas yang ketat untuk kepuasan pelanggan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card text-center">
                    <div class="category-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h5 class="fw-bold">Desain Autentik</h5>
                    <p class="text-muted">Memadukan keindahan tradisional Indonesia dengan sentuhan modern yang timeless dan elegan.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Kategori Produk Kami --}}
    <div class="mb-5">
        <h3 class="text-center fw-bold mb-4 display-6">Kategori Produk Kami</h3>
        <p class="text-center text-muted mb-5 lead">Tiga kategori utama yang menjadi keahlian kami</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="category-card text-center p-4">
                    <div class="category-icon">
                        <i class="fas fa-child"></i>
                    </div>
                    <h5 class="fw-bold">Rajutan untuk Anak</h5>
                    <p class="text-muted">Produk rajutan khusus anak-anak dengan desain lucu, warna cerah, dan bahan yang aman untuk kulit sensitif.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="category-card text-center p-4">
                    <div class="category-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h5 class="fw-bold">Rajutan untuk Remaja</h5>
                    <p class="text-muted">Koleksi trendy dan fashionable untuk remaja dengan desain kekinian yang cocok untuk gaya sehari-hari.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="category-card text-center p-4">
                    <div class="category-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5 class="fw-bold">Rajutan untuk Dewasa</h5>
                    <p class="text-muted">Produk rajutan elegan dan sophisticated untuk dewasa dengan kualitas premium dan desain yang timeless.</p>
                </div>
            </div>
        </div>
    </div>



    {{-- CTA --}}
    <div class="cta-section my-5">
        <h3 class="fw-bold mb-3">Mulai Berbelanja Sekarang</h3>
        <p class="mb-4 mx-auto" style="max-width: 600px; opacity: 0.9;">
            Temukan koleksi kerajinan tangan terbaik kami dan rasakan pengalaman berbelanja yang memuaskan dengan kualitas produk yang terjamin.
        </p>
        <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">
            Daftar Sekarang <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>

</div>
@endsection