# 📚 Panduan Konversi: Plain PHP → Laravel 11

Dokumen ini menjelaskan bagaimana website Wildan Tailor dari Plain PHP telah dikonversi ke Laravel 11.

## 📊 Perbandingan Struktur

### Plain PHP (SEBELUMNYA)

```
wildan-tailor/
├── index.php, tentang.php, layanan.php, dll (halaman langsung)
├── config/database.php (konfigurasi manual)
├── includes/functions.php (helper functions)
├── includes/header.php, footer.php (template files)
├── admin/login.php, dashboard.php, dll (halaman admin)
├── assets/css/, js/, images/ (static files)
└── database.sql (schema manual)
```

**Masalah:**
- ❌ Tidak ada struktur MVC yang jelas
- ❌ Manual dependency management
- ❌ Tidak ada built-in security
- ❌ Sulit scale dan maintain
- ❌ Request routing manual

### Laravel 11 (SESUDAHNYA)

```
wildan-tailor/
├── app/Models/ (Eloquent models)
├── app/Http/Controllers/ (Controllers)
├── app/Http/Middleware/ (Middleware)
├── resources/views/ (Blade templates)
├── database/migrations/ (Schema migrations)
├── database/seeders/ (Database seeding)
├── routes/web.php (Route definitions)
├── config/ (Configuration)
├── public/ (Web root)
├── storage/ (File uploads)
└── bootstrap/app.php (Application bootstrap)
```

**Keuntungan:**
- ✅ MVC architecture terstruktur
- ✅ Composer untuk dependency management
- ✅ Built-in security (CSRF, SQL injection prevention)
- ✅ Eloquent ORM untuk database
- ✅ Blade templating engine
- ✅ Middleware untuk request handling
- ✅ Easy to scale dan maintain
- ✅ Automatic routing

---

## 🔄 Konversi File-by-File

### 1. Plain PHP Pages → Controllers + Blade Views

#### SEBELUMNYA: `index.php`
```php
<?php
require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'includes/header.php';

$services = $conn->query("SELECT * FROM layanan")->fetch_all(MYSQLI_ASSOC);
?>
<!-- HTML content -->
```

#### SESUDAHNYA: `PageController.php`
```php
<?php
namespace App\Http\Controllers;

use App\Models\Service;

class PageController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('pages.index', ['services' => $services]);
    }
}
```

#### SESUDAHNYA: `resources/views/pages/index.blade.php`
```blade
@extends('layouts.app')

@section('content')
    @foreach ($services as $service)
        <div>{{ $service->nama_layanan }}</div>
    @endforeach
@endsection
```

### 2. Database Connection → Eloquent Models

#### SEBELUMNYA: `config/database.php`
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
$conn = new mysqli(DB_HOST, DB_USER, ...);
if ($conn->connect_error) die("Koneksi gagal");

// Query
$result = $conn->query("SELECT * FROM orders");
```

#### SESUDAHNYA: `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=wildan_tailor
DB_USERNAME=root
```

#### SESUDAHNYA: `app/Models/Order.php`
```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['nama_pemesan', 'email', ...];
}

// Usage
$orders = Order::all();
$order = Order::find($id);
$order->update(['status' => 'selesai']);
```

### 3. Session Management → Laravel Auth

#### SEBELUMNYA: `admin/login.php`
```php
<?php
session_start();

function is_admin_logged_in() {
    return isset($_SESSION['admin_id']);
}

if ($login_success) {
    $_SESSION['admin_id'] = $user['id'];
    header("Location: dashboard.php");
}
```

#### SESUDAHNYA: Laravel Auth Middleware
```php
// Routes protected by middleware
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'destroy']);
});

// Usage in blade
@auth
    {{ Auth::user()->name }}
@endauth
```

### 4. Manual HTML Templating → Blade Templating

#### SEBELUMNYA: `includes/header.php`
```html
<?php /* Every page include this */ ?>
<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="tentang.php">Tentang</a>
        <?php if (is_admin_logged_in()): ?>
            <a href="admin/dashboard.php">Admin</a>
        <?php endif; ?>
    </nav>
</header>
```

#### SESUDAHNYA: `resources/views/layouts/app.blade.php`
```blade
<!DOCTYPE html>
<html>
<head>
    @yield('extra-css')
</head>
<body>
    @include('components.navbar')
    @yield('content')
    @include('components.footer')
</body>
</html>
```

#### SESUDAHNYA: Child view
```blade
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Home Page</h1>
@endsection
```

### 5. Manual Routing →  Defined Routes

#### SEBELUMNYA: No routing system
```
// User manually type URLs
/index.php
/tentang.php
/admin/dashboard.php?action=edit&id=5
```

#### SESUDAHNYA: `routes/web.php`
```php
<?php
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/admin/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

// Generate URLs
{{ route('home') }}           // /
{{ route('tentang') }}        // /tentang
{{ route('orders.show', $id)}} // /admin/orders/5
```

### 6. Hardcoded Validation → Request Validation

#### SEBELUMNYA: `order.php`
```php
<?php
if ($_POST['nama_pemesan'] === '') {
    $error = "Nama tidak boleh kosong";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error = "Email tidak valid";
} 
// ... many more checks
```

#### SESUDAHNYA: `app/Http/Controllers/OrderController.php`
```php
<?php
$validated = $request->validate([
    'nama_pemesan' => 'required|string|max:100',
    'email' => 'required|email',
    'nomor_hp' => 'required|string|max:20',
], [
    'nama_pemesan.required' => 'Nama harus diisi',
    'email.email' => 'Email tidak valid',
]);

// All validation done automatically!
```

---

## 📋 Feature Mapping

| Plain PHP | Laravel 11 |
|-----------|-----------|
| `database.sql` | Migrations + Seeders |
| Direct `.php` pages | Controllers + Routes + Views |
| `includes/functions.php` | Models + Helpers |
| Session handling | Auth middleware |
| Manual validation | Request validation |
| `$_GET, $_POST` | `$request->input()` |
| `include/require` | `view()`, namespaces |
| Manual HTML templating | Blade templates |
| Global functions | Service container |
| No error handling | Exception handling |

---

## 🚀 Performance Improvements

### Caching

```php
// Laravel can cache queries, routes, config
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Eloquent vs Raw SQL

```php
// Plain PHP: inefficient
foreach ($conns->query("SELECT orders FROM ...") as $order) {
    $name = $order['nama'];
}

// Laravel: optimized
Order::with('relation')->get(); // Eager loading prevents N+1
```

### Database Indexing

```php
// Automatic with migrations
Schema::create('orders', function (Blueprint $table) {
    $table->string('email');
    $table->index('email'); // Automatic indexing
});
```

---

## 📦 Dependencies Management

### SEBELUMNYA: Manual inclusion

```php
require_once 'config/database.php';
require_once 'includes/functions.php';
// Manual path management, error-prone
```

### SESUDAHNYA: Composer autoloading

```php
<?php
// composer.json defines dependencies
{
    "require": {
        "php": "^8.2",
        "laravel/framework": "^11.0"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}

// Automatic loading
use App\Models\Order;
use App\Http\Controllers\OrderController;
```

---

## 🔐 Security Enhancements

### CSRF Protection

```blade
<!-- SEBELUMNYA: No protection -->
<form method="POST">
    <input name="email">
</form>

<!-- SESUDAHNYA: Automatic protection -->
<form method="POST">
    @csrf
    <input name="email">
</form>
```

### SQL Injection Prevention

```php
// SEBELUMNYA: Vulnerable!
$email = $_POST['email'];
$result = $conn->query("SELECT * FROM users WHERE email = '$email'");

// SESUDAHNYA: Safe with Eloquent
$user = User::where('email', $email)->first();

// Or safe queries
$user = DB::table('users')
    ->where('email', $email)
    ->first();
```

### Input Sanitization

```blade
<!-- SEBELUMNYA: Manual escaping needed everywhere -->
<?php echo htmlspecialchars($user->name); ?>

<!-- SESUDAHNYA: Automatic in Blade -->
{{ $user->name }} <!-- Already escaped! -->
```

---

## 🎯 Development Experience

### SEBELUMNYA: Manual everything
```
- Create .php file
- Create database table via phpMyAdmin
- Write SQL queries manually
- Handle errors manually
- Test manually
```

### SESUDAHNYA: Automated tooling
```
php artisan make:model Order -m  // Generate Model + Migration
php artisan make:controller OrderController // Generate Controller
php artisan migrate               // Run all migrations
php artisan db:seed             // Seed database
php artisan test                // Run tests
```

---

## 📝 Migration Checklist

When migrating from Plain PHP to Laravel:

- [x] Create Models for each entity (Order, Gallery, Service, User)
- [x] Create Migrations for database schema
- [x] Create Controllers with business logic
- [x] Create Blade views to replace PHP pages
- [x] Define routes in routes/web.php
- [x] Setup middleware for admin protection
- [x] Create seeders for initial data
- [x] Setup environment configuration
- [x] Test all pages and functionality
- [x] Configure file storage for uploads
- [x] Setup authentication system

---

## 💡 Best Practices Implemented

✅ **MVC Architecture** - Clear separation of concerns
✅ **Eloquent ORM** - Type-safe model interactions
✅ **Route Model Binding** - Automatic model resolution
✅ **Blade Templating** - Clean, readable templates
✅ **Request Validation** - Centralized validation logic
✅ **Database Migrations** - Version-controlled schema
✅ **Middleware** - Centralized request/response handling
✅ **Service Container** - Dependency injection
✅ **CSRF Protection** - Built-in security
✅ **Environment Configuration** - Secure config management

---

## 🔗 Useful Migration Resources

- **Laravel MVC Concept**: https://laravel.com/docs/11.x/structure-concepts
- **From procedural to OOP**: https://laravel.com/docs/11.x/eloquent
- **Blade Introduction**: https://laravel.com/docs/11.x/blade
- **Migrations**: https://laravel.com/docs/11.x/migrations

---

## ✨ Kesimpulan

Konversi dari Plain PHP ke Laravel 11 memberikan:

1. **Better Code Organization** - MVC pattern jelas
2. **Security** - Built-in protections
3. **Maintainability** - Easier to update
4. **Scalability** - Can grow with business
5. **Developer Experience** - Faster development
6. **Testing** - Easier to write tests
7. **Documentation** - Better code clarity
8. **Community** - Large ecosystem of packages

Website Wildan Tailor sekarang menggunakan industry-standard framework yang professional, secure, dan scalable untuk production use!

---

**Conversion completed successfully! Happy coding! 🚀**
