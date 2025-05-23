<p align="center"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"> </p> <h2 align="center">Matriks Uji Bukti</h2> <p align="center"> Aplikasi pencatatan pemeriksaan pajak berbasis Laravel. </p>

Tentang Proyek
Matriks Uji Bukti adalah sistem informasi berbasis Laravel yang dirancang untuk mendokumentasikan proses pemeriksaan pajak, termasuk:

Rekaman wajib pajak dan nomor SP2

Pos uji, jenis bukti, dan dokumen sumber

Evaluasi bukti hingga kesimpulan dan tindak lanjut

Aplikasi ini dibangun dengan prinsip minimalis, efisien, dan mudah digunakan oleh auditor pemeriksa pajak.

Fitur Utama
CRUD Data Pemeriksaan

Filter dan pencarian data real-time

Ekspor PDF matriks uji bukti

Autentikasi pengguna dengan username 9 digit

Validasi form otomatis dengan feedback visual

Teknologi
Laravel 10.x

Tailwind CSS + Blade Template

DOMPDF untuk PDF Export

MySQL / MariaDB

Instalasi
git clone https://github.com/ka18aihaqi/matriks-uji-bukti.git
cd matriks-uji-bukti
composer install
cp .env.example .env
php artisan key:generate
# konfigurasi database di .env
php artisan migrate
npm install && npm run dev
php artisan serve

Screenshots
