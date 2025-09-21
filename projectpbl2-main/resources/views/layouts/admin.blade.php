<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - PICRAFT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-bg: #800020; /* Warna maroon */
            --sidebar-hover: #9a2a45; /* Maroon lebih terang */
            --primary-color: #800020; /* Maroon */
            --secondary-color: #d4af37; /* Emas untuk aksen */
            --sidebar-width: 250px;
            --sidebar-collapsed: 70px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            transition: margin-left 0.3s ease;
        }
        
        .sidebar {
            background-color: var(--sidebar-bg);
            color: white;
            height: 100vh;
            position: fixed;
            padding: 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: var(--sidebar-width);
            transition: width 0.3s ease;
            overflow-x: hidden;
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }
        
        .sidebar-header {
            padding: 1.2rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }
        
        .sidebar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .logo-container {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: opacity 0.3s ease;
        }
        
        .logo-container img {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }
        
        .sidebar.collapsed .logo-container {
            opacity: 0;
            display: none;
        }
        
        .brand-text {
            opacity: 1;
            transition: opacity 0.2s ease;
            color: white;
            font-weight: 600;
        }
        
        .sidebar.collapsed .brand-text {
            opacity: 0;
            display: none;
        }
        
        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: absolute;
            right: 12px;
            top: 12px;
            z-index: 1001;
        }
        
        .toggle-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }
        
        .sidebar.collapsed .toggle-btn {
            position: static;
            margin: 0 auto;
            display: block;
            background-color: rgba(255, 255, 255, 0.25);
        }
        
        .sidebar-nav {
            padding: 1rem 0;
            margin-top: 10px;
        }
        
        .nav-item {
            margin-bottom: 0.3rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 0.9rem 1.5rem;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: var(--sidebar-hover);
            color: white;
            border-left: 3px solid var(--secondary-color);
        }
        
        .nav-link i {
            width: 24px;
            margin-right: 15px;
            min-width: 24px;
            text-align: center;
            font-size: 1.3rem;
        }
        
        .link-text {
            opacity: 1;
            transition: opacity 0.2s ease;
        }
        
        .sidebar.collapsed .link-text {
            opacity: 0;
            display: none;
        }
        
        .logout-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 0.9rem 1.5rem;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .logout-link:hover {
            background-color: rgba(180, 30, 50, 0.8);
            color: white;
            border-left: 3px solid #ff4757;
        }
        
        .logout-link i {
            width: 24px;
            margin-right: 15px;
            min-width: 24px;
            text-align: center;
            font-size: 1.3rem;
        }
        
        .logout-text {
            opacity: 1;
            transition: opacity 0.2s ease;
        }
        
        .sidebar.collapsed .logout-text {
            opacity: 0;
            display: none;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            width: calc(100% - var(--sidebar-width));
            transition: margin-left 0.3s ease, width 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: var(--sidebar-collapsed);
            width: calc(100% - var(--sidebar-collapsed));
        }
        
        .top-bar {
            background-color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
        }
        
        .avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .welcome-card {
            background: linear-gradient(120deg, var(--primary-color), #a53d56);
            color: white;
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 20px rgba(128, 0, 32, 0.3);
        }
        
        .content-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: none;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .badge-premium {
            background: linear-gradient(45deg, var(--primary-color), var(--sidebar-hover));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(128, 0, 32, 0.2);
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .text-success {
            color: #28a745 !important;
        }
        
        .text-info {
            color: #17a2b8 !important;
        }
        
        /* Toggle button yang selalu terlihat di sidebar tertutup */
        .sidebar.collapsed .sidebar-header {
            display: flex;
            justify-content: center;
            padding: 1rem 0.5rem;
        }
        
        .sidebar.collapsed .toggle-btn {
            margin: 0;
            font-size: 2rem;
            width: 50px;
            height: 50px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: var(--sidebar-collapsed);
            }
            
            .sidebar.mobile-expanded {
                width: var(--sidebar-width);
            }
            
            .brand-text, .link-text, .logout-text {
                opacity: 0;
                display: none;
            }
            
            .logo-container {
                opacity: 0;
                display: none;
            }
            
            .sidebar.mobile-expanded .brand-text,
            .sidebar.mobile-expanded .link-text,
            .sidebar.mobile-expanded .logout-text,
            .sidebar.mobile-expanded .logo-container {
                opacity: 1;
                display: flex;
            }
            
            .main-content {
                margin-left: var(--sidebar-collapsed);
                width: calc(100% - var(--sidebar-collapsed));
            }
            
            .main-content.mobile-expanded {
                margin-left: var(--sidebar-width);
                width: calc(100% - var(--sidebar-width));
            }
            
            .mobile-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            
            .mobile-overlay.active {
                display: block;
            }
            
            .toggle-btn {
                background-color: rgba(255, 255, 255, 0.25);
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar" id="sidebar">
                <div class="sidebar-header">
                    <a href="#" class="sidebar-brand">
                        <div class="logo-container">
                            <img src="{{ asset('storage/images/image.png') }}" 
     alt="PICRAFT Logo" 
     width="40" height="40" class="rounded-circle">

                        </div>
                        <span class="brand-text">PYCRAFT</span>
                    </a>
                    <button class="toggle-btn" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
                
                <div class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                                <i class="bi bi-speedometer2"></i> <span class="link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
    <li class="nav-item">
    <a href="{{ route('admin.products.manage') }}" class="nav-link">
        <i class="bi bi-box-seam"></i> <span class="link-text">Kelola Produk</span>
    </a>
</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-cart-check"></i> <span class="link-text">Pesanan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-gear"></i> <span class="link-text">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Logout Button -->
                    <div class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> <span class="logout-text">Log Out</span>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content" id="mainContent">
                <!-- Top Bar -->
                <div class="top-bar">
                    <div>
                        <button class="btn btn-sm btn-outline-secondary me-2 d-md-none" id="mobileToggle">
                            <i class="bi bi-list"></i>
                        </button>
                        <h4 class="mb-0 d-inline-block">Dashboard</h4>
                        <small class="text-muted d-block mt-1">Poppy Suhaimi Craft Information System</small>
                    </div>
                    <div class="user-profile">
    <span class="badge-premium me-3">Admin Panel</span>
    <div class="avatar me-2">
        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
    </div>
    <span>{{ Auth::user()->name ?? 'Guest' }}</span>
</div>

                </div>
                
                <!-- Content Area -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileToggle = document.getElementById('mobileToggle');
            const mobileOverlay = document.getElementById('mobileOverlay');
            
            // Check if we're on mobile
            const isMobile = window.matchMedia('(max-width: 768px)').matches;
            
            // Toggle sidebar on desktop
            sidebarToggle.addEventListener('click', function() {
                if (isMobile) {
                    sidebar.classList.toggle('mobile-expanded');
                    mainContent.classList.toggle('mobile-expanded');
                    mobileOverlay.classList.toggle('active');
                } else {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                    
                    // Simpan status sidebar di localStorage
                    const isCollapsed = sidebar.classList.contains('collapsed');
                    localStorage.setItem('sidebarCollapsed', isCollapsed);
                }
            });
            
            // Toggle sidebar on mobile
            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-expanded');
                mainContent.classList.toggle('mobile-expanded');
                mobileOverlay.classList.toggle('active');
            });
            
            // Close sidebar when clicking on overlay
            mobileOverlay.addEventListener('click', function() {
                sidebar.classList.remove('mobile-expanded');
                mainContent.classList.remove('mobile-expanded');
                mobileOverlay.classList.remove('active');
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                const isMobileNow = window.matchMedia('(max-width: 768px)').matches;
                
                if (isMobileNow && !isMobile) {
                    // Switched to mobile view
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                } else if (!isMobileNow && isMobile) {
                    // Switched to desktop view
                    sidebar.classList.remove('mobile-expanded');
                    mainContent.classList.remove('mobile-expanded');
                    mobileOverlay.classList.remove('active');
                }
            });
            
            // Load sidebar state from localStorage
            if (!isMobile) {
                const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
                if (sidebarCollapsed) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                }
            }
        });
    </script>
</body>
</html>