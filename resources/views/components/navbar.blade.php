<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container-fluid">
        {{-- Brand Logo --}}
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="fas fa-scissors" style="color: #667eea;"></i> Wildan Tailor
        </a>

        {{-- Toggler for mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navigation Links --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'tentang' ? 'active' : '' }}" href="{{ route('tentang') }}">
                        Tentang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'layanan' ? 'active' : '' }}" href="{{ route('layanan') }}">
                        Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'galeri' ? 'active' : '' }}" href="{{ route('galeri') }}">
                        Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'harga' ? 'active' : '' }}" href="{{ route('harga') }}">
                        Harga
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'cara-order' ? 'active' : '' }}" href="{{ route('cara-order') }}">
                        Cara Order
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'kontak' ? 'active' : '' }}" href="{{ route('kontak') }}">
                        Kontak
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a href="{{ route('order.show') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-shopping-bag"></i> Pesan Sekarang
                    </a>
                </li>
                @auth
                    <li class="nav-item ms-2">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-tachometer-alt"></i> Admin
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-brand {
        color: #667eea !important;
        font-size: 24px;
        font-weight: bold;
    }

    .navbar-nav .nav-link {
        color: #666 !important;
        font-weight: 500;
        margin: 0 10px;
        transition: all 0.3s;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #667eea !important;
        border-bottom: 2px solid #667eea;
    }

    .navbar-nav .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
    }

    .navbar-nav .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
</style>
