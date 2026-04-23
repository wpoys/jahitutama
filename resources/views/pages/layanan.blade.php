@extends('layouts.app')

@section('title', 'Layanan - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1>Layanan Kami</h1>
        <p>Berbagai layanan penjahitan profesional untuk semua kebutuhan Anda</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-6 mb-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 style="color: #667eea;">{{ $service->nama_layanan }}</h4>
                            <div style="margin: 15px 0; padding: 15px; background: #f5f7fa; border-radius: 5px;">
                                {{ $service->deskripsi }}
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <small class="text-muted">Harga Mulai</small>
                                    <p style="color: #ffc107; font-size: 20px; font-weight: bold;">
                                        Rp {{ number_format($service->harga_mulai, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Estimasi Waktu</small>
                                    <p style="color: #667eea; font-size: 20px; font-weight: bold;">
                                        {{ $service->estimasi_hari }} Hari
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('order.show') }}" class="btn btn-primary w-100 mt-3">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
