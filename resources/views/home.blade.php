@extends('layouts.app')

@section('styles')
<style>
    /* Custom button */
    .btn-maroon {
        background: var(--maroon);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-maroon:hover {
        background: var(--maroon-dark);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(139, 0, 0, 0.15);
    }
    
    .btn-outline-maroon {
        border: 2px solid var(--maroon);
        color: var(--maroon);
        padding: 8px 23px;
        border-radius: 30px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-outline-maroon:hover {
        background: var(--maroon);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(139, 0, 0, 0.15);
    }
    
    /* Hero Section */
    .hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, var(--cream) 0%, #fff 100%);
        position: relative;
        overflow: hidden;
    }
    
    .hero:before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(139, 0, 0, 0.05);
        top: -150px;
        right: -150px;
    }
    
    .hero:after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(212, 175, 55, 0.05);
        bottom: -100px;
        left: -100px;
    }
    
    .hero .badge {
        font-weight: 500;
        letter-spacing: 1.5px;
        padding: 8px 15px;
        border-radius: 30px;
        background: linear-gradient(45deg, var(--maroon-light), var(--maroon)) !important;
        color: white;
    }
    
    .hero h1 {
        font-size: 3.2rem;
        font-weight: 800;
        margin: 20px 0;
        line-height: 1.2;
        color: var(--maroon-dark);
    }
    
    .hero h1 span.poppy {
        color: var(--maroon);
    }
    
    .hero h1 span.craft {
        color: #000;
    }
    
    .hero p {
        font-size: 1.15rem;
        margin-bottom: 30px;
        color: #666;
        max-width: 90%;
    }
    
    .hero-cta {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .hero-img-container {
        position: relative;
        z-index: 2;
    }
     .hero-img-container img {
        /* ----- PERUBAHAN ADA DI SINI ----- */
        max-width: 80%; /* Mengurangi lebar gambar menjadi 80% dari container-nya */
        height: auto; /* Memastikan rasio aspek tetap terjaga */
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(139, 0, 0, 0.1);
        transition: all 0.5s ease;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .hero h1 {
            font-size: 2.6rem;
        }
        
        .hero-img-container {
            margin-top: 40px;
        }
    }
    
    @media (max-width: 768px) {
        .hero {
            padding: 80px 0 60px;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 2.2rem;
        }
        
        .hero p {
            max-width: 100%;
            font-size: 1rem;
        }
        
        .hero-cta {
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 animate-fadeInUp">
                <span class="badge mb-3">HANDMADE PREMIUM</span>
                <h1><span class="poppy">Poppy Suhaimi</span> <span class="craft">Craft</span></h1>
                <p>Produk rajut handmade lokal, memadukan tradisi dengan tren masa kini. Dibuat dengan penuh cinta oleh pengrajin UMKM untuk Anda.</p>
                <div class="hero-cta">
                    <a href="#" class="btn btn-maroon btn-lg">Jelajahi Koleksi</a>
                   <a href="{{ route('tentang') }}" class="btn btn-outline-maroon btn-lg">Tentang Kami</a>
                </div>
            </div>
            <div class="col-md-6 text-center hero-img-container animate-fadeInUp" style="animation-delay: 0.3s">
                <img src="{{ asset('storage/images/poppy.png') }}" 
                     class="img-fluid rounded" 
                     alt="Poppy Suhaimi Craft">
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Script khusus untuk halaman home jika diperlukan
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Home page loaded');
    });
</script>
@endsection