<p align="center">
<a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# Laravel Cart API Project

This is a simple Laravel 12 RESTful API project for managing users, items, and shopping carts. The project uses **Laravel Sanctum** for authentication and token generation.

## Features

- Laravel 12
- Sanctum for API Authentication
- 3 Main Tables: `users`, `items`, `cart_items`
- Relationship:
  - `cart_items` belongs to `users` and `items`
- Item seeder for sample data
- Simple cart management functionality

---

## Getting Started

Follow these steps to set up and run the project on your local machine.

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project
```

### 2. Install Dependencies

```bash
Make sure you have PHP and Composer installed. Then run: composer install

```
### 3. Copy and Configure .env

```bash
php artisan key:generate

```

### 4. Run Migrations and Seeders

```bash
php artisan migrate --seed

```
### 5. Serve the Application

```bash
Composer run dev

```


---

### Catatan:
- Ganti `https://github.com/your-username/your-laravel-project.git` dengan URL repo GitHub kamu.
- Kalau kamu punya route khusus untuk login atau dokumentasi API (misalnya pakai Postman atau Swagger), kamu bisa tambahkan bagian **API Endpoints**.
- Kamu juga bisa menambahkan badge CI atau testing jika sudah terintegrasi.

Perlu saya bantu juga membuat dokumentasi endpoint API-nya atau file `postman_collection.json`?
