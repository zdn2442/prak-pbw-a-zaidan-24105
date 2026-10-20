# 📚 AuthBook — Admin Panel Perpustakaan dengan Filament

## 📌 Deskripsi
**AuthBook** adalah aplikasi admin panel perpustakaan yang dibangun menggunakan framework **Laravel** dan **Filament**. Proyek ini merupakan hasil dari **Praktikum 6 - Pemrograman Berbasis Web**, yang memperkenalkan penggunaan **Filament** sebagai framework admin panel modern untuk Laravel.

Filament menyediakan antarmuka admin yang lengkap dengan fitur CRUD, pencarian, filter, upload gambar, dan lainnya — tanpa perlu membuat UI admin dari nol.

## 🛠️ Teknologi yang Digunakan
| Teknologi | Keterangan |
|-----------|------------|
| **PHP 8.x** | Bahasa pemrograman backend |
| **Laravel 12.x** | Framework PHP |
| **Filament 3.x** | Admin panel framework untuk Laravel |
| **MySQL** | Sistem manajemen basis data |
| **Laragon** | Local development environment |

## ✨ Fitur

### 🔐 Autentikasi
- Login admin melalui Filament panel (`/admin`)
- User admin dibuat otomatis melalui seeder

### 📖 Manajemen Buku (BookResource)
- ✅ CRUD lengkap (Create, Read, Update, Delete)
- 🔍 **Pencarian** berdasarkan ISBN, judul, author, publisher
- 🎯 **Filter** berdasarkan status, tahun, dan author
- 📷 **Upload cover** buku (JPEG, PNG, WebP, max 2MB) dengan image editor
- 🏷️ **Badge status** — warna hijau untuk *Available*, kuning untuk *Borrowed*
- 📋 **Copyable ISBN** — klik untuk menyalin ISBN
- 📊 **Sortable** — kolom bisa diurutkan
- 🗑️ **Bulk delete** — hapus banyak data sekaligus
- ➕ **Create author inline** — tambah author baru langsung dari form book

### ✍️ Manajemen Author (AuthorResource)
- ✅ CRUD untuk data penulis
- 📊 **Jumlah buku** — menampilkan total buku per author (relasi)
- 🔍 **Pencarian** dan pengurutan

### 🌱 Database Seeding
- 1 Admin user (`admin@example.com`)
- 10 Authors (factory)
- 50 Books dengan author acak (factory)

## 📁 Struktur Penting
```
authbook/
├── app/
│   ├── Filament/Resources/
│   │   ├── BookResource.php           ← Resource CRUD buku
│   │   ├── BookResource/Pages/        ← Pages: List, Create, View, Edit
│   │   ├── AuthorResource.php         ← Resource CRUD author
│   │   └── AuthorResource/Pages/      ← Pages: List, Create, Edit
│   ├── Models/
│   │   ├── Book.php                   ← Model buku (BelongsTo Author)
│   │   ├── Author.php                 ← Model author (HasMany Books)
│   │   └── User.php
│   └── Policies/
├── database/
│   ├── migrations/
│   │   ├── create_authors_table       ← Tabel authors
│   │   └── create_books_table         ← Tabel books
│   ├── factories/
│   └── seeders/
│       └── DatabaseSeeder.php         ← Seed admin + data dummy
└── ...
```

## 🗄️ Database

### Tabel `authors`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary Key, Auto Increment |
| name | VARCHAR | Nama penulis |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Tabel `books`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary Key, Auto Increment |
| isbn | VARCHAR | ISBN buku (unique) |
| title | VARCHAR | Judul buku |
| author_id | BIGINT | Foreign Key → authors (cascade delete) |
| publisher | VARCHAR | Penerbit (nullable) |
| year | YEAR | Tahun terbit (nullable) |
| cover | VARCHAR | Path cover image (nullable) |
| status | ENUM | `available` / `borrowed` (default: available) |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Relasi
- **Author** → `hasMany` → **Book**
- **Book** → `belongsTo` → **Author**

## 🔗 Filament Admin Routes
| URI | Deskripsi |
|-----|-----------|
| `/admin` | Dashboard Filament |
| `/admin/login` | Halaman login admin |
| `/admin/books` | Daftar semua buku |
| `/admin/books/create` | Form tambah buku baru |
| `/admin/books/{id}` | Detail buku |
| `/admin/books/{id}/edit` | Form edit buku |
| `/admin/authors` | Daftar semua penulis |
| `/admin/authors/create` | Form tambah penulis baru |
| `/admin/authors/{id}/edit` | Form edit penulis |

---

## 📸 Screenshot — Tugas 1: Implementasi Dasar

### ✅ Admin Panel Login
![Login Admin](screenshot/ss_login.png)

### ✅ List Books (Data Terseed)
![List Books](screenshot/ss_list_books.png)

### ✅ Form Create Book
![Create Book](screenshot/ss_create_book.png)

### ✅ Hasil Pencarian
![Search Result](screenshot/ss_search.png)

### ✅ Filter Aktif
![Active Filter](screenshot/ss_filter.png)

---

## 📖 Apa yang Dipelajari
1. **Filament Framework** — Membangun admin panel dengan cepat tanpa membuat UI manual
2. **Resource CRUD** — Menggunakan `php artisan make:filament-resource` untuk generate CRUD
3. **Form Components** — TextInput, Select (relationship), FileUpload, Section
4. **Table Components** — TextColumn, ImageColumn, BadgeColumn, Filters
5. **Relationship** — Menampilkan data relasi (author.name, books_count) di tabel
6. **Database Seeding** — Membuat data dummy menggunakan factory dan seeder
7. **File Upload** — Upload gambar dengan validasi tipe dan ukuran file

## 🚀 Cara Menjalankan
1. Pastikan **Laragon** sudah aktif (Apache & MySQL)
2. Buat database baru di MySQL (misal: `authbook`)
3. Salin `.env.example` menjadi `.env` dan sesuaikan konfigurasi database
4. Jalankan perintah berikut:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   php artisan serve
   ```
5. Buka browser dan akses `http://localhost:8000/admin`
6. Login dengan:
   - **Email:** `admin@example.com`
   - **Password:** `password`
