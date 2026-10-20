# 📰 LaraPress — Portal Blog Sederhana dengan Laravel

## 📌 Deskripsi
**LaraPress** adalah proyek blog sederhana yang dibuat sebagai bagian dari **Praktikum 3 - Pemrograman Berbasis Web**. Proyek ini bertujuan untuk memperkenalkan konsep dasar pengembangan web menggunakan framework **Laravel**, mencakup **routing**, **Blade template engine**, serta pengelolaan **views**.

## 🛠️ Teknologi yang Digunakan
| Teknologi | Keterangan |
|-----------|------------|
| **PHP 8.x** | Bahasa pemrograman backend |
| **Laravel 12.x** | Framework PHP untuk web development |
| **Blade Template Engine** | Template engine bawaan Laravel |
| **TailwindCSS (CDN)** | Utility-first CSS framework |
| **Laragon** | Local development environment |

## 📁 Struktur Penting
```
LaraPress/
├── resources/
│   └── views/
│       ├── welcome.blade.php    ← Halaman utama (Home)
│       ├── about.blade.php      ← Halaman tentang
│       └── contact.blade.php    ← Halaman kontak
├── routes/
│   └── web.php                  ← Definisi routing
└── public/
    └── ...
```

## 🔗 Routing
Rute didefinisikan langsung di `routes/web.php` menggunakan *closure* (tanpa controller):

| Method | URI | View | Deskripsi |
|--------|-----|------|-----------|
| GET | `/` | `welcome` | Halaman utama dengan navbar |
| GET | `/tentang-kami` | `about` | Halaman tentang LaraPress |
| GET | `/kontak-kami` | `contact` | Halaman kontak |

> **Catatan:** Routing menggunakan closure langsung tanpa controller terpisah, sesuai dengan scope Praktikum 3 yang fokus pada routing dasar.

## 🎨 Desain
Halaman utama menggunakan **TailwindCSS CDN** untuk styling:
- Navbar dengan background merah dan teks biru langit
- Judul "LaraPress" dengan font bold
- Menu navigasi: Beranda, Tentang, Kontak

## 📸 Screenshot

### Halaman Home
![Home Page](screenshot/ss_home.png)

### Halaman Tentang Kami
![About Page](screenshot/ss_about.png)

### Halaman Kontak
![Contact Page](screenshot/ss_contact.png)

---

## 📖 Apa yang Dipelajari
1. **Routing di Laravel** — Mendefinisikan rute HTTP GET dan mengembalikan view
2. **Blade Template Engine** — Membuat halaman HTML menggunakan file `.blade.php`
3. **Struktur Proyek Laravel** — Memahami organisasi folder `resources/views`, `routes`, dan `public`
4. **Integrasi CSS Framework** — Menggunakan TailwindCSS via CDN untuk mempercepat styling

## 🚀 Cara Menjalankan
1. Pastikan **Laragon** sudah terinstal dan MySQL serta Apache aktif
2. Buka terminal di folder `LaraPress`
3. Jalankan perintah:
   ```bash
   php artisan serve
   ```
4. Buka browser dan akses `http://localhost:8000`
