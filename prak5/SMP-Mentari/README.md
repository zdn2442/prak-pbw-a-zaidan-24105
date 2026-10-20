# 🏫 SMP Mentari — Website Sistem Informasi Sekolah

## 📌 Deskripsi
**SMP Mentari** adalah aplikasi web sistem informasi sekolah yang dibangun menggunakan framework **Laravel**. Proyek ini merupakan hasil dari **Praktikum 5 - Pemrograman Berbasis Web**, yang mencakup implementasi **Eloquent ORM**, **middleware autentikasi**, **CRUD resource controller**, serta fitur publik dan admin yang terpisah.

## 🛠️ Teknologi yang Digunakan
| Teknologi | Keterangan |
|-----------|------------|
| **PHP 8.x** | Bahasa pemrograman backend |
| **Laravel 12.x** | Framework PHP |
| **MySQL** | Sistem manajemen basis data |
| **Blade Template Engine** | Template engine bawaan Laravel |
| **TailwindCSS** | CSS framework untuk styling |
| **Laravel Breeze** | Paket autentikasi (Login/Register) |
| **Laragon** | Local development environment |

## ✨ Fitur

### 🌐 Fitur Publik (Tanpa Login)
- 🏠 **Halaman Home** — Landing page sekolah
- 📝 **Buku Tamu** — Pengunjung bisa mengirim pesan/kesan melalui form buku tamu

### 🔐 Fitur Admin (Perlu Login)
- 📊 **Dashboard** — Ringkasan statistik data sekolah
- 📅 **Manajemen Kegiatan** — CRUD lengkap (tambah, lihat, edit, hapus) kegiatan sekolah
- 📋 **Kelola Buku Tamu** — Admin dapat melihat dan menghapus pesan buku tamu
- ⚙️ **Pengaturan Website** — Konfigurasi pengaturan website
- 👤 **Profil Pengguna** — Edit profil akun (Laravel Breeze)

## 📁 Struktur Penting
```
SMP-Mentari/
├── app/
│   ├── Http/Controllers/
│   │   ├── PageController.php          ← Halaman publik
│   │   ├── DashboardController.php     ← Dashboard admin
│   │   ├── KegiatanController.php      ← CRUD kegiatan
│   │   ├── PesanTamuController.php     ← Buku tamu (publik & admin)
│   │   ├── SettingController.php       ← Pengaturan website
│   │   └── ProfileController.php       ← Profil user (Breeze)
│   └── Models/
│       ├── Kegiatan.php
│       ├── PesanTamu.php
│       ├── Setting.php
│       └── User.php
├── database/
│   ├── migrations/
│   │   ├── create_pesan_tamus_table
│   │   ├── create_kegiatans_table
│   │   └── create_settings_table
│   └── seeders/
├── resources/views/
│   ├── layouts/        ← Layout utama
│   ├── auth/           ← Halaman login & register
│   ├── bukutamu/       ← Views buku tamu
│   ├── kegiatan/       ← Views kegiatan (CRUD)
│   ├── admin/          ← Views admin
│   ├── profile/        ← Views profil
│   ├── components/     ← Komponen Blade
│   ├── home.blade.php
│   └── dashboard.blade.php
└── routes/
    ├── web.php         ← Rute publik & admin
    └── auth.php        ← Rute autentikasi (Breeze)
```

## 🗄️ Database

### Tabel `pesan_tamus`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary Key, Auto Increment |
| nama | VARCHAR | Nama pengirim pesan |
| pesan | TEXT | Isi pesan buku tamu |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Tabel `kegiatans`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary Key, Auto Increment |
| judul | VARCHAR | Judul kegiatan |
| deskripsi | TEXT | Deskripsi kegiatan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Tabel `settings`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary Key, Auto Increment |
| key | VARCHAR | Nama pengaturan |
| value | TEXT | Nilai pengaturan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

## 🔗 Routing

### Rute Publik
| Method | URI | Controller | Deskripsi |
|--------|-----|------------|-----------|
| GET | `/` | PageController@home | Halaman utama sekolah |
| GET | `/bukutamu` | PesanTamuController@index | Halaman buku tamu |
| POST | `/bukutamu` | PesanTamuController@store | Kirim pesan buku tamu |

### Rute Terproteksi (Memerlukan Login)
| Method | URI | Controller | Deskripsi |
|--------|-----|------------|-----------|
| GET | `/dashboard` | DashboardController@index | Dashboard admin |
| GET | `/kegiatan` | KegiatanController@index | Daftar kegiatan |
| GET | `/kegiatan/create` | KegiatanController@create | Form tambah kegiatan |
| POST | `/kegiatan` | KegiatanController@store | Simpan kegiatan baru |
| GET | `/kegiatan/{id}` | KegiatanController@show | Detail kegiatan |
| GET | `/kegiatan/{id}/edit` | KegiatanController@edit | Form edit kegiatan |
| PUT | `/kegiatan/{id}` | KegiatanController@update | Update kegiatan |
| DELETE | `/kegiatan/{id}` | KegiatanController@destroy | Hapus kegiatan |
| GET | `/admin/bukutamu` | PesanTamuController@adminIndex | Kelola buku tamu |
| DELETE | `/admin/bukutamu/{id}` | PesanTamuController@destroy | Hapus pesan tamu |
| GET | `/settings` | SettingController@index | Halaman pengaturan |
| PUT | `/settings` | SettingController@update | Simpan pengaturan |

## 📸 Screenshot

### Halaman Login
![Login Page](screenshot/ss_login.png)

### Dashboard Admin
![Dashboard](screenshot/ss_dashboard.png)

### Halaman Buku Tamu
![Buku Tamu](screenshot/ss_bukutamu.png)

### Manajemen Kegiatan
![Kegiatan](screenshot/ss_kegiatan.png)

### Pengaturan Website
![Settings](screenshot/ss_settings.png)

---

## 📖 Apa yang Dipelajari
1. **Laravel Breeze** — Implementasi sistem autentikasi (login, register, logout)
2. **Middleware** — Melindungi rute admin dengan middleware `auth`
3. **Resource Controller** — Menggunakan `Route::resource()` untuk CRUD kegiatan
4. **Eloquent ORM** — Interaksi dengan database melalui model
5. **Blade Components** — Membuat komponen reusable
6. **Pemisahan Public & Admin** — Membedakan rute dan tampilan untuk publik dan admin

## 🚀 Cara Menjalankan
1. Pastikan **Laragon** sudah aktif (Apache & MySQL)
2. Buat database baru di MySQL (misal: `smp_mentari`)
3. Salin `.env.example` menjadi `.env` dan sesuaikan konfigurasi database
4. Jalankan perintah berikut di terminal:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```
5. Buka browser dan akses `http://localhost:8000`
6. Register akun baru untuk login ke dashboard admin
