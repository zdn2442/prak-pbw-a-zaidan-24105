# ✏️ LaraPress — CRUD Blog dengan Laravel

## 📌 Deskripsi
**LaraPress** adalah kelanjutan dari proyek blog di **Praktikum 3**, kini ditambahkan fitur **CRUD (Create, Read, Update, Delete)** untuk mengelola postingan blog. Proyek ini merupakan bagian dari **Praktikum 4 - Pemrograman Berbasis Web**, yang berfokus pada penerapan **MVC pattern**, **Eloquent ORM**, **migration**, dan **form validation** di Laravel.

## 🛠️ Teknologi yang Digunakan
| Teknologi | Keterangan |
|-----------|------------|
| **PHP 8.x** | Bahasa pemrograman backend |
| **Laravel 12.x** | Framework PHP |
| **MySQL** | Sistem manajemen basis data |
| **Blade Template Engine** | Template engine bawaan Laravel |
| **Laragon** | Local development environment |

## ✨ Fitur
- 📝 **Buat postingan baru** — Form dengan validasi input
- 📖 **Lihat daftar postingan** — Tampilan card dengan preview konten
- 🔎 **Lihat detail postingan** — Halaman detail lengkap
- ✏️ **Edit postingan** — Form edit dengan data pre-filled
- 🗑️ **Hapus postingan** — Konfirmasi dan hapus data
- ✅ **Validasi input** — Server-side validation pada judul dan konten

## 📁 Struktur Penting
```
prak4/LaraPress/
├── app/
│   ├── Http/Controllers/
│   │   └── PostController.php         ← Controller CRUD postingan
│   └── Models/
│       └── Post.php                   ← Model Eloquent
├── database/
│   └── migrations/
│       └── create_posts_table.php     ← Migration tabel posts
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php             ← Layout utama
│   ├── posts/
│   │   ├── index.blade.php           ← Daftar postingan
│   │   ├── create.blade.php          ← Form tambah
│   │   ├── show.blade.php            ← Detail postingan
│   │   └── edit.blade.php            ← Form edit
│   ├── home.blade.php
│   ├── about.blade.php
│   └── contact.blade.php
├── routes/
│   └── web.php
└── public/css/
    └── style.css                      ← Custom CSS
```

## 🗄️ Database
### Tabel `posts`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary Key, Auto Increment |
| title | VARCHAR(255) | Judul postingan |
| content | TEXT | Isi postingan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

## 🔗 Routing
| Method | URI | Controller | Deskripsi |
|--------|-----|------------|-----------|
| GET | `/` | — | Halaman utama (Home) |
| GET | `/about` | — | Halaman tentang |
| GET | `/contact` | — | Halaman kontak |
| GET | `/posts` | PostController@index | Daftar semua postingan |
| GET | `/posts/create` | PostController@create | Form tambah postingan |
| POST | `/posts` | PostController@store | Simpan postingan baru |
| GET | `/posts/{post}` | PostController@show | Detail postingan |
| GET | `/posts/{post}/edit` | PostController@edit | Form edit postingan |
| PUT | `/posts/{post}` | PostController@update | Update postingan |
| DELETE | `/posts/{post}` | PostController@destroy | Hapus postingan |

## 📸 Screenshot

### Daftar Postingan
![Posts Page](screenshot/ss_posts.png)

### Form Tambah Postingan
![Create Post](screenshot/ss_create.png)

### Detail Postingan
![Show Post](screenshot/ss_show.png)

### Form Edit Postingan
![Edit Post](screenshot/ss_edit.png)

### Hapus Postingan
![Delete Post](screenshot/ss_delete.png)

---

## 📖 Apa yang Dipelajari
1. **MVC Pattern** — Memisahkan logika ke Model, View, dan Controller
2. **Eloquent ORM** — Interaksi dengan database melalui model (`Post::all()`, `Post::find()`, dll.)
3. **Migration** — Membuat dan mengelola struktur tabel database
4. **Resource Route** — Menggunakan `Route::resource()` untuk generate semua route CRUD
5. **Form Validation** — Validasi input server-side menggunakan `$request->validate()`
6. **Blade Layouts** — Menggunakan `@extends` dan `@section` untuk template inheritance

## 🚀 Cara Menjalankan
1. Pastikan **Laragon** sudah aktif (Apache & MySQL)
2. Buat database baru di MySQL (misal: `larapress`)
3. Salin `.env.example` menjadi `.env` dan sesuaikan konfigurasi database
4. Jalankan perintah berikut:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```
5. Buka browser dan akses `http://localhost:8000`
6. Navigasi ke menu **Posts** untuk mulai membuat postingan
