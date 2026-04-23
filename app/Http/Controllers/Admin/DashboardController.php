<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class DashboardController extends Controller
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
     * Show dashboard
     */
    public function index(): View
    {
        // Statistik
        $total_orders = Order::count();
        $pending_orders = Order::where('status', Order::STATUS_PENDING)->count();
        $processing_orders = Order::where('status', Order::STATUS_DIPROSES)->count();
        $completed_orders = Order::where('status', Order::STATUS_SELESAI)->count();

        // Recent orders
        $recent_orders = Order::latest()->take(10)->get();

        // Total revenue
        $total_revenue = Order::where('status', Order::STATUS_SELESAI)->sum('harga');

        return view('admin.dashboard', [
            'total_orders' => $total_orders,
            'pending_orders' => $pending_orders,
            'processing_orders' => $processing_orders,
            'completed_orders' => $completed_orders,
            'recent_orders' => $recent_orders,
            'total_revenue' => $total_revenue,
        ]);
    }
}
