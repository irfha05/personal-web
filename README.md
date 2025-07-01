# 🌐 Personal Web & Admin Dashboard

Selamat datang di **Personal Web & Admin Dashboard**, sebuah website multifungsi yang mencakup blog pribadi, fitur komentar, manajemen artikel, serta sistem admin lengkap untuk mengelola data pengunjung, statistik, dan banyak lagi!

---

## ✨ Fitur Utama

### 📰 Blog & Artikel
- Menampilkan daftar artikel yang stylish & responsif
- Detail artikel dengan dukungan **gambar**, **penulis**, **tanggal publish**, dan **tag**
- Pencarian artikel secara real-time
- **Pagination** untuk navigasi artikel yang lebih rapi

### 💬 Komentar
- Setiap artikel bisa dikomentari oleh pengunjung
- Form komentar terhubung langsung ke database
- Proteksi input (SQL Injection & XSS basic)

### 🧑‍💻 Admin Dashboard
- Login sistem untuk admin (session-based)
- Tambah/Edit/Hapus artikel dari halaman admin
- Upload gambar artikel langsung dari form
- Statistik pengunjung **harian & mingguan**
- Grafik statistik berbentuk **bar chart** dan **pie chart**

### 📊 Statistik & Analytics
- Penghitung pengunjung otomatis
- Statistik disajikan dalam grafik menarik (menggunakan Chart.js)
- Integrasi opsional dengan **Google Analytics** atau **PHPTracker**

### 📍 Halaman About
- Tampilan informasi diri yang profesional
- Tambahan Google Maps iframe
- Tautan ke media sosial: WhatsApp, Instagram, dll

---

## 🛠️ Teknologi yang Digunakan

- **PHP** (Native)
- **MySQL** untuk database
- **Tailwind CSS** untuk desain responsif & modern
- **Chart.js** untuk grafik statistik
- **Google Maps Embed** untuk lokasi
- **Session-based Auth** untuk login admin

---

## 📂 Struktur Folder
```
📁 personal-web/
├── 📁 admin/
│ ├── about.php
│ ├── add_about.php
│ ├── add_artikel.php
│ ├── add_gallery.php
│ ├── beranda_admin.php
│ ├── cek_login.php
│ ├── data_artikel.php
│ ├── data_gallery.php
│ ├── delete_about.php
│ ├── delete_artikel.php
│ ├── delete_gallery.php
│ ├── edit_about.php
│ ├── edit_gallery.php
│ ├── edit_artikel.php
│ ├── login.php
│ ├── logout.php
│ ├── proses_add_about.php
│ ├── proses_add_artikel.php
│ ├── proses_add_gallery.php
│ ├── proses_edit_about.php
│ ├── proses_edit_artikel.php
│ └── proses_edit_gallery.php
│
├── 📁 images/
│ └── [1.jpeg]
│
├── about.php
├── artikel_detail.php
├── gallery.php
├── index.php
├── koneksi.php
└── README.md
```

---

## 🚀 Cara Install

1. Clone atau upload ke hosting Anda.
2. Import database `db_blog.sql` via phpMyAdmin.
3. Cek dan sesuaikan `koneksi.php` untuk koneksi database.
4. Akses `admin/login.php` untuk login ke admin panel.

---

## 💡 Tips Tambahan

- Buat folder `images/` bisa di-write agar upload gambar artikel tidak gagal.
- Gunakan versi lokal Chart.js di folder `/js/` jika tanpa koneksi internet.
- Gunakan fitur komentar untuk interaksi pengunjung blog.

---

## 🤝 Kontribusi

Pull request terbuka untuk pengembangan fitur baru atau perbaikan bug!

---

## 👨‍💻 Developer

**Irfha Najla Qisti Asfia`u Romadlon**  
Website personal
[Instagram](https://instagram.com/itsnaqis.ar) | [WhatsApp](https://wa.me/6289524108860)

---
