@extends('layouts.admin')

@section('page-title', 'Upload Foto Galeri')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0">Upload Foto Baru</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="judul">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Nama atau judul foto..." required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi foto (opsional)">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="kategori">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ old('kategori') === $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Upload Gambar --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold" for="gambar_file">Pilih Gambar <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('gambar_file') is-invalid @enderror" id="gambar_file" name="gambar_file" accept="image/*" required onchange="previewImage(event)">
                            @error('gambar_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted d-block mt-2">Format: JPG, PNG, GIF (Max 2MB)</small>

                        {{-- Preview --}}
                        <div id="preview-container" style="margin-top: 15px; display: none;">
                            <img id="preview-image" src="" alt="Preview" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Upload
                        </button>
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
                document.getElementById('preview-container').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
