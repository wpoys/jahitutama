@extends('layouts.admin')

@section('page-title', 'Detail Pesanan')

@section('content')

<div class="row">
    {{-- Order Details --}}
    <div class="col-md-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Detail Pesanan #{{ $order->id }}</h5>
                    <span class="badge bg-{{ match($order->status) {
                        'pending' => 'warning',
                        'diproses' => 'info',
                        'selesai' => 'success',
                        'dibatalkan' => 'danger',
                        default => 'secondary',
                    } }}">{{ $order->status_label }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong> {{ $order->email }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nomor HP:</strong> 
                        <a href="https://wa.me/{{ str_replace(['-', ' '], '', $order->nomor_hp) }}" target="_blank">
                            {{ $order->nomor_hp }} <i class="fab fa-whatsapp" style="color: #25d366;"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <strong>Layanan:</strong> {{ $order->jenis_layanan }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Tanggal Pesan:</strong> {{ $order->created_at->format('d M Y H:i') }}
                    </div>
                    <div class="col-md-6">
                        <strong>Estimasi Waktu:</strong> {{ $order->estimasi_waktu }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Harga:</strong> Rp {{ number_format($order->harga, 0, ',', '.') }}
                    </div>
                    <div class="col-md-6">
                        <strong>Tanggal Selesai:</strong> {{ $order->tanggal_selesai ? $order->tanggal_selesai->format('d M Y') : '-' }}
                    </div>
                </div>
                <div class="mb-3">
                    <strong>Deskripsi Pekerjaan:</strong>
                    <div class="mt-2" style="background: #f5f7fa; padding: 15px; border-radius: 5px;">
                        {{ $order->deskripsi }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Form --}}
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0">Update Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Status Select --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select">
                            @foreach ($statuses as $key => $label)
                                <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" value="{{ $order->tanggal_selesai ? $order->tanggal_selesai->format('Y-m-d') : '' }}">
                    </div>

                    {{-- Catatan Admin --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Catatan Admin</label>
                        <textarea name="catatan_admin" class="form-control" rows="4" placeholder="Tambahkan catatan atau update terkini...">{{ $order->catatan_admin }}</textarea>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        {{-- Quick Actions --}}
        @if ($order->catatan_admin)
            <div class="card shadow-sm border-0 mt-3">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Catatan Admin</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted" style="white-space: pre-wrap;">{{ $order->catatan_admin }}</p>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
