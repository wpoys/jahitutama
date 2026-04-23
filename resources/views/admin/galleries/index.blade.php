@extends('layouts.admin')

@section('page-title', 'Manajemen Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="card-title mb-0">Daftar Foto Galeri</h5>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Upload Foto Baru
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Uploader</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galleries as $gallery)
                    <tr>
                        <td>
                            <img src="{{ Storage::url('galleries/' . $gallery->gambar_file) }}" alt="{{ $gallery->judul }}" style="height: 50px; width: 50px; object-fit: cover; border-radius: 5px;">
                        </td>
                        <td>{{ $gallery->judul }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst($gallery->kategori) }}</span>
                        </td>
                        <td>{{ $gallery->user->name ?? '-' }}</td>
                        <td>{{ $gallery->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada foto. <a href="{{ route('admin.galleries.create') }}">Upload sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white">
        {{ $galleries->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
