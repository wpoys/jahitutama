@extends('layouts.app')

@section('title', 'Home - Wildan Tailor')
@section('description', 'Wildan Tailor - Jasa penjahitan profesional dengan kualitas terbaik')

@section('content')
<style>
    .home-announcement {
        background: #fff8ed;
        color: #6b4e16;
        font-size: 0.9rem;
        text-align: center;
        padding: 0.7rem 1rem;
        border-bottom: 1px solid rgba(217, 119, 6, 0.12);
    }

    .home-hero {
        padding: 4rem 0 3rem;
        background: linear-gradient(180deg, rgba(255, 248, 237, 0.95), rgba(255, 255, 255, 1));
    }

    .hero-copy h1 {
        font-size: clamp(2.4rem, 5vw, 4.5rem);
        line-height: 0.95;
        letter-spacing: -0.04em;
        font-weight: 800;
        color: #18243b;
    }

    .hero-copy .lead {
        max-width: 44rem;
        color: #6b7280;
        font-size: 1.08rem;
    }

    .hero-visual {
        position: relative;
        border-radius: 28px;
        overflow: hidden;
        min-height: 420px;
        box-shadow: 0 22px 60px rgba(24, 36, 59, 0.14);
        background: #f8fafc;
    }

    .hero-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .hero-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(255, 255, 255, 0.94);
        color: #6b4e16;
        border-radius: 999px;
        padding: 0.45rem 0.8rem;
        font-size: 0.78rem;
        font-weight: 700;
        box-shadow: 0 8px 18px rgba(24, 36, 59, 0.08);
    }

    .hero-arrows {
        position: absolute;
        left: 50%;
        bottom: 16px;
        transform: translateX(-50%);
        display: flex;
        gap: 0.75rem;
    }

    .hero-arrow {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 0;
        background: #fff;
        color: #18243b;
        box-shadow: 0 10px 22px rgba(24, 36, 59, 0.16);
    }

    .stat-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
        max-width: 28rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: #18243b;
        line-height: 1;
    }

    .stat-label {
        color: #6b7280;
        margin-top: 0.25rem;
    }

    .section-card {
        background: #fff;
        border: 1px solid rgba(24, 36, 59, 0.08);
        border-radius: 28px;
        box-shadow: 0 16px 40px rgba(24, 36, 59, 0.08);
    }

    .feature-grid {
        display: grid;
        grid-template-columns: 1.45fr 1fr;
        gap: 1.5rem;
    }

    .feature-card {
        display: flex;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(24, 36, 59, 0.06);
    }

    .feature-card:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .feature-icon {
        width: 44px;
        height: 44px;
        flex: 0 0 44px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(217, 119, 6, 0.12);
        color: #d97706;
    }

    .feature-card h3 {
        font-size: 1.02rem;
        margin-bottom: 0.35rem;
        color: #18243b;
    }

    .feature-card p,
    .feature-side p,
    .mission-item p,
    .testimonial-item,
    .service-card p {
        color: #6b7280;
        margin-bottom: 0;
        line-height: 1.7;
    }

    .feature-side h2,
    .testimonial-panel h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        color: #b8472f;
        line-height: 1.05;
        font-weight: 700;
    }

    .pill-title {
        display: inline-flex;
        border: 1px solid rgba(217, 119, 6, 0.14);
        background: rgba(252, 211, 77, 0.16);
        color: #8c5b16;
        padding: 0.4rem 0.85rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .tabs-shell {
        background: linear-gradient(180deg, rgba(255, 251, 240, 0.95), #fff);
    }

    .ref-tabs .nav-link {
        border-radius: 999px;
        border: 1px solid rgba(217, 119, 6, 0.12);
        color: #18243b !important;
        background: #fff;
        padding: 0.85rem 1.15rem;
        font-weight: 700;
    }

    .ref-tabs .nav-link.active {
        background: linear-gradient(135deg, #d97706, #f59e0b);
        color: #fff !important;
        border-color: transparent;
    }

    .service-card {
        height: 100%;
        padding: 1.35rem;
        border-radius: 24px;
        border: 1px solid rgba(24, 36, 59, 0.08);
        background: #fff;
        box-shadow: 0 14px 34px rgba(24, 36, 59, 0.06);
    }

    .service-card .eyebrow {
        display: inline-block;
        margin-bottom: 0.75rem;
        color: #8c5b16;
        font-size: 0.77rem;
        font-weight: 800;
        letter-spacing: 0.08em;
    }

    .service-card a {
        color: #d97706;
        font-weight: 700;
        text-decoration: none;
    }

    .mission-panel,
    .testimonial-panel {
        padding: 1.5rem;
        border-radius: 28px;
        border: 1px solid rgba(24, 36, 59, 0.08);
        background: #fff;
        box-shadow: 0 16px 40px rgba(24, 36, 59, 0.08);
    }

    .mission-item {
        display: flex;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(24, 36, 59, 0.06);
    }

    .mission-item:last-of-type {
        border-bottom: 0;
    }

    .mission-icon {
        width: 46px;
        height: 46px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(217, 119, 6, 0.12);
        color: #d97706;
        flex: 0 0 46px;
    }

    .mission-summary {
        margin-top: 1rem;
        color: #8c5b16;
        font-weight: 700;
    }

    .testimonial-item {
        background: #f8fafc;
        border: 1px solid rgba(24, 36, 59, 0.06);
        border-radius: 18px;
        padding: 1rem 1.1rem;
        margin-bottom: 0.75rem;
    }

    @media (max-width: 991px) {
        .feature-grid {
            grid-template-columns: 1fr;
        }

        .hero-visual {
            min-height: 360px;
        }
    }
</style>

<div class="home-announcement">Jahitan halus bergaransi, free konsultasi dan tersedia paket express</div>

<section class="home-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 hero-copy">
                <span class="pill-title">Wildan Tailor - Premium Custom Tailoring</span>
                <h1 class="mb-3">Bikin Baju Sesuai Gayamu Gak Pake Ribet</h1>
                <p class="lead mb-4">Di <strong>Wildan Tailor</strong>, Anda bisa membuat berbagai macam baju sesuai keinginan. Tersedia pengerjaan <strong>express</strong>, jaminan <strong>jahitan butik</strong>, free konsultasi bahan dan desain, serta layanan antar jemput untuk kebutuhan tertentu.</p>

                <a href="{{ route('kontak') }}" class="btn btn-outline-dark rounded-pill px-4 py-3 fw-semibold">
                    <i class="fas fa-phone me-2"></i>Hubungi Kami
                </a>

                <div class="stat-row">
                    <div class="stat-item">
                        <div class="stat-number">{{ $orders_count ?? 0 }}</div>
                        <div class="stat-label">Customers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $customers_count ?? 0 }}</div>
                        <div class="stat-label">Company</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-visual">
                    <img src="{{ asset('assets/image/jahit.jpg') }}" alt="Proses Pengerjaan">
                    <div class="hero-badge">Proses Pengerjaan</div>
                    <div class="hero-arrows">
                        <button class="hero-arrow" type="button" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="hero-arrow" type="button" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="feature-grid">
            <div class="section-card p-4 p-lg-5">
                <span class="pill-title">Why Choose Us?</span>
                <article class="feature-card">
                    <div class="feature-icon"><i class="fas fa-award"></i></div>
                    <div>
                        <h3>Garansi Jahitan</h3>
                        <p>Rumah jahit memberikan garansi jahitan rapi seperti butik ternama.</p>
                    </div>
                </article>
                <article class="feature-card">
                    <div class="feature-icon"><i class="fas fa-pen-ruler"></i></div>
                    <div>
                        <h3>Bisa Request Desain yang Rumit</h3>
                        <p>Kami menerima pesanan khusus untuk fashion show, portofolio, dan desain yang kompleks.</p>
                    </div>
                </article>
                <article class="feature-card">
                    <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                    <div>
                        <h3>Pengerjaan bisa Express</h3>
                        <p>Tersedia pengerjaan express 1-2 hari untuk desain dan jumlah pesanan tertentu.</p>
                    </div>
                </article>

                <a href="{{ route('kontak') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-3">Appointment Booking</a>
            </div>

            <div class="section-card p-4 p-lg-5 feature-side d-flex flex-column justify-content-between">
                <div>
                    <h2 class="mb-3">Apa yang dikatakan Customer Loyal kami?</h2>
                    <p>Kami memiliki banyak customer loyal yang merekomendasikan kami kepada teman, kolega, dan keluarganya untuk memesan baju di Wildan Tailor.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('kontak') }}" class="btn btn-primary rounded-pill px-4 py-2">HUBUNGI KAMI</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tabs-shell">
    <div class="container">
        <ul class="nav nav-pills ref-tabs justify-content-center gap-2 mb-4" id="homeTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="perorangan-tab" data-bs-toggle="pill" data-bs-target="#perorangan" type="button" role="tab">ORDER PERORANGAN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="perusahaan-tab" data-bs-toggle="pill" data-bs-target="#perusahaan" type="button" role="tab">ORDER PERUSAHAAN</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="perorangan" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="service-card">
                            <span class="eyebrow">TAILOR & MODISTE</span>
                            <h3 class="h5">Baju Wanita dan Baju Pria</h3>
                            <p>Layanan jahit custom size dan desain yang diinginkan customer.</p>
                            <a href="{{ route('layanan') }}">Learn More</a>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="service-card">
                            <span class="eyebrow">PATTERN MAKER</span>
                            <h3 class="h5">Pembuatan Pola Baju</h3>
                            <p>Pembuatan pola dengan desain dan size pack yang diinginkan customer.</p>
                            <a href="{{ route('layanan') }}">Learn More</a>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="service-card">
                            <span class="eyebrow">ALTERATION</span>
                            <h3 class="h5">Perbaikan Ukuran Pakaian</h3>
                            <p>Menyesuaikan ukuran pakaian yang sudah jadi agar lebih pas, rapi, dan nyaman dipakai.</p>
                            <a href="{{ route('layanan') }}">Learn More</a>
                        </article>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="perusahaan" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="service-card">
                            <span class="eyebrow">KALKULATOR KAIN</span>
                            <h3 class="h5">Aplikasi Gratis</h3>
                            <p>Membantu menghitung kain sebelum diserahkan kepada penjahit.</p>
                            <a href="{{ route('layanan') }}">Coba Sekarang</a>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="service-card">
                            <span class="eyebrow">AI BODY METRIC</span>
                            <h3 class="h5">Pengukuran AI</h3>
                            <p>Aplikasi berbasis AI untuk mengukur badan secara lebih presisi.</p>
                            <a href="{{ route('kontak') }}">Coming Soon</a>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="service-card">
                            <span class="eyebrow">KALKULATOR JAHIT</span>
                            <h3 class="h5">Estimasi Harga Jahit</h3>
                            <p>Membantu mengetahui harga jahit sesuai desain, kerumitan, dan lama pengerjaan.</p>
                            <a href="{{ route('kontak') }}">Coming Soon</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-12">
                <div class="mission-panel">
                    <article class="mission-item">
                        <div class="mission-icon"><i class="fas fa-check-circle"></i></div>
                        <div>
                            <h3>Bajunya Enak dipakai dan Jahitan Rapih</h3>
                            <p>Di Wildan Tailor kami fokus pada pola yang nyaman dipakai dan kualitas jahitan yang diperhatikan dengan detail.</p>
                        </div>
                    </article>
                    <article class="mission-item">
                        <div class="mission-icon"><i class="fas fa-pen-ruler"></i></div>
                        <div>
                            <h3>Bisa Request Desain yang Rumit</h3>
                            <p>Kami menerima pesanan khusus untuk fashion show, portofolio, dan desain yang kompleks.</p>
                        </div>
                    </article>
                    <article class="mission-item">
                        <div class="mission-icon"><i class="fas fa-bolt"></i></div>
                        <div>
                            <h3>Pengerjaan bisa Express</h3>
                            <p>Tersedia pengerjaan express 1-2 hari untuk desain dan jumlah pesanan tertentu.</p>
                        </div>
                    </article>
                    <p class="mission-summary mb-0">Misi kami adalah memberikan solusi pembuatan baju sesuai keinginan customer dengan kualitas jahitan dan layanan terbaik.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
