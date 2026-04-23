@extends('layouts.app')

@section('title', 'Home - Wildan Tailor')
@section('description', 'Wildan Tailor - Jasa penjahitan profesional dengan kualitas terbaik')

@section('content')

<!-- Hero Section -->
<div class="hero-section" 
            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
            url('{{ asset('assets/image/jahit.jpg') }}'); 
            background-repeat: no-repeat; 
            background-size: cover; 
            background-position: center; 
            padding: 100px 0; 
            text-align: center;">

    <div class="container">
        <h1 class="display-4 fw-bold mb-3" style="color: #f1f1f1;">Selamat Datang di Wildan Tailor</h1>
        <p class="fs-5 mb-4" style="color: #f1f1f1;">Jasa Penjahitan Profesional dengan Kualitas Terbaik</p>
        <a href="{{ route('order.show') }}" class="btn btn-warning btn-lg"> <i class="fas fa-shopping-bag"></i> Pesan Sekarang</a>
    </div>
</div>

<section class="py-5" style="background: #f5f7fa;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-3" style="color: #667eea;">Tentang Kami</h2>
                <p class="text-muted">Wildan Tailor adalah penyedia jasa penjahitan berkualitas tinggi yang berpengalaman lebih dari 10 tahun dalam industri fashion dan tekstil. Kami berkomitmen memberikan layanan terbaik dengan hasil jahitan yang rapi dan presisi.</p>
                <a href="{{ route('tentang') }}" class="btn btn-primary">Pelajari Lebih Lanjut →</a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="stat-box text-center">
                            <h3 style="color: #667eea;">{{ $orders_count }}+</h3>
                            <p class="text-muted">Pesanan Selesai</p>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="stat-box text-center">
                            <h3 style="color: #764ba2;">{{ $customers_count }}+</h3>
                            <p class="text-muted">Pelanggan Puas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #667eea;">Layanan Kami</h2>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #667eea;">{{ $service->nama_layanan }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($service->deskripsi, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="color: #ffc107; font-weight: bold;">{{ $service->harga_mulai ? 'Rp ' . number_format($service->harga_mulai, 0, ',', '.') : '-' }}</span>
                            <small class="text-muted">{{ $service->estimasi_hari }} hari</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('layanan') }}" class="btn btn-outline-primary">Lihat Semua Layanan</a>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="py-5" style="background: #f5f7fa;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #667eea;">Galeri Karya Kami</h2>
        <div class="row">
            @foreach ($galleries->take(6) as $gallery)
            <div class="col-md-4 mb-4">
                <a href="{{ Storage::url('galleries/' . $gallery->gambar_file) }}" data-lightbox="gallery">
                    <img src="{{ Storage::url('galleries/' . $gallery->gambar_file) }}" alt="{{ $gallery->judul }}" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('galeri') }}" class="btn btn-outline-primary">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #667eea;">Testimoni Pelanggan</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <span style="color: #ffc107;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <p class="card-text text-muted">"Hasil jahitan sangat rapih dan memuaskan. Proses cepat dan sesuai dengan jadwal yang ditentukan. Saya sangat rekomendasikan Wildan Tailor!"</p>
                        <strong>- Budi Santoso</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <span style="color: #ffc107;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <p class="card-text text-muted">"Pelayanan yang ramah dan profesional. Harga terjangkau dengan kualitas yang tidak mengecewakan. Sudah berkali-kali memesan dan tidak pernah kecewa."</p>
                        <strong>- Siti Muniroh</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 60px 0; text-align: center;">
    <div class="container">
        <h2 class="mb-3">Siap untuk Memesan?</h2>
        <p class="fs-5 mb-4">Hubungi kami sekarang dan dapatkan konsultasi gratis</p>
        <a href="{{ route('order.show') }}" class="btn btn-warning btn-lg me-2">
            <i class="fas fa-shopping-bag"></i> Pesan Sekarang
        </a>
        <a href="{{ route('kontak') }}" class="btn btn-outline-light btn-lg">
            <i class="fas fa-phone"></i> Hubungi Kami
        </a>
    </div>
</section>

<style>
    .hover-card {
        transition: all 0.3s;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2) !important;
    }

    .stat-box {
        padding: 20px;
        border-radius: 8px;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
</style>

@endsection
