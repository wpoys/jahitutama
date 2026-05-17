<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\Gallery;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show home page
     */
    public function index(): View
    {
        $services = Service::all();
        $orders_count = Order::whereIn('status', ['selesai'])->count();
        $customers_count = Order::distinct('email')->count('email');
        $galleries = Gallery::latest()->take(9)->get();

        $steps = [
            ['num' => '01', 'title' => 'Konsultasi', 'desc' => 'Hubungi kami untuk jelaskan kebutuhan jahitan Anda dengan detail.'],
            ['num' => '02', 'title' => 'Pengukuran', 'desc' => 'Tim kami mencatat ukuran dan preferensi Anda dengan presisi.'],
            ['num' => '03', 'title' => 'Proses Jahit', 'desc' => 'Pesanan diproses dengan rapi, teliti, dan penuh perhatian.'],
            ['num' => '04', 'title' => 'Fitting', 'desc' => 'Fitting untuk memastikan hasil sesuai ekspektasi Anda.'],
            ['num' => '05', 'title' => 'Pengambilan', 'desc' => 'Pakaian selesai dicek kualitas, siap diambil atau diantar.'],
        ];

        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'role' => 'Pelanggan Setia',
                'text' => 'Hasil jahitan sangat rapi dan memuaskan. Proses cepat dan sesuai jadwal. Saya sangat merekomendasikan Wildan Tailor!',
                'rating' => 5,
            ],
            [
                'name' => 'Siti Muniroh',
                'role' => 'Pengguna Reguler',
                'text' => 'Pelayanan ramah, profesional, dan harga terjangkau. Kualitas tidak mengecewakan. Sudah berkali-kali pesan!',
                'rating' => 5,
            ],
            [
                'name' => 'Ahmad Wijaya',
                'role' => 'Klien Korporat',
                'text' => 'Jahitan untuk kebutuhan bisnis kami sangat sempurna. Detail dan finishing terlihat premium. Terima kasih!',
                'rating' => 5,
            ],
        ];

        $faqs = [
            [
                'q' => 'Berapa lama pengerjaan?',
                'a' => 'Estimasi 7–14 hari kerja tergantung jenis dan kerumitan pakaian. Untuk pesanan mendesak, hubungi kami terlebih dahulu untuk konfirmasi jadwal.',
            ],
            [
                'q' => 'Apakah bisa custom desain?',
                'a' => 'Ya! Kami menerima custom desain. Silakan bawa referensi foto, sketsa, atau gambar — tim kami akan bantu mewujudkan sesuai keinginan Anda.',
            ],
            [
                'q' => 'Apakah menerima permak?',
                'a' => 'Tentu. Kami menerima berbagai layanan permak: ubah ukuran, ganti resleting, perpendek panjang, dan lainnya.',
            ],
            [
                'q' => 'Apakah bisa konsultasi dulu?',
                'a' => 'Bisa! Konsultasi gratis, bisa langsung di tempat atau via WhatsApp. Kami dengan senang hati membantu memilihkan model dan bahan terbaik.',
            ],
            [
                'q' => 'Bagaimana sistem pembayaran?',
                'a' => 'DP 50% di awal pemesanan, pelunasan saat pakaian selesai dan siap diambil. Kami menerima transfer bank dan pembayaran tunai.',
            ],
        ];

        return view('pages.index', [
            'services' => $services,
            'orders_count' => $orders_count,
            'customers_count' => $customers_count,
            'galleries' => $galleries,
            'steps' => $steps,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
        ]);
    }

    /**
     * Show about page
     */
    public function tentang(): View
    {
        return view('pages.tentang');
    }

    /**
     * Show services page
     */
    public function layanan(): View
    {
        $services = Service::all();
        return view('pages.layanan', ['services' => $services]);
    }

    /**
     * Show pricing table page
     */
    public function harga(): View
    {
        $services = Service::orderBy('harga_mulai')->get();

        return view('pages.harga', [
            'services' => $services,
        ]);
    }

    /**
     * Show gallery page
     */
    public function galeri(): View
    {
        $categories = Gallery::distinct('kategori')->pluck('kategori');
        $galleries = Gallery::latest()->paginate(12);

        return view('pages.galeri', [
            'galleries' => $galleries,
            'categories' => $categories,
        ]);
    }

    /**
     * Filter gallery by category
     */
    public function galeriByKategori($kategori)
    {
        $categories = Gallery::distinct('kategori')->pluck('kategori');
        $galleries = Gallery::where('kategori', $kategori)->latest()->paginate(12);

        return view('pages.galeri', [
            'galleries' => $galleries,
            'categories' => $categories,
            'active_category' => $kategori,
        ]);
    }

    /**
     * Show ordering process page
     */
    public function caraOrder(): View
    {
        return view('pages.cara-order');
    }

    /**
     * Show FAQ page
     */
    public function faq(): View
    {
        return view('pages.faq');
    }

    /**
     * Show katalog index page with categories
     */
    public function katalogIndex(): View
    {
        $featuredItems = [
            [
                'label' => 'Pakaian Wanita',
                'title' => 'Dress, kebaya, blouse',
                'price' => 'Mulai Rp 150rb',
                'icon' => 'fa-person-dress',
            ],
            [
                'label' => 'Pakaian Pria',
                'title' => 'Kemeja, jas, setelan',
                'price' => 'Mulai Rp 175rb',
                'icon' => 'fa-person',
            ],
            [
                'label' => 'Pesta & Pengantin',
                'title' => 'Gaun premium dan custom',
                'price' => 'Mulai Rp 300rb',
                'icon' => 'fa-star',
            ],
            [
                'label' => 'Alterasi Cepat',
                'title' => 'Permak dan penyesuaian ukuran',
                'price' => 'Mulai Rp 50rb',
                'icon' => 'fa-scissors',
            ],
            [
                'label' => 'Seragam',
                'title' => 'Sekolah, kantor, komunitas',
                'price' => 'Harga paket',
                'icon' => 'fa-shirt',
            ],
        ];

        $catalogSections = [
            [
                'slug' => 'jahit-baru-pakaian-wanita',
                'title' => 'Estimasi Harga Jahit Baru Pakaian Wanita',
                'icon' => 'fa-person-dress',
                'summary' => 'Untuk kebaya, blouse, dress, rok, dan setelan wanita custom.',
                'items' => ['Kebaya modern dan tradisional', 'Dress casual dan formal', 'Blouse, rok, dan setelan custom'],
                'note' => 'Harga mengikuti bahan, detail, dan tingkat kerumitan desain.',
            ],
            [
                'slug' => 'jahit-baru-pakaian-pria',
                'title' => 'Estimasi Harga Jahit Baru Pakaian Pria',
                'icon' => 'fa-person',
                'summary' => 'Untuk kemeja, jas, celana, dan setelan pria custom.',
                'items' => ['Kemeja kerja dan casual', 'Jas formal dan semi formal', 'Celana dan setelan custom'],
                'note' => 'Cocok untuk kebutuhan kerja, acara resmi, dan seragam khusus.',
            ],
            [
                'slug' => 'gaun-pengantin-pesta',
                'title' => 'Estimasi Harga Gaun Pengantin & Pesta',
                'icon' => 'fa-star',
                'summary' => 'Gaun pengantin, gaun pesta, dan busana acara spesial.',
                'items' => ['Gaun pengantin custom', 'Gaun pesta dan bridesmaid', 'Finishing detail premium'],
                'note' => 'Disarankan konsultasi model dan bahan sebelum proses jahit.',
            ],
            [
                'slug' => 'alterasi-permak-pakaian',
                'title' => 'Estimasi Harga Alterasi & Permak Pakaian',
                'icon' => 'fa-scissors',
                'summary' => 'Perbaikan ukuran, potong, tambah, dan ubah model pakaian.',
                'items' => ['Memperpendek atau memperpanjang', 'Memperkecil atau memperbesar', 'Ganti resleting dan perbaikan ringan'],
                'note' => 'Harga mulai dari pekerjaan ringan hingga revisi model.',
            ],
            [
                'slug' => 'alterasi-komponen-detail',
                'title' => 'Estimasi Harga Alterasi Komponen & Detail',
                'icon' => 'fa-ruler-combined',
                'summary' => 'Perubahan bagian detail seperti lengan, kerah, furing, dan aksen.',
                'items' => ['Perubahan lengan dan kerah', 'Tambah furing atau lapisan', 'Penyesuaian detail dekoratif'],
                'note' => 'Pengerjaan menyesuaikan struktur pakaian dan kerapian jahitan.',
            ],
            [
                'slug' => 'jasa-tambahan-spesialisasi',
                'title' => 'Estimasi Harga Jasa Tambahan Spesialisasi',
                'icon' => 'fa-pen-ruler',
                'summary' => 'Layanan tambahan untuk kebutuhan desain dan spesialisasi tertentu.',
                'items' => ['Pola custom', 'Konsultasi bahan dan model', 'Pekerjaan khusus untuk kebutuhan event'],
                'note' => 'Sangat cocok untuk kebutuhan satuan maupun pesanan khusus.',
            ],
            [
                'slug' => 'tips-penjahit-tepat',
                'title' => 'Tips Memilih Penjahit yang Tepat',
                'icon' => 'fa-lightbulb',
                'summary' => 'Panduan singkat sebelum memilih jasa jahit.',
                'items' => ['Lihat hasil jahitan sebelumnya', 'Tanyakan estimasi biaya dan waktu', 'Pastikan komunikasi mudah'],
                'note' => 'Penjahit yang baik biasanya transparan soal bahan, waktu, dan revisi.',
            ],
            [
                'slug' => 'syarat-ketentuan-ekspres',
                'title' => 'Syarat & Ketentuan Jasa Ekspres',
                'icon' => 'fa-file-contract',
                'summary' => 'Ketentuan untuk pengerjaan cepat dan prioritas.',
                'items' => ['Menyesuaikan antrean produksi', 'Biaya tambahan untuk ekspres', 'Konfirmasi ukuran harus jelas'],
                'note' => 'Untuk pesanan mendesak, sebaiknya hubungi kami terlebih dahulu.',
            ],
        ];

        return view('pages.katalog', [
            'featuredItems' => $featuredItems,
            'catalogSections' => $catalogSections,
            'stockItems' => [
                [
                    'slug' => 'kebaya-ready',
                    'nama' => 'Kebaya',
                    'price_formatted' => 'Rp 300.000',
                    'badge' => 'Paling Populer',
                    'image' => asset('assets/image/kebaya.jpg'),
                ],
                [
                    'slug' => 'jas-pria-ready',
                    'nama' => 'Jas Pria',
                    'price_formatted' => 'Rp 1.100.000',
                    'badge' => null,
                    'image' => asset('assets/image/jas.jpg'),
                ],
                [
                    'slug' => 'gaun-pengantin-ready',
                    'nama' => 'Gaun Pengantin',
                    'price_formatted' => 'Rp 1.000.000',
                    'badge' => null,
                    'image' => asset('assets/image/gaun-pengantin.jpg'),
                ],
                [
                    'slug' => 'gaun-pesta-ready',
                    'nama' => 'Gaun Pesta',
                    'price_formatted' => 'Rp 500.000',
                    'badge' => null,
                    'image' => asset('assets/image/gaun-pesta.jpg'),
                ],
            ],
        ]);
    }

    /**
     * Show catalog item detail page
     */
    public function katalogShow($slug): View
    {
        // Define catalog structure
        $catalogs = [
            'kebaya' => [
                'nama' => 'Kebaya',
                'kategori' => 'Wanita',
                'deskripsi' => 'Desain kebaya tradisional dan modern dengan bordir tangan atau mesin. Kami menawarkan berbagai pilihan warna dan motif yang elegan.',
                'harga_mulai' => 300000,
                'estimasi_hari' => 5,
            ],
            'gamis' => [
                'nama' => 'Gamis',
                'kategori' => 'Wanita',
                'deskripsi' => 'Gamis casual hingga formal dengan berbagai model dan ukuran. Bahan berkualitas dengan jahitan yang rapi dan presisi.',
                'harga_mulai' => 200000,
                'estimasi_hari' => 4,
            ],
            'dress' => [
                'nama' => 'Dress',
                'kategori' => 'Wanita',
                'deskripsi' => 'Dress custom dari casual hingga formal untuk berbagai acara spesial. Desain elegan dengan finishing sempurna.',
                'harga_mulai' => 250000,
                'estimasi_hari' => 5,
            ],
            'jas' => [
                'nama' => 'Jahitan Jas',
                'kategori' => 'Pria',
                'deskripsi' => 'Pembuatan jas custom dengan kualitas premium. Tersedia dalam berbagai pilihan kain berkualitas tinggi dan desain yang dapat disesuaikan dengan preferensi Anda.',
                'harga_mulai' => 500000,
                'estimasi_hari' => 7,
            ],
            'kemeja' => [
                'nama' => 'Kemeja',
                'kategori' => 'Pria',
                'deskripsi' => 'Kemeja custom dengan jahitan presisi dan fitting sempurna. Tersedia dalam berbagai model, warna, dan bahan berkualitas.',
                'harga_mulai' => 150000,
                'estimasi_hari' => 3,
            ],
            'permak' => [
                'nama' => 'Permak',
                'kategori' => 'Lainnya',
                'deskripsi' => 'Perbaikan dan modifikasi pakaian lama Anda. Termasuk memperpendek, memperlebar, merubah model, dan perbaikan kerusakan lainnya.',
                'harga_mulai' => 50000,
                'estimasi_hari' => 2,
            ],
            'seragam' => [
                'nama' => 'Seragam',
                'kategori' => 'Lainnya',
                'deskripsi' => 'Penjahitan seragam kantor, sekolah, dan organisasi dengan standar kualitas tinggi. Bisa custom dengan logo dan desain khusus.',
                'harga_mulai' => 150000,
                'estimasi_hari' => 3,
            ],
        ];

        // Get catalog item or abort if not found
        if (!isset($catalogs[$slug])) {
            abort(404);
        }

        $item = $catalogs[$slug];
        
        return view('pages.katalog-detail', [
            'item' => $item,
            'slug' => $slug,
        ]);
    }

    /**
     * Show contact page
     */
    public function kontak(): View
    {
        return view('pages.kontak');
    }

    /**
     * Show order form page
     */
    public function order(): View
    {
        $services = Service::all();
        return view('pages.order', ['services' => $services]);
    }
}
