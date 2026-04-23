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
        $galleries = Gallery::latest()->take(6)->get();

        return view('pages.index', [
            'services' => $services,
            'orders_count' => $orders_count,
            'customers_count' => $customers_count,
            'galleries' => $galleries,
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
     * Show pricing page
     */
    public function harga(): View
    {
        $services = Service::all();
        return view('pages.harga', ['services' => $services]);
    }

    /**
     * Show ordering process page
     */
    public function caraOrder(): View
    {
        return view('pages.cara-order');
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
