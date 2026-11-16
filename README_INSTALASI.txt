PANDUAN PEMASANGAN FILE KE PROJECT LARAVEL

1. Buat project Laravel baru di folder htdocs XAMPP:
   composer create-project laravel/laravel service-motor

2. Ekstrak seluruh isi file ZIP ini dan timpa (replace) ke dalam folder root project 'service-motor' Anda.
   Struktur folder di dalam ZIP sudah disesuaikan dengan struktur bawaan Laravel:
   - app/Http/Controllers/...
   - app/Models/...
   - database/migrations/...
   - resources/views/...
   - routes/...

3. Jika menggunakan Laravel 11 / 12, aktifkan routing API dengan perintah:
   php artisan install:api
   (Lalu pastikan isi routes/api.php sesuai dengan file di dalam ZIP ini).

4. Atur nama database di file .env:
   DB_DATABASE=db_service_motor

5. Buat database 'db_service_motor' di phpMyAdmin, lalu jalankan:
   php artisan migrate
   php artisan serve
