@extends('layouts.app')

@section('title', 'Galeri - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1>Galeri Karya Kami</h1>
        <p>Lihat hasil karya terbaik dari Wildan Tailor</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        {{-- Gallery Grid --}}
        <div class="row">
            @forelse ($galleries as $gallery)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <a href="{{ Storage::url('galleries/' . $gallery->gambar_file) }}" data-lightbox="gallery">
                            <img src="{{ Storage::url('galleries/' . $gallery->gambar_file) }}" alt="{{ $gallery->judul }}" class="card-img-top" style="height: 250px; object-fit: cover; cursor: pointer; transition: transform 0.3s;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $gallery->judul }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($gallery->deskripsi, 80) }}</p>
                            <span class="badge bg-primary">{{ ucfirst( $gallery->kategori) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Galeri sedang diperbarui. Silakan kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $galleries->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>

<style>
    .card img:hover {
        transform: scale(1.05) !important;
    }
</style>

@endsection
