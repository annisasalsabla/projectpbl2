<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poppy Suhaimi Craft - Handmade Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon: #8B0000;
            --maroon-light: #A52A2A;
            --maroon-dark: #800020;
            --cream: #FFF5E1;
            --gold: #D4AF37;
            --dark: #3D0000;
        }
        
        body { 
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: #fff;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Navbar */
        .navbar {
            padding: 12px 0;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 2px 15px rgba(139, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-brand span.poppy {
            color: var(--maroon);
        }
        
        .navbar-brand span.craft {
            color: #000;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            margin: 0 12px;
            position: relative;
            color: var(--dark) !important;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--maroon) !important;
        }
        
        .navbar-nav .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--maroon);
            transition: width 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover:after {
            width: 100%;
        }
        
        .nav-cart {
            background: var(--maroon);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all 0.3s ease;
            margin-left: 15px;
        }
        
        .nav-cart:hover {
            background: var(--maroon-dark);
            transform: translateY(-2px);
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(to bottom, var(--cream) 0%, #faf5ed 100%);
            padding: 60px 0 30px;
            margin-top: 80px;
            position: relative;
        }
        
        .footer:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--maroon), var(--maroon-light));
        }
        
        .footer h5 {
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--maroon-dark);
        }
        
        .footer h5 span.poppy {
            color: var(--maroon);
        }
        
        .footer h5 span.craft {
            color: #000;
        }
        
        .footer h6 {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--maroon-dark);
        }
        
        .footer p {
            color: #666;
            margin-bottom: 10px;
        }
        
        .footer ul li {
            margin-bottom: 10px;
        }
        
        .footer ul li a {
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer ul li a:hover {
            color: var(--maroon);
            padding-left: 5px;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(139, 0, 0, 0.2);
        }
        
        .social-icon i {
            font-size: 18px;
            color: var(--maroon);
        }
        
        .social-icon.whatsapp:hover {
            background: #25D366;
        }
        
        .social-icon.instagram:hover {
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
        }
        
        .social-icon.tiktok:hover {
            background: #000000;
        }
        
        .social-icon.shopee:hover {
            background: #EE4D2D;
        }
        
        .social-icon.website:hover {
            background: var(--maroon);
        }
        
        .social-icon:hover i {
            color: white;
        }
        
        .copyright {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(139, 0, 0, 0.1);
            color: #777;
        }
        
        /* Contact Links */
        .contact-link {
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .contact-link:hover {
            color: var(--maroon);
        }
        
        /* Scroll to Top Button */
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--maroon);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
        }
        
        .scroll-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .scroll-to-top:hover {
            background-color: var(--maroon-dark);
            transform: translateY(-5px);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease forwards;
        }
    </style>
    @yield('styles')
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('storage/images/image.png') }}" 
                     alt="Brand" 
                     class="rounded-circle me-2" 
                     width="40" height="40">
                <span class="poppy">Poppy Suhaimi</span>
                <span class="craft ms-1">Craft</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="fas fa-home me-1"></i> Beranda
    </a>
</li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-box me-1"></i> Produk</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-star me-1"></i> Ulasan</a></li>
                   <li class="nav-item">
    <a href="{{ route('tentang') }}" class="nav-link">
        <i class="fas fa-info-circle me-1"></i> Tentang
    </a>
</li>

                </ul>
                
                <div class="d-flex align-items-center">
                    <a href="#" class="nav-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                     <a href="{{ route('login') }}" class="btn btn-outline-maroon ms-3">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer bg-light pt-5">
        <div class="container">
            <div class="row text-start align-items-start">
                {{-- Kiri --}}
                <div class="col-md-4 mb-4">
                    <h5><span class="poppy">Poppy Suhaimi</span> <span class="craft">Craft</span></h5>
                    <p>
                        UMKM kerajinan tangan yang menghadirkan produk berkualitas 
                        dengan sentuhan tradisional dan modern.
                    </p>
                    <a href="https://maps.app.goo.gl/oshnNCtYpDSRPQ8a7" 
                       target="_blank" 
                       class="text-decoration-none text-dark">
                        <small>
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Dekat PAUD MUTIARA IV Gurun Laweh, Jl. Gurun Laweh No.8, 
                            RT.04/RW.004, Gurun Laweh Nan XX, Kec. Lubuk Begalung, 
                            Kota Padang, Sumatera Barat 25221
                        </small>
                    </a>
                </div>

                {{-- Tengah --}}
                <div class="col-md-4 mb-4 text-center">
                    <h6 class="fw-bold">Menu</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none"><i class="fas fa-home me-1"></i> Beranda</a></li>
                        <li><a href="#" class="text-decoration-none"><i class="fas fa-box me-1"></i> Produk</a></li>
                        <li><a href="#" class="text-decoration-none"><i class="fas fa-star me-1"></i> Ulasan</a></li>
                        <li><a href="#" class="text-decoration-none"><i class="fas fa-info-circle me-1"></i> Tentang</a></li>
                    </ul>
                    
                    <div class="mt-4">
                        <h6 class="fw-bold">Jam Operasional</h6>
                        <p class="mb-1">Setiap Hari</p>
                        <p class="mb-0">09:00 - 21:00 WIB</p>
                    </div>
                </div>

                {{-- Kanan --}}
                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold">Kontak & Social Media</h6>
                    <p>
                        <a href="mailto:info@poppycraft.com" class="contact-link">
                            <i class="fas fa-envelope me-2"></i> info@poppycraft.com
                        </a>
                    </p>
                    <p>
                        <a href="tel:+622280437155" class="contact-link">
                            <i class="fas fa-phone me-2"></i> +62 822-8043-7155
                        </a>
                    </p>
                    <p><i class="fas fa-clock me-2"></i> Setiap Hari: 09:00 - 21:00</p>

                    <div class="d-flex gap-3 mt-3">
                        <a href="https://wa.me/6282280437155" class="social-icon whatsapp" target="_blank">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/poppysuhaimicraft?igsh=MXAzMWlmcnp0eW1pdA==" 
                           class="social-icon instagram" target="_blank">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="https://www.tiktok.com/@popp972?_t=ZS-8zr7BIV7LOs&_r=1" 
                           class="social-icon tiktok" target="_blank">
                            <i class="fab fa-tiktok fa-lg"></i>
                        </a>
                        <a href="https://id.shp.ee/n6QpXar" 
                           class="social-icon shopee" target="_blank">
                            <i class="fas fa-store fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="copyright text-center mt-4 border-top pt-3">
                <p class="mb-0">&copy; 2025 Poppy Suhaimi Craft. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- Scroll to Top Button --}}
    <div class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll to Top Functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });
        
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Add smooth scrolling to all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>