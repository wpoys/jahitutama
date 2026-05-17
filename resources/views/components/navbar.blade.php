<!-- Navigation Bar — Single Row Flex Layout -->
<nav class="navbar" id="mainNavbar">
    <div class="navbar-inner">
        <!-- KIRI: Logo -->
        <a href="{{ route('home') }}" class="navbar-logo">
            <span class="logo-icon"><i class="fas fa-scissors"></i></span>
            <span class="logo-text">Wildan Tailor</span>
        </a>

        <!-- TENGAH: Nav Links (Desktop) -->
        <ul class="navbar-links" id="navbarLinks">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->route()->getName() === 'home' ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('katalog.index') }}" class="nav-link {{ request()->route()->getName() === 'katalog.index' ? 'active' : '' }}">Katalog</a></li>
            <li><a href="{{ route('galeri') }}" class="nav-link {{ request()->route()->getName() === 'galeri' ? 'active' : '' }}">Galeri</a></li>
            <li><a href="{{ route('kontak') }}" class="nav-link {{ request()->route()->getName() === 'kontak' ? 'active' : '' }}">Kontak</a></li>
        </ul>

        <!-- KANAN: Auth Buttons -->
        <div class="navbar-auth">
            @auth
                <a href="{{ route('order.show') }}" class="btn-auth btn-pesan">
                    <i class="fas fa-shopping-bag"></i> Pesan
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-auth btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" onclick="window.location.href='{{ route('login') }}'" class="btn-auth btn-signin">Sign In / Sign Up</a>
            @endauth
        </div>

        <!-- MOBILE: Hamburger Menu -->
        <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- MOBILE: Dropdown Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('home') }}" class="mobile-link {{ request()->route()->getName() === 'home' ? 'active' : '' }}">Home</a>
        <a href="{{ route('katalog.index') }}" class="mobile-link {{ request()->route()->getName() === 'katalog.index' ? 'active' : '' }}">Katalog</a>
        <div class="mobile-dropdown">
            <button class="mobile-dropdown-toggle" data-target="katalog-menu">Kategori Katalog</button>
            <div class="mobile-dropdown-content" id="katalog-menu">
                <h6>Wanita</h6>
                <a href="{{ route('katalog.show', 'kebaya') }}" class="mobile-item">Kebaya</a>
                <a href="{{ route('katalog.show', 'gamis') }}" class="mobile-item">Gamis</a>
                <a href="{{ route('katalog.show', 'dress') }}" class="mobile-item">Dress</a>
                <h6 style="margin-top: 12px;">Pria</h6>
                <a href="{{ route('katalog.show', 'jas') }}" class="mobile-item">Jas</a>
                <a href="{{ route('katalog.show', 'kemeja') }}" class="mobile-item">Kemeja</a>
                <h6 style="margin-top: 12px;">Lainnya</h6>
                <a href="{{ route('katalog.show', 'permak') }}" class="mobile-item">Permak</a>
                <a href="{{ route('katalog.show', 'seragam') }}" class="mobile-item">Seragam</a>
            </div>
        </div>
        <a href="{{ route('galeri') }}" class="mobile-link {{ request()->route()->getName() === 'galeri' ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('kontak') }}" class="mobile-link {{ request()->route()->getName() === 'kontak' ? 'active' : '' }}">Kontak</a>

        <!-- Mobile Auth Buttons -->
        <div class="mobile-auth-buttons">
            @auth
                <a href="{{ route('order.show') }}" class="btn-auth btn-pesan" style="width: 100%; text-align: center;">
                    <i class="fas fa-shopping-bag"></i> Pesan
                </a>
                <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                    @csrf
                    <button type="submit" class="btn-auth btn-logout" style="width: 100%;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" onclick="window.location.href='{{ route('login') }}'" class="btn-auth btn-signin" style="width: 100%; text-align: center;">Sign In / Sign Up</a>
            @endauth
        </div>
    </div>
</nav>
