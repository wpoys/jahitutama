<!-- Modern Footer -->
<footer class="footer-modern bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-5 mb-5">
            {{-- About Section --}}
            <div class="col-md-3">
                <div class="footer-section">
                    <h5 class="footer-title mb-3">
                        <i class="fas fa-scissors text-primary"></i> Wildan Tailor
                    </h5>
                    <p class="footer-desc text-muted">Penyedia jasa penjahitan berkualitas tinggi dengan pengalaman lebih dari 10 tahun melayani kepuasan pelanggan di Bandung.</p>
                    <div class="social-links mt-4">
                        <a href="#" class="social-link me-3" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link me-3" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/6285725773519" class="social-link me-3" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-md-2">
                <div class="footer-section">
                    <h5 class="footer-title mb-4">Navigasi</h5>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('tentang') }}" class="text-muted text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-muted text-decoration-none">Produk</a></li>
                        <li class="mb-2"><a href="{{ route('galeri') }}" class="text-muted text-decoration-none">Galeri</a></li>
                        <li class="mb-2"><a href="{{ route('kontak') }}" class="text-muted text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
            </div>

            {{-- Services --}}
            <div class="col-md-2">
                <div class="footer-section">
                    <h5 class="footer-title mb-4">Layanan</h5>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-muted text-decoration-none">Jahitan Jas</a></li>
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-muted text-decoration-none">Kebaya</a></li>
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-muted text-decoration-none">Seragam</a></li>
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-muted text-decoration-none">Gamis</a></li>
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-muted text-decoration-none">Permak</a></li>
                    </ul>
                </div>
            </div>

            {{-- Contact Info --}}
            <div class="col-md-3">
                <div class="footer-section">
                    <h5 class="footer-title mb-4">Hubungi Kami</h5>
                    <ul class="footer-contact list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <div class="d-inline-block">
                                <strong class="text-white">Lokasi</strong>
                                <p class="text-muted small mb-0">Jl. Merdeka No. 123, Bandung, Jawa Barat</p>
                            </div>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <div class="d-inline-block">
                                <strong class="text-white">Telepon</strong>
                                <p class="text-muted small mb-0"><a href="tel:+6285725773519" class="text-decoration-none text-muted">+62 857-2577-3519</a></p>
                            </div>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <div class="d-inline-block">
                                <strong class="text-white">Email</strong>
                                <p class="text-muted small mb-0"><a href="mailto:info@wdtailor.com" class="text-decoration-none text-muted">info@wdtailor.com</a></p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-clock text-primary me-2"></i>
                            <div class="d-inline-block">
                                <strong class="text-white">Jam Kerja</strong>
                                <p class="text-muted small mb-0">Senin-Jumat: 09:00-18:00<br>Sabtu: 10:00-16:00</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="footer-divider border-secondary">

        {{-- Bottom Footer --}}
        <div class="footer-bottom py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted small mb-0">&copy; 2024 Wildan Tailor. Semua hak dilindungi undang-undang.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted small mb-0">Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk memberikan yang terbaik bagi Anda</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Back to Top Button --}}
    <button class="back-to-top" id="backToTop" title="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<style>
    .footer-modern {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        margin-top: 60px;
    }

    .footer-title {
        color: #fff;
        font-weight: 600;
        font-size: 18px;
    }

    .footer-desc {
        font-size: 14px;
        line-height: 1.6;
    }

    .footer-links a {
        transition: all 0.3s;
        color: #999 !important;
    }

    .footer-links a:hover {
        color: #667eea !important;
        padding-left: 5px;
    }

    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #667eea;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s;
    }

    .social-link:hover {
        background-color: #667eea;
        border-color: #667eea;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .footer-contact li {
        font-size: 14px;
    }

    .footer-contact a {
        color: #999;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-contact a:hover {
        color: #667eea;
    }

    .footer-divider {
        opacity: 0.3;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
        z-index: 999;
        font-size: 18px;
    }

    .back-to-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .back-to-top.show {
        display: flex;
    }

    @media (max-width: 768px) {
        .footer-modern {
            margin-top: 40px;
        }

        .footer-title {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .col-md-3, .col-md-2 {
            margin-bottom: 20px;
        }

        .footer-bottom {
            text-align: center;
        }

        .footer-bottom .col-md-6 {
            margin-bottom: 10px;
        }
    }
</style>

<script>
    // Back to Top Button
    const backToTopBtn = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
