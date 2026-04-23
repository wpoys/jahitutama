@extends('layouts.app')

@section('title', 'Kontak Kami - Wildan Tailor')

@section('content')

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 50px 0;">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p>Kami siap melayani pertanyaan dan konsultasi Anda</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            {{-- Contact Info --}}
            <div class="col-md-6 mb-4">
                <h3 style="color: #667eea; margin-bottom: 20px;">Informasi Kontak</h3>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <i class="fas fa-map-marker-alt" style="color: #ffc107; font-size: 20px; margin-right: 10px;"></i>
                        <strong>Alamat</strong>
                        <p class="text-muted">Jl. Merdeka No. 123, Bandung</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <i class="fas fa-phone" style="color: #667eea; font-size: 20px; margin-right: 10px;"></i>
                        <strong>Telepon</strong>
                        <p class="text-muted"><a href="tel:+6285725773519">+6285725773519</a></p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <i class="fab fa-whatsapp" style="color: #25d366; font-size: 20px; margin-right: 10px;"></i>
                        <strong>WhatsApp</strong>
                        <p class="text-muted"><a href="https://wa.me/6285725773519">+6285725773519</a></p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <i class="fas fa-envelope" style="color: #dc3545; font-size: 20px; margin-right: 10px;"></i>
                        <strong>Email</strong>
                        <p class="text-muted"><a href="mailto:info@wdtailor.com">info@wdtailor.com</a></p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <i class="fas fa-clock" style="color: #ffc107; font-size: 20px; margin-right: 10px;"></i>
                        <strong>Jam Operasional</strong>
                        <p class="text-muted">
                            Senin - Jumat: 09:00 - 18:00<br>
                            Sabtu: 09:00 - 16:00<br>
                            Minggu: Libur
                        </p>
                    </div>
                </div>
            </div>

            {{-- Map --}}
            <div class="col-md-6">
                <div class="ratio ratio-1x1" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8482816394366!2d107.60981!3d-6.914744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6b7e0e0e0e1%3A0x1234567890abcdef!2sJl.%20Merdeka%20No.%20123!5e0!3m2!1sid!2sid!4v1234567890" style="border: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <script>
                // Redirect ke Google Maps link jika dicari
                document.querySelector('.col-md-6 .ratio').addEventListener('click', function() {
                    window.open('https://maps.app.goo.gl/WQD2ATWFiRRLWkjMA', '_blank');
                });
            </script>
        </div>
    </div>
</section>

{{-- Social Media Section --}}
<section class="py-5" style="background: #f5f7fa;">
    <div class="container">
        <h3 style="color: #667eea; margin-bottom: 20px; text-align: center;">Ikuti Kami di Media Sosial</h3>
        <div class="d-flex justify-content-center gap-3">
            <a href="#" class="btn btn-primary btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-info btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-danger btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="btn btn-success btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>
    </div>
</section>

@endsection
