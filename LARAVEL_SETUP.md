# 🎉 Wildan Tailor - Versi Laravel 11

Selamat datang! Anda telah berhasil mengkonversi Wildan Tailor dari Plain PHP ke **Laravel 11** - Framework PHP Modern yang professional dan scalable.

## 📋 Daftar Isi

- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi Cepat (5 Menit)](#instalasi-cepat)
- [Konfigurasi](#konfigurasi)
- [Database Setup](#database-setup)
- [Struktur Folder](#struktur-folder)
- [User Roles](#user-roles)
- [Fitur](#fitur)
- [Deployment](#deployment)
- [Troubleshooting](#troubleshooting)

---

## 🖥️ Persyaratan Sistem

- **PHP**: 8.2+ (Laravel 11 requirement)
- **MySQL/MariaDB**: 5.7+ atau PostgreSQL 9.6+
- **Composer**: 2.0+
- **Node.js**: 16+ (untuk frontend tools)
- **Git**: (optional, untuk version control)

---

## ⚡ Instalasi Cepat (5 Menit)

### 1. Setup Environment File

```bash
copy .env.example .env
```

Edit `.env` dan sesuaikan:
```env
APP_NAME=Wildan Tailor
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wildan_tailor
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Install Dependencies

```bash
composer install
php artisan key:generate
```

### 3. Database Setup

```bash
# Jalankan migrations
php artisan migrate

# Seed database dengan data awal
php artisan db:seed

# Jika ada error, bersihkan dan ulangi
php artisan migrate:fresh --seed
```

### 4. Storage Setup

```bash
# Buat link storage untuk upload files
php artisan storage:link

# Set permissions (Linux/Mac)
chmod -R 775 storage bootstrap/cache
```

### 5. Jalankan Development Server

```bash
php artisan serve
```

Akses aplikasi:
- **Home Page**: http://localhost:8000
- **Admin Dashboard**: http://localhost:8000/admin
  - Username: `admin@wdtailor.com`
  - Password: `admin123`

---

## ⚙️ Konfigurasi

### Environment Variables

Edit `.env` untuk konfigurasi:

```env
### Application
APP_NAME="Wildan Tailor"
APP_ENV=production        # production atau local atau testing
APP_DEBUG=false           # false untuk production!
APP_URL=https://yourdomain.com

### Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wildan_tailor
DB_USERNAME=root
DB_PASSWORD=your_password

### Mail (optional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password

### File Storage
FILESYSTEM_DISK=local    # atau public, s3, dsb

### Session & Cache
SESSION_DRIVER=file
CACHE_STORE=file
```

### Konfigurasi Aplikasi

Edit `config/app.php`:
- `timezone` - Set timezone ke `Asia/Jakarta`
- `locale` - Set ke `id` untuk Bahasa Indonesia

---

## 💾 Database Setup

### Buat Database

```bash
# MySQL Command Line
mysql -u root -p
> CREATE DATABASE wildan_tailor CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
> EXIT;
```

### Jalankan Migrations

```bash
# Fresh installation (wipe + seed)
php artisan migrate:fresh --seed

# Atau hanya migrate
php artisan migrate

# Lihat status
php artisan migrate:status
```

### Database Tables

**users** - Admin users
```
- id
- name
- email (unique)
- password
- is_admin
- email_verified_at
- timestamps
```

**services** - Jenis layanan
```
- id
- nama_layanan (unique)
- deskripsi
- harga_mulai
- estimasi_hari
- gambar
- timestamps
```

**orders** - Pesanan customer
```
- id
- nama_pemesan
- email
- nomor_hp
- jenis_layanan
- deskripsi
- estimasi_waktu
- harga
- status (pending, diproses, selesai, dibatalkan)
- tanggal_selesai
- catatan_admin
- timestamps
```

**galleries** - Galeri foto
```
- id
- judul
- deskripsi
- gambar_file
- kategori
- user_id (FK to users)
- timestamps
```

---

## 📁 Struktur Folder

```
wildan-tailor/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PageController.php      # Public page logic
│   │   │   ├── OrderController.php     # Order form logic
│   │   │   └── Admin/
│   │   │       ├── DashboardController.php
│   │   │       ├── OrderController.php
│   │   │       └── GalleryController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Order.php
│   │   ├── Gallery.php
│   │   └── Service.php
│   └── Providers/
│       └── AppServiceProvider.php
├── database/
│   ├── migrations/
│   │   ├── *_create_services_table.php
│   │   ├── *_create_orders_table.php
│   │   ├── *_create_galleries_table.php
│   │   └── *_add_is_admin_to_users_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── AdminSeeder.php
│       └── ServiceSeeder.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php      # Layout publik
│   │   │   └── admin.blade.php    # Layout admin
│   │   ├── components/
│   │   │   ├── navbar.blade.php
│   │   │   └── footer.blade.php
│   │   ├── pages/
│   │   │   ├── index.blade.php
│   │   │   ├── order.blade.php
│   │   │   ├── galeri.blade.php
│   │   │   └── ...
│   │   └── admin/
│   │       ├── dashboard.blade.php
│   │       ├── orders/
│   │       │   ├── index.blade.php
│   │       │   └── show.blade.php
│   │       └── galleries/
│   │           ├── index.blade.php
│   │           └── create.blade.php
│   └── css/ dan js/ assets
├── routes/
│   └── web.php              # All routes defined here
├── public/
│   ├── storage              # Link to storage
│   └── build/               # Vite compiled assets
├── bootstrap/
│   └── app.php              # App bootstrap
├── config/
│   ├── app.php
│   ├── database.php
│   └── ...
├── .env                     # Environment config (create from .env.example)
├── .env.example             # Template for .env
├── composer.json            # PHP dependencies
└── README.md
```

---

## 👥 User Roles

### Admin User

**Default credentials** (ubah di production!):
- Email: `admin@wdtailor.com`
- Password: `admin123`

Akses: http://localhost:8000/admin

**Admin dapat:**
- View dashboard dengan statistik
- Manage pesanan (view, update status, delete)
- Upload dan manage galeri foto
- Update catatan untuk setiap pesanan

### Regular User

Tidak ada akun user biasa di aplikasi ini. Public pages bisa diakses tanpa login.

---

## ✨ Fitur

### Halaman Publik

| Halaman | Path | Fitur |
|---------|------|-------|
| Home | `/` | Hero, tentang, layanan, galeri, testimoni, CTA |
| Tentang | `/tentang` | Profil perusahaan, visi-misi |
| Layanan | `/layanan` | Detail 5 jenis layanan |
| Galeri | `/galeri` | Foto-foto hasil jahitan |
| Harga | `/harga` | Tabel harga layanan |
| Cara Order | `/cara-order` | Panduan pemesanan |
| Kontak | `/kontak` | Informasi kontak + maps |
| Pesan | `/order` | Form pemesanan |

### Admin Dashboard

| Halaman | Path | Fitur |
|---------|------|-------|
| Dashboard | `/admin` | Statistik 4 status, recent orders |
| Pesanan | `/admin/orders` | List pesanan dengan filter |
| Detail | `/admin/orders/{id}` | Update status, catatan, tanggal |
| Galeri | `/admin/galleries` | List foto galeri |
| Upload | `/admin/galleries/create` | Upload foto baru |

---

## 🚀 Deployment

### Production Checklist

- [ ] Set `APP_DEBUG=false` di `.env`
- [ ] Ubah `APP_ENV=production`
- [ ] Generate komprehensif `.env.production`
- [ ] Ubah default password admin
- [ ] Set `FILESYSTEM_DISK=public` untuk storage
- [ ] Setup SSL certificate (HTTPS)
- [ ] Configure backup database regular
- [ ] Setup error monitoring (Sentry, Rollbar)
- [ ] Configure mail service untuk notifikasi

### Deploy ke Hosting

#### Menggunakan cPanel/Shared Hosting

1. **Upload files**
   ```bash
   - Upload hanya files publiksaja (jangan node_modules, .env local)
   - Build assets: npm run build
   - Push ke server via SFTP
   ```

2. **Setup di Server**
   ```bash
   SSH ke server:
   
   # Install dependencies
   composer install --no-dev --optimize-autoloader
   
   # Copy environment
   cp .env.example .env
   
   # Generate app key
   php artisan key:generate
   
   # Run migrations
   php artisan migrate --force
   
   # Seed default data
   php artisan db:seed
   
   # Setup storage link
   php artisan storage:link
   
   # Cache optimization
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Configure Public Root**
   - Set public root ke folder `/public`
   - Pastikan `storage/` writable (755 atau 775)

#### Menggunakan Vercel / Railway / Heroku

(Dokumentasi terpisah diperlukan untuk setiap platform)

---

## 🔧 Artisan Commands

Useful Laravel commands:

```bash
# Development
php artisan serve                    # Start dev server
php artisan tinker                  # Interactive shell

# Database
php artisan migrate                 # Run migrations
php artisan migrate:fresh --seed    # Fresh + seed
php artisan db:seed                 # Seed database
php artisan db:seed --class=AdminSeeder # Seed specific

# Cache & Config
php artisan config:cache            # Cache config
php artisan route:cache             # Cache routes
php artisan view:cache              # Cache views
php artisan cache:clear             # Clear cache

# Queue & Mail
php artisan queue:work              # Run queue worker
php artisan mail:send               # Send queued mails

# Code Generation
php artisan make:model ModelName    # Create model
php artisan make:controller ControllerName
php artisan make:migration CreateTableName
php artisan make:seeder SeederName
```

---

## 🐛 Troubleshooting

### Error: "No application encryption key has been defined"

```bash
php artisan key:generate
```

### Error: "Database connection refused"

Cek `.env`:
- `DB_HOST` sudah benar?
- `DB_USERNAME` dan `DB_PASSWORD` sudah benar?
- MySQL server running?

### Error: "Class not found" atau autoload issues

```bash
composer dump-autoload
php artisan clear-caches
```

### Error: "Storage path not writable"

```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache

# Windows
# - Right click folder → Properties
# - Security → Edit → Add write permissions
```

### Error: "CORS or Not Found"

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Restart dev server
php artisan serve
```

### Upload file tidak bekerja

```bash
# Recreate storage link
php artisan storage:link

# Check permissions
ls -la storage/
```

---

## 📚 Resources

- **Laravel Docs**: https://laravel.com/docs/11.x
- **Blade Templating**: https://laravel.com/docs/11.x/blade
- **Eloquent ORM**: https://laravel.com/docs/11.x/eloquent
- **Authentication**: https://laravel.com/docs/11.x/authentication
- **File Storage**: https://laravel.com/docs/11.x/filesystem

---

## 🆘 Support & Questions

Jika mengalami issues atau pertanyaan mengenai setup Laravel:

1. **Check error log**:
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **Enable debug mode** saat development:
   ```env
   APP_DEBUG=true
   ```

3. **Check documentation** atau Google dengan error message

---

## 📝 Version Info

- **Laravel Version**: 11.x
- **PHP Version**: 8.2+
- **Last Updated**: March 2024
- **Project**: Wildan Tailor Website

---

**Selamat menggunakan Wildan Tailor dalam Laravel! 🎉**

Untuk migrasi dari verrsi Plain PHP, semua fungsi telah dikonversi ke:
- **Models** untuk manipulasi data
- **Controllers** untuk business logic
- **Views** (Blade templates) untuk tampilan
- **Migrations** untuk schema database
- **Seeders** untuk data awal

Semua fitur public dan admin tersedia. Anda siap untuk production deploy!
