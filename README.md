# 📚 Sistem Pengajuan Kegiatan Perpustakaan Keliling Kota Semarang

![PHP](https://img.shields.io/badge/PHP-8.2-blue.svg)
![Laravel](https://img.shields.io/badge/Laravel-11.31-FF2D20.svg)
![Filament](https://img.shields.io/badge/Filament-3.2-EBB304.svg)
![Status](https://img.shields.io/badge/Status-Completed-success.svg)

## 📖 Deskripsi Proyek
Sistem Pengajuan Kegiatan Perpustakaan Keliling adalah aplikasi berbasis web yang dikembangkan untuk mendigitalisasi layanan administrasi pada Dinas Perpustakaan dan Arsip Kota Semarang. Sistem ini mengubah proses pengajuan surat yang sebelumnya manual menjadi otomatis, terstruktur, dan transparan, sehingga memudahkan institusi pendidikan maupun masyarakat umum dalam mengakses layanan literasi.

## 🚀 Fitur Utama
* **🔐 Autentikasi & Multi-Role:** Sistem login yang aman dengan hak akses spesifik untuk Admin, Kepala Dinas (Kadin), Sekretaris Dinas (Sekdin), dan Pemohon Kegiatan.
* **📝 Manajemen Surat Digital:** Pemohon dapat mengajukan kegiatan, sementara pihak instansi dapat memverifikasi, menyetujui, atau menolak pengajuan secara langsung melalui sistem.
* **📅 Kalender Jadwal Interaktif:** Visualisasi jadwal kegiatan perpustakaan keliling yang telah disetujui, dapat dipantau oleh semua pengguna.
* **💬 Live Chat (Websockets):** Fitur komunikasi *real-time* antar pengguna menggunakan Laravel Reverb untuk koordinasi yang lebih cepat.
* **👥 User Management:** Hak akses penuh bagi Admin untuk mengelola data akun dan *role* pengguna.

## 💻 Tech Stack
* **Bahasa Pemrograman:** PHP 8.2
* **Framework Backend:** Laravel 11.31
* **Admin Panel:** FilamentPHP 3.2
* **Broadcasting:** Laravel Reverb (Websockets)
* **Metodologi:** Waterfall

## 📊 Kualitas & Pengujian Sistem
Aplikasi ini telah melewati serangkaian pengujian perangkat lunak yang ketat untuk memastikan stabilitas dan kenyamanan pengguna:
- **Functional Testing:** Lulus pengujian *Blackbox* dengan tingkat keberhasilan **100%**.
- **Code Quality:** Mencapai **93.9%** pada pengujian *Type Convergence*, menunjukkan struktur kode yang konsisten dan *maintainable*.
- **Usability Testing:** Mendapatkan skor *System Usability Scale* (SUS) sebesar **83.25 (Grade A)**, menandakan antarmuka yang sangat *user-friendly*.
- **Stress & HTTP Testing:** Performa aplikasi terbukti stabil dan responsif di bawah beban akses (traffic) yang tinggi.

---

## 🛠️ Cara Instalasi (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputer lokal Anda:

1. **Clone repository ini:**
   ```bash
   git clone [https://github.com/muhammadfahrurriza/capstone.git](https://github.com/muhammadfahrurriza/capstone.git)
   ```

2. **Masuk ke direktori proyek:**
   ```bash
   cd capstone
   ```

3. **Install dependensi PHP dan Node.js:**
   ```bash
   composer install
   npm install && npm run build
   ```

4. **Siapkan konfigurasi environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Konfigurasi Database:**
   Buka file `.env` dan sesuaikan kredensial database Anda (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

6. **Jalankan Migrasi Database:**
   ```bash
   php artisan migrate
   ```

7. **Jalankan server lokal:**
   ```bash
   php artisan serve
   ```

---
*Dikembangkan sebagai Capstone Project oleh Muhammad Fahrur Riza.*
