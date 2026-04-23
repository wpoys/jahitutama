@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<div class="row mb-4">
    {{-- Total Orders Card --}}
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <h5>Total Pesanan</h5>
            <div class="number">{{ $total_orders }}</div>
        </div>
    </div>

    {{-- Pending Orders Card --}}
    <div class="col-md-3 mb-3">
        <div class="stat-card" style="border-left-color: #ffc107;">
            <h5>Pesanan Pending</h5>
            <div class="number" style="color: #ffc107;">{{ $pending_orders }}</div>
        </div>
    </div>

    {{-- Processing Orders Card --}}
    <div class="col-md-3 mb-3">
        <div class="stat-card" style="border-left-color: #667eea;">
            <h5>Sedang Diproses</h5>
            <div class="number" style="color: #667eea;">{{ $processing_orders }}</div>
        </div>
    </div>

    {{-- Completed Orders Card --}}
    <div class="col-md-3 mb-3">
        <div class="stat-card" style="border-left-color: #28a745;">
            <h5>Selesai</h5>
            <div class="number" style="color: #28a745;">{{ $completed_orders }}</div>
        </div>
    </div>
</div>

{{-- Revenue Card --}}
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">Total Pendapatan (Pesanan Selesai)</h5>
                <div style="font-size: 28px; font-weight: bold; color: #667eea;">
                    Rp {{ number_format($total_revenue, 0, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Recent Orders --}}
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Pesanan Terbaru</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua →</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Layanan</th>
                            <th>Tanggal Pesan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recent_orders as $order)
                            <tr>
                                <td>{{ $order->nama_pemesan }}</td>
                                <td>{{ $order->jenis_layanan }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $badge_class = match($order->status) {
                                            'pending' => 'warning',
                                            'diproses' => 'info',
                                            'selesai' => 'success',
                                            'dibatalkan' => 'danger',
                                            default => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge_class }}">{{ $order->status_label }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    Belum ada pesanan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .stat-card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-left: 4px solid #667eea;
    }

    .stat-card h5 {
        color: #999;
        font-size: 12px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .stat-card .number {
        font-size: 28px;
        font-weight: bold;
        color: #667eea;
    }
</style>

@endsection
