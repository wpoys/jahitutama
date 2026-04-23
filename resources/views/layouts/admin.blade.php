<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Wildan Tailor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Admin CSS -->
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">

    @yield('extra-css')

    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --accent: #ffc107;
            --dark: #1a1a1a;
            --light: #f5f7fa;
        }

        body {
            background-color: var(--light);
        }

        .sidebar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .sidebar .navbar-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent);
        }

        .top-header {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--primary);
        }

        .stat-card h5 {
            color: #999;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .stat-card .number {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar Navigation --}}
        <nav class="navbar navbar-expand-lg sidebar d-flex flex-column">
            <div class="navbar-brand text-white">
                <h5>👔 WILDAN TAILOR</h5>
                <small>Admin Panel</small>
            </div>

            <ul class="navbar-nav w-100 flex-column mt-3">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->route()->getName() === 'admin.dashboard' ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ str_contains(request()->route()->getName(), 'admin.orders') ? 'active' : '' }}">
                        <i class="fas fa-shopping-bag"></i> Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ str_contains(request()->route()->getName(), 'admin.galleries') ? 'active' : '' }}">
                        <i class="fas fa-images"></i> Galeri
                    </a>
                </li>
            </ul>

            <div class="mt-auto px-3 py-3 border-top border-light border-opacity-25 w-100">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light w-100">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        {{-- Main Content --}}
        <div class="main-content w-100">
            {{-- Top Header --}}
            <div class="top-header">
                <h3 class="mb-0">@yield('page-title', 'Dashboard')</h3>
                <div>
                    <span class="me-3">
                        <i class="fas fa-user"></i> {{ auth()->user()->name }}
                    </span>
                </div>
            </div>

            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Page Content --}}
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('extra-js')
</body>
</html>
