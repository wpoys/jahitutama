@extends('layouts.app')

@section('title', 'Cara Pemesanan - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1>Cara Pemesanan</h1>
        <p>Langkah mudah untuk memesan layanan kami</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            @for ($i = 1; $i <= 5; $i++)
                <div class="col-md-6 col-lg-2-5 mb-4 text-center">
                    <div style="font-size: 50px; color: #667eea; margin-bottom: 15px;">
                        <i class="fas fa-{{ match($i) {
                            1 => 'phone',
                            2 => 'comments',
                            3 => 'handshake',
                            4 => 'needle',
                            5 => 'check-circle',
                            default => 'step'
                        } }}"></i>
                    </div>
                    <h4>Langkah {{ $i }}</h4>
                    <p class="text-muted">
                        @switch($i)
                            @case(1)
                                Hubungi kami melalui telepon atau WhatsApp
                                @break
                            @case(2)
                                Konsultasi dan diskusi kebutuhan Anda
                                @break
                            @case(3)
                                Sepakati harga dan jadwal pengerjaan
                                @break
                            @case(4)
                                Pengerjaan dan penjahitan dimulai
                                @break
                            @case(5)
                                Pengambilan dan pembayaran selesai
                                @break
                        @endswitch
                    </p>
                </div>
            @endfor
        </div>
    </div>
</section>

<section class="py-5" style="background: #f5f7fa;">
    <div class="container">
        <h2 style="color: #667eea; margin-bottom: 30px; text-align: center;">Metode Pembayaran</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-university" style="font-size: 30px; color: #667eea; margin-bottom: 15px;"></i>
                        <h5>Transfer Bank</h5>
                        <p class="text-muted small">Lakukan transfer ke rekening bank kami</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-money-bill" style="font-size: 30px; color: #ffc107; margin-bottom: 15px;"></i>
                        <h5>Tunai</h5>
                        <p class="text-muted small">Bayar langsung saat pengambilan barang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-mobile-alt" style="font-size: 30px; color: #28a745; margin-bottom: 15px;"></i>
                        <h5>E-Wallet</h5>
                        <p class="text-muted small">Pembayaran via GoPay, OVO, Dana</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        .col-lg-2-5 {
            flex: 0 0 50%;
        }
    }

    @media (min-width: 769px) {
        .col-lg-2-5 {
            flex: 0 0 20%;
        }
    }
</style>

@endsection
