@extends('layouts.app')

@section('title', 'Galeri - Wildan Tailor')

@section('content')

<div class="hero-section py-5">
    <div class="container">
        <h1>BERBAGAI KREASI RUMAH JAHIT SLAWM</h1>
        <p>Gallery memuat foto dan video Custom Order Rumah Jahit SLAWM</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        {{-- Gallery Grid --}}
        <div class="row">
            @forelse ($galleries as $gallery)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="card-media-placeholder" style="height:250px; display:flex; align-items:center; justify-content:center; background:linear-gradient(180deg,#f8fafc,#fff); color:#64748b;">
                            <div class="text-center">
                                <i class="fas fa-image" style="font-size:2.4rem; opacity:0.9;"></i>
                                <div class="small mt-2">Media dihapus</div>
                            </div>
                        </div>
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
