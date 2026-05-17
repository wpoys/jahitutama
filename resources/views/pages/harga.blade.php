@extends('layouts.app')

@section('title', 'Harga & Paket - Wildan Tailor')
@section('description', 'Daftar harga berbagai layanan jahit Wildan Tailor')

@section('content')
<style>
    .pricing-announce {
        background: #fff8ed;
        color: #6b4e16;
        font-size: 0.9rem;
        text-align: center;
        padding: 0.7rem 1rem;
        border-bottom: 1px solid rgba(217, 119, 6, 0.12);
    }

    .pricing-hero {
        padding: 3.5rem 0 2.5rem;
        background: linear-gradient(180deg, rgba(255, 248, 237, 0.95), rgba(255, 255, 255, 1));
    }

    .pricing-title {
        font-size: clamp(2.2rem, 4vw, 3.5rem);
        font-weight: 800;
        letter-spacing: -0.04em;
        line-height: 1.02;
    }

    .pricing-feature-title {
        font-size: 2rem;
        font-weight: 700;
        color: #18243b;
    }

    .pricing-feature-sub {
        font-size: 1rem;
        color: #6b7280;
    }

    .price-badge {
        display: inline-block;
        background: #fef3c7;
        color: #92400e;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .pricing-copy {
        font-size: 1.05rem;
        color: #6b7280;
        line-height: 1.6;
    }

    .horizontal-scroll-container {
        display: flex;
        flex-wrap: nowrap;
        gap: 1rem;
        overflow-x: auto;
        padding-bottom: 10px;
        scroll-behavior: smooth;
    }

    .horizontal-scroll-container::-webkit-scrollbar {
        height: 6px;
    }

    .horizontal-scroll-container::-webkit-scrollbar-track {
        background: rgba(24, 36, 59, 0.06);
        border-radius: 10px;
    }

    .horizontal-scroll-container::-webkit-scrollbar-thumb {
        background: rgba(217, 119, 6, 0.4);
        border-radius: 10px;
    }

    .horizontal-scroll-container::-webkit-scrollbar-thumb:hover {
        background: rgba(217, 119, 6, 0.6);
    }

    .product-card {
        flex: 0 0 280px;
        border-radius: 20px;
        border: 1px solid rgba(24, 36, 59, 0.08);
        background: #fff;
        box-shadow: 0 10px 28px rgba(24, 36, 59, 0.05);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        box-shadow: 0 16px 40px rgba(24, 36, 59, 0.12);
        transform: translateY(-4px);
    }

    .product-card .product-image {
        width: 100%;
        height: 240px;
        object-fit: cover;
        display: block;
    }

    .product-card .product-content {
        padding: 1.25rem;
    }

    .product-card .product-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #18243b;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card .product-description {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
    }

    .product-card .product-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: #d97706;
        margin-bottom: 1rem;
    }

    .product-card .btn-product {
        width: 100%;
        padding: 0.65rem 1rem;
        border-radius: 10px;
        background: #18243b;
        color: #fff;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .product-card .btn-product:hover {
        background: #d97706;
        color: #fff;
    }

    .pricing-table-shell {
        background: #fff;
        border-radius: 20px;
        border: 1px solid rgba(24, 36, 59, 0.08);
        overflow: hidden;
        box-shadow: 0 10px 28px rgba(24, 36, 59, 0.05);
    }

    .accordion-button {
        padding: 1.5rem;
        font-weight: 600;
        color: #18243b;
        border: none;
        background: transparent;
    }

    .accordion-button:not(.collapsed) {
        background: #fef3c7;
        color: #18243b;
    }

    .accordion-body {
        padding: 1.5rem;
        background: #fefefe;
    }

    .service-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 2rem;
    }

    .service-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: #18243b;
    }

    .service-meta {
        font-size: 0.9rem;
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .service-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: #d97706;
        white-space: nowrap;
    }
</style>

<div class="pricing-announce">Jahitan halus bergaransi, free konsultasi dan tersedia paket express</div>

<section class="pricing-hero">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-7">
                <span class="price-badge">Price List Jahit - Alteration - Pattern Maker - Accent</span>
                <h1 class="pricing-title mb-3">Pesanan Individual dan Korporat dengan Harga yang Jelas</h1>
                <p class="pricing-copy mb-0">Harga di bawah merupakan kisaran untuk membantu Anda memahami range layanan. Estimasi dapat berubah sesuai kerumitan desain, aksen, jenis bahan, dan kecepatan pengerjaan.</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-outline-dark rounded-pill px-4 py-3 fw-semibold">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4 mb-4 align-items-end">
            <div class="col-lg-8">
                <h2 class="pricing-feature-title mb-2">Busana Siap Pakai</h2>
                <p class="pricing-feature-sub">Koleksi busana pilihan dengan desain eksklusif dan kualitas premium siap untuk Anda gunakan.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-outline-dark rounded-pill px-4 py-3 fw-semibold">Lihat Semua</a>
            </div>
        </div>

        <div class="horizontal-scroll-container" id="productScroll">
            <article class="product-card">
                <img src="https://via.placeholder.com/280x240?text=Kebaya+Brokat" alt="Kebaya Brokat" class="product-image">
                <div class="product-content">
                    <h3 class="product-title">Kebaya Brokat Merah</h3>
                    <p class="product-description">Kebaya tradisional dengan motif brokat eksklusif, cocok untuk acara formal dan resepsi.</p>
                    <div class="product-price">Rp 750.000</div>
                    <button class="btn-product" onclick="window.location.href='{{ route('kontak') }}'">Pesan Sekarang</button>
                </div>
            </article>

            <article class="product-card">
                <img src="https://via.placeholder.com/280x240?text=Gaun+Pesta" alt="Gaun Pesta" class="product-image">
                <div class="product-content">
                    <h3 class="product-title">Gaun Pesta Elegan</h3>
                    <p class="product-description">Gaun pesta dengan desain modern dan elegan, bahan kualitas tinggi dengan jahitan sempurna.</p>
                    <div class="product-price">Rp 950.000</div>
                    <button class="btn-product" onclick="window.location.href='{{ route('kontak') }}'">Pesan Sekarang</button>
                </div>
            </article>

            <article class="product-card">
                <img src="https://via.placeholder.com/280x240?text=Baju+Kemeja" alt="Baju Kemeja" class="product-image">
                <div class="product-content">
                    <h3 class="product-title">Kemeja Formal Premium</h3>
                    <p class="product-description">Kemeja formal dengan bahan katun premium dan potongan yang sempurna untuk penampilan profesional.</p>
                    <div class="product-price">Rp 450.000</div>
                    <button class="btn-product" onclick="window.location.href='{{ route('kontak') }}'">Pesan Sekarang</button>
                </div>
            </article>

            <article class="product-card">
                <img src="https://via.placeholder.com/280x240?text=Batik+Modern" alt="Batik Modern" class="product-image">
                <div class="product-content">
                    <h3 class="product-title">Batik Modern Wanita</h3>
                    <p class="product-description">Batik kontemporer dengan motif modern yang timeless, cocok untuk kasual hingga semi-formal.</p>
                    <div class="product-price">Rp 600.000</div>
                    <button class="btn-product" onclick="window.location.href='{{ route('kontak') }}'">Pesan Sekarang</button>
                </div>
            </article>

            <article class="product-card">
                <img src="https://via.placeholder.com/280x240?text=Jas+Pria" alt="Jas Pria" class="product-image">
                <div class="product-content">
                    <h3 class="product-title">Jas Pria Formal</h3>
                    <p class="product-description">Jas pria dengan kualitas premium dan potongan sempurna, cocok untuk acara resmi dan bisnis.</p>
                    <div class="product-price">Rp 1.200.000</div>
                    <button class="btn-product" onclick="window.location.href='{{ route('kontak') }}'">Pesan Sekarang</button>
                </div>
            </article>

            <article class="product-card">
                <img src="https://via.placeholder.com/280x240?text=Dress+Casual" alt="Dress Casual" class="product-image">
                <div class="product-content">
                    <h3 class="product-title">Dress Casual Nyaman</h3>
                    <p class="product-description">Dress kasual dengan desain minimalis dan bahan nyaman, cocok untuk penggunaan sehari-hari.</p>
                    <div class="product-price">Rp 400.000</div>
                    <button class="btn-product" onclick="window.location.href='{{ route('kontak') }}'">Pesan Sekarang</button>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="pricing-table-shell">
            <div class="accordion" id="pricingAccordion">
                @forelse ($services as $index => $service)
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                {{ $service->nama_layanan }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#pricingAccordion">
                            <div class="accordion-body">
                                <div class="service-row">
                                    <div>
                                        <div class="service-name">{{ $service->nama_layanan }}</div>
                                        <div class="service-meta">{{ Str::limit($service->deskripsi, 120) }}</div>
                                    </div>
                                    <div class="service-price">
                                        {{ $service->harga_mulai ? 'Rp ' . number_format($service->harga_mulai, 0, ',', '.') : 'Call Us' }}
                                        <div class="service-meta text-end">{{ $service->estimasi_hari }} hari</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center text-muted">Data layanan belum tersedia.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
