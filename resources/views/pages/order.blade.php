@extends('layouts.app')

@section('title', 'Pesan Sekarang - Wildan Tailor')

@section('content')

<!-- Page Header -->
<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1><i class="fas fa-shopping-bag"></i> Formulir Pemesanan</h1>
        <p>Silakan isi formulir di bawah untuk membuat pesanan Anda</p>
    </div>
</div>

<!-- Order Form -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Mohon periksa kembali formulir:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf

                            {{-- Nama Pemesan --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="nama_pemesan">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}" required>
                                @error('nama_pemesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nomor HP --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="nomor_hp">Nomor HP/WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Contoh: 0812-3456-7890" required>
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Layanan --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="jenis_layanan">Jenis Layanan <span class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan" name="jenis_layanan" required onchange="updatePrice()">
                                    <option value="">-- Pilih Layanan --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->nama_layanan }}" data-price="{{ $service->harga_mulai }}" data-days="{{ $service->estimasi_hari }}" {{ old('jenis_layanan') === $service->nama_layanan ? 'selected' : '' }}>
                                            {{ $service->nama_layanan }} - Rp {{ number_format($service->harga_mulai, 0, ',', '.') }} ({{ $service->estimasi_hari }} hari)
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_layanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi Pekerjaan --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="deskripsi">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan detail pekerjaan yang Anda inginkan..." required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Perkiraan Harga --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Perkiraan Harga</label>
                                <div class="alert alert-info" id="price-alert">
                                    <strong id="price-display">Silakan pilih layanan terlebih dahulu</strong>
                                </div>
                            </div>

                            {{-- Perkiraan Waktu --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Perkiraan Waktu Pengerjaan</label>
                                <div class="alert alert-warning" id="time-alert">
                                    <strong id="time-display">Silakan pilih layanan terlebih dahulu</strong>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-check"></i> Kirim Pesanan
                            </button>

                            <p class="text-muted text-center mt-3 small">
                                <i class="fas fa-info-circle"></i> Kami akan menghubungi Anda dalam waktu maksimal 2 jam setelah pesanan diterima
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function updatePrice() {
        const select = document.getElementById('jenis_layanan');
        const selectedOption = select.options[select.selectedIndex];
        
        if (selectedOption.value !== '') {
            const price = selectedOption.getAttribute('data-price');
            const days = selectedOption.getAttribute('data-days');
            
            document.getElementById('price-display').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
            document.getElementById('time-display').innerText = days + ' hari kerja';
        } else {
            document.getElementById('price-display').innerText = 'Silakan pilih layanan terlebih dahulu';
            document.getElementById('time-display').innerText = 'Silakan pilih layanan terlebih dahulu';
        }
    }
</script>

@endsection
