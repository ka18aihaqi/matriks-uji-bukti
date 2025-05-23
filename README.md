<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="280" alt="Laravel Logo">
</p>

<h2 align="center">Matriks Uji Bukti</h2>
<p align="center"><em>Aplikasi pencatatan pemeriksaan pajak berbasis Laravel</em></p>

---

## 📄 Tentang Proyek

**Matriks Uji Bukti** adalah aplikasi berbasis Laravel yang digunakan untuk mendokumentasikan proses pemeriksaan pajak secara sistematis dan efisien. Sistem ini mendukung pencatatan:

- Data wajib pajak dan nomor SP2
- Pos uji, jenis bukti, dan dokumen sumber
- Evaluasi bukti, kesimpulan, tindak lanjut, serta catatan tambahan

Aplikasi ini ditujukan bagi auditor pemeriksa pajak untuk mempercepat dan merapikan proses dokumentasi.

---

## 🚀 Fitur Utama

- ✅ CRUD data pemeriksaan lengkap
- 🔍 Filter dan pencarian real-time
- 📄 Ekspor laporan PDF Matriks Uji Bukti
- 🔐 Autentikasi pengguna berbasis username 9 digit
- ⚙️ Validasi form otomatis dengan umpan balik instan

---

## ⚙️ Teknologi

- [Laravel 10.x](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/) + Blade Template
- [DOMPDF](https://github.com/dompdf/dompdf) untuk export PDF
- MySQL / MariaDB

---

## 🛠️ Instalasi

```bash
git clone https://github.com/ka18aihaqi/matriks-uji-bukti.git
cd matriks-uji-bukti
composer install
cp .env.example .env
php artisan key:generate
# Edit konfigurasi database di file .env
php artisan migrate
npm install && npm run dev
php artisan serve
