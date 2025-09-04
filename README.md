<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
## Manajemen User (Laravel 12)

Aplikasi sederhana untuk manajemen user dengan peran (admin & user).

### Fitur
1. Admin & User dapat login.
2. Admin dapat membuat user baru (nama, email, password, role).
3. Dashboard menampilkan ucapan: "Selamat datang, [username]" dan role.
4. Proteksi route dengan middleware auth & admin.

### Teknologi
- Laravel 12 (Backend)
- Blade + Bootstrap 5 (UI)
- Database: SQLite (default) atau MySQL

### Persyaratan
- PHP 8.2+
- Composer
- (Opsional) Node.js & NPM jika ingin menjalankan Vite/dev assets

### Instalasi & Menjalankan (Mode Cepat - SQLite)
```bash
git clone <repo> manajemen-user
cd manajemen-user
composer install
cp .env.example .env
php artisan key:generate
# Pastikan file database SQLite ada
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```
Kemudian buka http://127.0.0.1:8000

### Konfigurasi MySQL (Opsional)
Edit file `.env`:
```
DB_CONNECTION=sqlite

```
Lalu jalankan:
```bash
php artisan migrate:fresh --seed
```

### Akun Default
Admin:
```
Email: admin@example.com
Password: password
```
User:
```
Email: user@example.com
Password: password
```

### Struktur Fitur Utama
- `routes/web.php` : Route auth, dashboard, admin user.
- `app/Http/Controllers/AuthController.php` : Proses login & logout.
- `app/Http/Controllers/DashboardController.php` : Dashboard sederhana.
- `app/Http/Controllers/AdminUserController.php` : CRUD create user (admin).
- `app/Http/Middleware/AdminMiddleware.php` : Pembatasan akses admin.
- `resources/views/` : Blade templates (login, dashboard, manajemen user).
- `database/seeders/DatabaseSeeder.php` : Seed akun default.
- `database/migrations/...add_role_to_users_table.php` : Kolom role.



### Best Practice Yang Diterapkan
- Validasi input pada setiap form.
- Password di-hash otomatis (model cast hashed).
- Middleware khusus untuk role admin.
- CSRF protection (form Blade otomatis menyertakan @csrf).
- Session regeneration setelah login (mencegah fixation).
- Penggunaan pagination untuk daftar user.

### Langkah Berikutnya (Opsional)
- Tambah edit / delete user.
- Implementasi reset password & verifikasi email.
- Gunakan Form Request terpisah untuk validasi yang lebih rapi.
- Tambahkan logging aktivitas admin.

---
Lisensi: MIT

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
