# 📚 S1TI Library

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![License](https://img.shields.io/badge/License-MIT-green)

---


## ⚙️ Tech Stack

* Backend: Laravel
* Frontend: Blade / Vite / NPM
* Database: MySQL
* Tools: Composer, Node.js

---

## ⚙️ Instalasi

Ikuti langkah berikut untuk menjalankan project di lokal:

---

### 🔗 Clone Repository

```bash
https://github.com/agustinusbayuajinugroho-ux/Coba2.git
```

---

### 📦 Install Dependencies

Pastikan sudah install **Composer & Node.js**

```bash
composer install
npm install
npm run dev
```

---

### ⚙️ Konfigurasi Environment

Copy file `.env`:

```bash
cp .env.example .env
```

Edit file `.env`:

```env
APP_NAME="S1TI Librabry"
APP_ENV=local
APP_KEY=base64:J//+jFPy45tDEUHoXqCJ28snFwmhufxs/0gm80hQdkI=
APP_DEBUG=true
APP_URL=http://localhost:8000

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=id_ID

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=s1ti_library
DB_USERNAME=root
DB_PASSWORD=
DB_ENGINE=InnoDB
```

Generate key:

```bash
php artisan key:generate
```

---

### 🗄️ Setup Database

Buat database baru di phpMyAdmin / MySQL:

```sql
s1ti_library
```

Edit file di route:

```
config/database.php
```

Ubah config/database.php di bagian mysql:

```php
'engine' => env('DB_ENGINE', 'InnoDB'),
```

---

### 🔄 Migrasi & Seeder

```bash
php artisan migrate
php artisan db:seed
```

---

### 🚀 Jalankan Server

```bash
php artisan serve
```

Akses:

```
http://localhost:8000
```

---

### Setelah semua selesai jalankan

```bash
php artisan storage:link
```

---

## 🛠️ Troubleshooting

Permission error:

```bash
chmod -R 775 storage bootstrap/cache
```

Clear cache:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 📌 Fitur



---
