@extends('layouts.admin')

@section('page-title', 'Daftar Pesanan')

@section('content')

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-bottom">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h5 class="card-title mb-0">Pesanan</h5>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-sync"></i> Refresh
            </a>
        </div>
    </div>

    {{-- Filter & Search --}}
    <div class="card-body border-bottom">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Cari nama, email, atau nomor HP..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="status" class="form-select">
                    <option value="">-- Semua Status --</option>
                    @foreach ($statuses as $key => $label)
                        <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>
    </div>

    {{-- Orders Table --}}
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Nama Pemesan</th>
                    <th>Email</th>
                    <th>Layanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $key => $order)
                    <tr>
                        <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $key + 1 }}</td>
                        <td>{{ $order->nama_pemesan }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->jenis_layanan }}</td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
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
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-inbox"></i> Tidak ada pesanan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="card-footer bg-white">
        {{ $orders->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
