# [cite_start]Sistem Pengajuan Kegiatan Perpustakaan Keliling [cite: 1]

## Deskripsi Proyek
[cite_start]Aplikasi berbasis web ini adalah sistem pengajuan surat digital yang efisien dan terstruktur untuk layanan perpustakaan keliling pada Dinas Perpustakaan dan Arsip Kota Semarang[cite: 1, 2, 10]. [cite_start]Sistem ini dirancang untuk menggantikan proses operasional manual yang bergantung pada penyerahan surat lamaran secara fisik, sehingga menyederhanakan proses bagi institusi pendidikan, terutama yang berada di daerah terpencil[cite: 9, 24, 27].

## Teknologi yang Digunakan (Tech Stack)
[cite_start]Sistem ini dibangun menggunakan metodologi *Waterfall* [cite: 70] dengan teknologi modern berikut:
* [cite_start]**Bahasa Pemrograman:** PHP 8.2 [cite: 12]
* [cite_start]**Framework Backend:** Laravel 11.31 [cite: 12]
* [cite_start]**Admin Interface:** Filament 3.2 [cite: 12]
* [cite_start]**Broadcasting / Real-time:** Laravel Reverb (Websockets) [cite: 215, 217]

## Fitur Utama
* [cite_start]**Autentikasi & Multi-Role:** Mendukung *login* dengan hak akses yang disesuaikan untuk Admin, Kepala Dinas (Kadin), Sekretaris Dinas (Sekdin), dan Pemohon Kegiatan[cite: 76, 175].
* [cite_start]**Manajemen Pengajuan Surat:** Pemohon dapat dengan mudah mengisi formulir pengajuan kegiatan (termasuk lokasi dan narahubung), sementara Admin, Sekdin, dan Kadin dapat memproses persetujuan atau penolakan langsung di dalam sistem[cite: 79, 80, 200, 201].
* [cite_start]**Dashboard Kalender Interaktif:** Menampilkan jadwal layanan kegiatan perpustakaan yang telah disetujui dalam bentuk kalender yang dapat diakses oleh semua *role*[cite: 81, 206].
* [cite_start]**Live Chat Terintegrasi:** Fasilitas komunikasi *real-time* antar pengguna tanpa mempedulikan *role* menggunakan *websockets*, mendukung pengiriman pesan teks dan lampiran *file*[cite: 213, 214, 219].
* [cite_start]**Manajemen Akun:** Admin memiliki akses penuh untuk menambah, memperbarui, dan memonitor *role* pengguna demi keamanan data[cite: 83, 223].

## Hasil Pengujian Sistem
Sistem ini telah melalui pengujian komprehensif untuk memastikan kesiapan produksi:
* [cite_start]**Fungsionalitas:** Lulus *blackbox testing* dengan tingkat keberhasilan 100% tanpa adanya *error*[cite: 241, 242].
* [cite_start]**Kualitas Kode:** Memperoleh persentase 93,9% pada pengujian *Type Convergence*, membuktikan penulisan kode yang kuat dan konsisten dengan standar Laravel[cite: 169, 277].
* [cite_start]**Performa (*Stress Test*):** Sistem terbukti berjalan stabil saat menangani simulasi beban lalu lintas (*traffic*) pengguna yang tinggi[cite: 155, 250].
* [cite_start]**Usabilitas (UX):** Memperoleh skor *System Usability Scale* (SUS) sebesar 83,25 (Grade A), mengindikasikan bahwa antarmuka sistem sangat ramah pengguna[cite: 14, 248].

---

## Cara Instalasi (Local Development)
1. Clone repositori ini: `git clone https://github.com/muhammadfahrurriza/capstone`
2. Masuk ke direktori proyek: `cd [nama-folder]`
3. Install dependensi PHP: `composer install`
4. Install dependensi NPM: `npm install` & `npm run build`
5. Salin file environment: `cp .env.example .env`
6. Jalankan migrasi database: `php artisan migrate`
7. Nyalakan server lokal: `php artisan serve`
