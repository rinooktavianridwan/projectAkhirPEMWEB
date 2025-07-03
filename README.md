# 🚗 Sistem Rental Mobil - Laravel Web Application

<div align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="100" height="100">
  
  [![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
  [![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
  [![Blade](https://img.shields.io/badge/Blade-Template-4CAF50?style=for-the-badge)](https://laravel.com/docs/blade)
  
  <p align="center">
    <strong>Aplikasi Rental Mobil Berbasis Web</strong>
    <br>
    <em>Project Akhir Mata Kuliah Pemrograman Web</em>
  </p>
</div>

---

## 📋 Tentang Project

**Sistem Rental Mobil** adalah aplikasi web yang dikembangkan untuk memudahkan proses penyewaan mobil. Aplikasi ini memungkinkan pengguna untuk melihat daftar mobil yang tersedia, melakukan pemesanan, dan mengelola transaksi rental mobil dengan mudah.

### 🎯 Fitur Utama
- 🔐 **Sistem Autentikasi**: Registrasi dan login pengguna
- 🚗 **Katalog Mobil**: Menampilkan daftar mobil dengan kategori dan lokasi
- 📅 **Pemesanan**: Sistem booking dengan tanggal pickup dan return
- 💰 **Manajemen Transaksi**: Tracking status pesanan dan pembayaran
- 👨‍💼 **Panel Admin**: Dashboard untuk mengelola mobil dan transaksi
- 📱 **Responsive Design**: Interface yang mobile-friendly

## 🚀 Teknologi yang Digunakan

### Backend
- **PHP** ^8.2 - Server-side programming language
- **Laravel** ^11.0 - PHP web framework
- **Laravel Breeze** ^2.0 - Authentication scaffolding
- **MySQL** - Database management system

### Frontend
- **Blade** - Laravel templating engine
- **HTML/CSS** - Markup dan styling
- **JavaScript** - Client-side interactivity
- **Bootstrap/Tailwind** - CSS framework

### Tools
- **Composer** - PHP dependency management
- **npm** - Node.js package manager
- **Vite** - Frontend build tool

## 📁 Struktur Database

Aplikasi ini menggunakan 4 model utama:

### 🚗 **Car Model**
- `name` - Nama mobil
- `category` - Kategori mobil (SUV, Sedan, dll)
- `image` - Gambar mobil
- `city` - Kota lokasi mobil
- `status` - Status ketersediaan (Default: "Tersedia")
- `price` - Harga sewa per hari

### 👤 **User Model**
- `name` - Nama pengguna
- `email` - Email pengguna
- `password` - Password terenkripsi
- `phone` - Nomor telepon
- `address` - Alamat lengkap
- `city` - Kota
- `country` - Negara
- `postal_code` - Kode pos

### 💳 **Transaction Model**
- `user_id` - ID pengguna yang menyewa
- `car_id` - ID mobil yang disewa
- `pickup_date` - Tanggal ambil mobil
- `return_date` - Tanggal kembali mobil
- `transaction_value` - Nilai transaksi

### 👨‍💼 **Admin Model**
- Model untuk identifikasi admin berdasarkan email

## 🛠️ Instalasi

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL/MariaDB

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/rinooktavianridwan/projectAkhirPEMWEB.git
   cd projectAkhirPEMWEB
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rental_mobil
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migration**
   ```bash
   php artisan migrate
   ```

6. **Build Assets**
   ```bash
   npm run dev
   ```

7. **Start Application**
   ```bash
   php artisan serve
   ```

## 🗺️ Routing Structure

### Public Routes
- `/login` - Halaman login
- `/register` - Halaman registrasi
- `/forgot-password` - Reset password

### Authenticated Routes
- `/dashboard` - Dashboard utama
- `/cars` - Katalog mobil
- `/myorder` - Pesanan saya
- `/aboutUs` - Tentang kami

### Admin Routes
- `/admin` - Dashboard admin
- `/admin/transactions/{status}` - Transaksi berdasarkan status
- `/admin/summary` - Ringkasan data

### API Endpoints
- `/get-cars` - Ambil data mobil
- `/get-unique-categories` - Kategori mobil unik
- `/get-unique-cities` - Kota unik
- `/get-unique-statuses` - Status unik
- `/get-unavailable-dates/{carId}` - Tanggal tidak tersedia
- `/get-transactions-by-user/{userId}` - Transaksi per user

## 🔐 Sistem Autentikasi

Aplikasi menggunakan Laravel Breeze untuk autentikasi dengan fitur:
- User registration dan login
- Email verification
- Password reset
- Profile management
- Admin role checking

## 📱 Responsive Design

Interface dirancang mobile-first dan responsive untuk berbagai perangkat:
- Mobile phones (320px+)
- Tablets (768px+)
- Desktop (1024px+)

## 👥 Tim Pengembang

<div align="center">
  <table>
    <tr>
      <td align="center">
        <a href="https://github.com/rinooktavianridwan">
          <img src="https://avatars.githubusercontent.com/u/121547293?v=4" width="100px;" alt="Rino Oktavian Ridwan"/><br />
          <sub><b>Rino Oktavian Ridwan</b></sub>
        </a><br />
        <a href="https://github.com/rinooktavianridwan" title="GitHub">🐙</a>
        <a href="https://www.linkedin.com/in/rino-oktavian-ridwan/" title="LinkedIn">💼</a>
      </td>
      <td align="center">
        <a href="https://github.com/Warwoyo">
          <img src="https://avatars.githubusercontent.com/u/125743186?v=4" width="100px;" alt="Warwoyo"/><br />
          <sub><b>Warwoyo</b></sub>
        </a><br />
        <a href="https://github.com/Warwoyo" title="GitHub">🐙</a>
        <a href="https://www.linkedin.com/in/pdivakara/" title="LinkedIn">💼</a>
      </td>
    </tr>
  </table>
</div>

## 📚 Tentang Project

Ini adalah project tugas kuliah untuk mata kuliah **Pemrograman Web**. Project ini dibuat sebagai implementasi praktis dari konsep-konsep yang dipelajari dalam mata kuliah, termasuk:

- Web development dengan PHP dan Laravel
- Database design dan management
- User interface dan user experience
- Authentication dan authorization
- RESTful API development
- Responsive web design

## 🏫 Konteks Akademik

**Mata Kuliah**: Pemrograman Web  
**Jenis**: Project Akhir/Tugas Akhir  
**Tujuan**: Implementasi sistem rental mobil berbasis web  
**Framework**: Laravel 11.x  
**Tahun**: 2024  

## 📞 Kontak

Untuk pertanyaan atau diskusi terkait project ini, silakan hubungi:

- **Rino Oktavian Ridwan**: [GitHub](https://github.com/rinooktavianridwan) | [LinkedIn](https://www.linkedin.com/in/rino-oktavian-ridwan/)
- **Warwoyo**: [GitHub](https://github.com/Warwoyo) | [LinkedIn](https://www.linkedin.com/in/pdivakara/)

## 🙏 Acknowledgments

Terima kasih kepada:
- Dosen mata kuliah Pemrograman Web
- Komunitas Laravel Indonesia
- Teman-teman yang membantu dalam pengembangan project ini

---

<div align="center">
  <p>
    <strong>Sistem Rental Mobil</strong> • Project Akhir Pemrograman Web
  </p>
  <p>
    <em>Dibuat dengan Laravel & dikembangkan untuk keperluan akademik</em>
  </p>
</div>
