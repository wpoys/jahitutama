<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Constructor - require admin login
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show all orders with filtering
     */
    public function index(Request $request): View
    {
        $query = Order::query();

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Search by name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemesan', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nomor_hp', 'like', "%{$search}%");
            });
        }

        $orders = $query->latest()->paginate(15);
        $statuses = Order::statuses();

        return view('admin.orders.index', [
            'orders' => $orders,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Show order details
     */
    public function show($id): View
    {
        $order = Order::findOrFail($id);
        $statuses = Order::statuses();

        return view('admin.orders.show', [
            'order' => $order,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update order
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
            'catatan_admin' => 'nullable|string',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    /**
     * Delete order
     */
    public function destroy($id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }
}
