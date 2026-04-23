@extends('layouts.app')

@section('title', 'Harga & Paket - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1>Daftar Harga & Paket</h1>
        <p>Lihat harga terjangkau untuk semua layanan kami</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background: #f5f7fa;">
                    <tr>
                        <th>Layanan</th>
                        <th>Deskripsi</th>
                        <th>Harga Mulai</th>
                        <th>Estimasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td><strong>{{ $service->nama_layanan }}</strong></td>
                            <td>{{ Str::limit($service->deskripsi, 50) }}</td>
                            <td style="color: #ffc107; font-weight: bold;">Rp {{ number_format($service->harga_mulai, 0, ',', '.') }}</td>
                            <td>{{ $service->estimasi_hari }} hari</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
