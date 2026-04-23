@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 80px 0; text-align: center;">
    <div class="container">
        <div style="font-size: 80px; margin-bottom: 20px;">
            <i class="fas fa-check-circle" style="color: #28a745;"></i>
        </div>
        <h1>Pesanan Berhasil Dikirim!</h1>
        <p class="fs-5">Terima kasih telah memesan layanan kami</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h4 style="color: #667eea; margin-bottom: 20px;">Detail Pesanan Anda</h4>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Nomor Pesanan</strong>
                                <p>#{{ $order->id }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Tanggal Pesanan</strong>
                                <p>{{ $order->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Nama Pemesan</strong>
                                <p>{{ $order->nama_pemesan }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Jenis Layanan</strong>
                                <p>{{ $order->jenis_layanan }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Harga</strong>
                                <p style="color: #ffc107; font-size: 18px; font-weight: bold;">Rp {{ number_format($order->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Estimasi Waktu</strong>
                                <p>{{ $order->estimasi_waktu }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Langkah Selanjutnya:</strong>
                            <p class="mb-0 mt-2">Kami akan menghubungi Anda melalui email atau WhatsApp dalam waktu maksimal 2 jam untuk konfirmasi dan diskusi detail. Silakan pastikan kontak Anda dapat dihubungi.</p>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary me-2">
                                <i class="fas fa-home"></i> Kembali ke Home
                            </a>
                            <a href="{{ route('kontak') }}" class="btn btn-outline-primary">
                                <i class="fas fa-phone"></i> Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
