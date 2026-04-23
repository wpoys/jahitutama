@extends('layouts.app')

@section('title', 'Tentang Kami - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1>Tentang Wildan Tailor</h1>
        <p>Penyedia Jasa Penjahitan Profesional Terpercaya</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h2 style="color: #667eea; margin-bottom: 30px;">Profil Perusahaan</h2>
        <p class="text-muted">Wildan Tailor adalah perusahaan yang bergerak di bidang jasa penjahitan. Dengan pengalaman lebih dari 10 tahun, kami terus berinovasi untuk memberikan layanan terbaik kepada setiap pelanggan setia kami.</p>
        
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <h4 style="color: #667eea;">Visi</h4>
                <p class="text-muted">Menjadi penyedia jasa penjahitan terkemuka yang dikenal dengan kualitas, profesionalisme, dan inovasi dalam setiap karya.</p>
            </div>
            <div class="col-md-6 mb-4">
                <h4 style="color: #667eea;">Misi</h4>
                <p class="text-muted">Memberikan layanan penjahitan berkualitas tinggi dengan harga yang terjangkau, melayani dengan sepenuh hati, dan menciptakan kepuasan pelanggan dalam setiap aspek bisnis kami.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: #f5f7fa;">
    <div class="container">
        <h2 style="color: #667eea; margin-bottom: 30px;">Keunggulan Kami</h2>
        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
                <div class="col-md-4 mb-4">
                    <div class="text-center">
                        <div style="font-size: 40px; color: #ffc107; margin-bottom: 15px;">
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 style="color: #667eea;">Keunggulan {{ $i }}</h5>
                        <p class="text-muted">Deskripsi singkat tentang keunggulan layanan kami.</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

@endsection
