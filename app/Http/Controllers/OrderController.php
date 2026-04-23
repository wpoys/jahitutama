<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Show order form page
     */
    public function show(): View
    {
        $services = Service::all();
        return view('pages.order', ['services' => $services]);
    }

    /**
     * Store new order
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'nomor_hp' => 'required|string|max:20',
            'jenis_layanan' => 'required|string|max:100|exists:services,nama_layanan',
            'deskripsi' => 'required|string',
            'estimasi_waktu' => 'nullable|string|max:50',
        ], [
            'nama_pemesan.required' => 'Nama pemesan harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'nomor_hp.required' => 'Nomor HP harus diisi',
            'jenis_layanan.required' => 'Jenis layanan harus dipilih',
            'deskripsi.required' => 'Deskripsi pekerjaan harus diisi',
        ]);

        try {
            // Ambil data service
            $service = Service::where('nama_layanan', $validated['jenis_layanan'])->first();

            // Buat order baru
            $order = Order::create([
                'nama_pemesan' => $validated['nama_pemesan'],
                'email' => $validated['email'],
                'nomor_hp' => $validated['nomor_hp'],
                'jenis_layanan' => $validated['jenis_layanan'],
                'deskripsi' => $validated['deskripsi'],
                'estimasi_waktu' => $service->estimasi_hari . ' hari',
                'harga' => $service->harga_mulai,
                'status' => Order::STATUS_PENDING,
            ]);

            return redirect()->route('order.success', ['id' => $order->id])
                ->with('success', 'Pesanan berhasil dikirim! Kami akan menghubungi Anda segera.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengirim pesanan. Silahkan coba lagi.');
        }
    }

    /**
     * Show success page
     */
    public function success($id): View
    {
        $order = Order::findOrFail($id);
        return view('pages.order-success', ['order' => $order]);
    }
}
