# 📚 Workshop Sistem Informasi (WSSI) - TIF 2026

Repositori ini berisi kumpulan contoh project yang digunakan dalam kegiatan **Workshop Sistem Informasi (WSSI)** untuk mahasiswa **Teknik Informatika 2026**.

Project dikembangkan menggunakan konsep **Object Oriented Programming (OOP)** dengan bahasa pemrograman **PHP Native** sebagai dasar pembelajaran pengembangan sistem informasi berbasis web.

## 🎯 Tujuan Project

- Memahami konsep dasar dan lanjutan **OOP dalam PHP**
- Menerapkan arsitektur sederhana dalam pengembangan sistem informasi
- Melatih pembuatan fitur utama seperti:
  - Authentication (Login & Register)
  - CRUD (Create, Read, Update, Delete)
  - Session Management
  - Role & Hak Akses
- Menjadi referensi praktikum dan tugas mahasiswa

## 🧩 Teknologi yang Digunakan

- PHP Native (OOP)
- MySQL / MariaDB
- HTML, CSS, JavaScript
- Bootstrap (opsional)

## 📂 Struktur Folder

```bash
wssi_tif26/
│
├── config/            # Konfigurasi database
├── classes/           # Class utama (OOP)
│   ├── Database.php
│   ├── Auth.php
│   └── User.php
│
├── controllers/       # Logic aplikasi (opsional)
├── views/             # Tampilan (UI)
│
├── login.php
├── register.php
├── dashboard.php
├── logout.php
│
└── README.md
````

## 🔐 Fitur Utama

### 1. Authentication System

- Login & Logout
- Register User
- Password hashing (`password_hash`)
- Verifikasi password (`password_verify`)

### 2. Session Management

- Penyimpanan session user
- Proteksi halaman (middleware sederhana)

### 3. CRUD Data

- Tambah data
- Tampilkan data
- Edit data
- Hapus data

### 4. Role & Hak Akses (RBAC)

- Admin
- User
- Pembatasan akses berdasarkan role

## ⚙️ Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/djuliar/wssi_tif26.git
```

### 2. Pindahkan ke Folder Server

Contoh:

* XAMPP → `htdocs/`
* Laragon → `www/`

### 3. Import Database

* Buat database: `db_kampus`
* Import file `.sql` (jika tersedia)

### 4. Konfigurasi Database

Edit file:

```bash
config/database.php
```

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus";
```

### 5. Jalankan Project

Akses melalui browser:

```
http://localhost/wssi_tif26
```

## 🔑 Contoh Akun Login

| Role  | Username | Password |
| ----- | -------- | -------- |
| Admin | admin    | 123456   |
| User  | user     | 123456   |

## 🧠 Konsep yang Dipelajari

- Class & Object
- Encapsulation
- Separation of Concerns
- MVC sederhana
- Secure Authentication
- Database Interaction (MySQLi / PDO)

## 🚀 Pengembangan Selanjutnya

Beberapa pengembangan yang dapat dilakukan:

- REST API (Laravel / Flask)
- Integrasi Payment Gateway (Midtrans)
- Upload & manipulasi gambar
- Export PDF (DomPDF)
- Email verification
- Dashboard statistik

## 🤝 Kontribusi

Kontribusi sangat terbuka untuk:

- Perbaikan bug
- Penambahan fitur
- Refactoring kode

Langkah kontribusi:

1. Fork repository
2. Buat branch baru
3. Commit perubahan
4. Pull request

## 📄 Lisensi

Project ini digunakan untuk keperluan **pembelajaran dan akademik**.

## 👨‍🏫 Author

**David Juli Ariyadi**
Dosen / Pengampu Workshop Sistem Informasi

## ⭐ Penutup

Repositori ini diharapkan dapat membantu mahasiswa dalam memahami konsep dasar hingga implementasi nyata dalam pengembangan sistem informasi berbasis web menggunakan PHP OOP.

Happy Coding 🚀
