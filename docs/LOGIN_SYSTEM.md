# Sistem Login & User Management - Kasir Hadida

## 📋 Fitur yang Telah Dibuat

### ✅ Sistem Authentication

- **Halaman Login** dengan validasi username/email dan password
- **Session Management** untuk melacak user yang login
- **Route Protection** - semua halaman dilindungi, harus login terlebih dahulu
- **Logout** dengan penghapusan session

### ✅ User Management (Khusus Admin)

- **List Users** dengan DataTable (pagination, search, sorting)
- **Tambah User** - admin dapat membuat akun baru
- **Edit User** - update data user termasuk password (optional)
- **Delete User** - hapus user (tidak bisa hapus akun sendiri)
- **Toggle Status** - aktifkan/nonaktifkan user (tidak bisa nonaktifkan akun sendiri)

### ✅ Role-based Access

- **Admin**: Akses penuh termasuk kelola user
- **Kasir**: Akses dashboard, barang, transaksi, penjualan (tidak bisa kelola user)

---

## 🔐 Default Login

Setelah migration, sudah dibuat akun admin default:

```
Username: admin
Password: admin123
```

**PENTING**: Setelah login pertama kali, segera ganti password admin!

---

## 🗂️ Struktur Database

### Table: `users`

| Field      | Type                  | Description                   |
| ---------- | --------------------- | ----------------------------- |
| id         | INT(11)               | Primary key, auto increment   |
| username   | VARCHAR(50)           | Unique, untuk login           |
| email      | VARCHAR(100)          | Unique                        |
| password   | VARCHAR(255)          | Hashed dengan password_hash() |
| full_name  | VARCHAR(100)          | Nama lengkap user             |
| role       | ENUM('admin','kasir') | Role/hak akses                |
| is_active  | TINYINT(1)            | 1=aktif, 0=nonaktif           |
| created_at | DATETIME              | Waktu dibuat                  |
| updated_at | DATETIME              | Waktu diupdate                |

---

## 🚀 Cara Menggunakan

### 1. Run Migration (Sudah Dijalankan)

```bash
php spark migrate
```

### 2. Akses Halaman Login

- Buka browser: `http://localhost:8080/login`
- Login dengan akun default (admin/admin123)

### 3. Kelola User (Admin Only)

- Setelah login sebagai admin, klik menu **"Kelola User"** di sidebar
- Tambah user baru untuk kasir
- Edit/hapus user yang ada

### 4. Test Login Sebagai Kasir

- Buat user dengan role "kasir"
- Logout dari admin
- Login sebagai kasir
- Verifikasi bahwa menu "Kelola User" tidak muncul di sidebar

---

## 📁 File-file yang Dibuat

### Controllers

- `app/Controllers/AuthController.php` - Login, logout
- `app/Controllers/UserController.php` - CRUD user management

### Models

- `app/Models/User.php` - Model dengan password hashing otomatis

### Views

- `app/Views/pages/login.php` - Halaman login
- `app/Views/pages/users.php` - Halaman kelola user
- `app/Views/components/users/modalAddUser.php` - Modal tambah user
- `app/Views/components/users/modalEditUser.php` - Modal edit user

### Filters

- `app/Filters/AuthFilter.php` - Middleware untuk proteksi route

### JavaScript

- `public/assets/js/users.js` - Fungsi modal user management

### Database

- `app/Database/Migrations/2025-11-30-011237_Users.php` - Migration users table

### Config

- `app/Config/Routes.php` - Updated dengan auth routes dan filters
- `app/Config/Filters.php` - Registered AuthFilter

---

## 🛡️ Security Features

1. **Password Hashing**: Password di-hash dengan `password_hash()` (bcrypt)
2. **Session-based Auth**: Menggunakan CodeIgniter session library
3. **Route Protection**: Filter `auth` diterapkan ke semua route kecuali login
4. **Role-based Access**: Admin dan Kasir punya akses berbeda
5. **Self-protection**: User tidak bisa hapus/nonaktifkan akun sendiri
6. **Input Validation**: Semua input divalidasi (username unique, email valid, dll)
7. **XSS Protection**: Menggunakan `esc()` di views

---

## 🔄 Workflow Login

```
1. User akses halaman manapun (selain /login)
   ↓
2. AuthFilter check session 'isLoggedIn'
   ↓
3. Jika TIDAK login → Redirect ke /login
   ↓
4. User input username & password
   ↓
5. AuthController verify credentials
   ↓
6. Jika VALID → Set session & redirect ke dashboard
   ↓
7. User bisa akses semua halaman yang diizinkan rolenya
   ↓
8. Klik Logout → Destroy session → Redirect ke /login
```

---

## 📝 Catatan Penting

1. **Ganti Password Default**: Setelah deployment, segera ganti password admin default!

2. **Environment Production**:

   - Set `CI_ENVIRONMENT = production` di `.env`
   - Set `app.forceGlobalSecureRequests = true` untuk HTTPS

3. **Session Config**:

   - Session tersimpan di `writable/session/`
   - Pastikan folder writable punya permission yang benar

4. **Backup Database**:
   - Selalu backup sebelum hapus user
   - Jangan hapus semua admin (minimal harus ada 1 admin)

---

## 🐛 Troubleshooting

### Problem: "Silakan login terlebih dahulu" terus muncul

**Solution**:

```bash
# Clear session files
rm -rf writable/session/*

# Check session config di app/Config/Session.php
```

### Problem: Password tidak cocok

**Solution**:

- Pastikan password minimal 6 karakter
- Cek di database apakah password sudah di-hash
- Reset password admin via database jika perlu:

```sql
UPDATE users SET password = '$2y$10$...' WHERE username = 'admin';
```

### Problem: Modal tidak muncul

**Solution**:

- Check browser console untuk error JavaScript
- Pastikan `users.js` sudah di-load di layout.php
- Clear browser cache

---

## ✨ Next Steps (Optional Improvements)

1. **Forgot Password** - Reset password via email
2. **Profile Page** - User bisa edit profil sendiri
3. **Activity Log** - Track login/logout dan perubahan user
4. **2FA (Two Factor Auth)** - Extra security layer
5. **Password Strength Meter** - Visual indicator saat buat password
6. **Email Verification** - Verify email saat registrasi
7. **Remember Me** - Checkbox di login untuk stay logged in

---

**🎉 Sistem login sudah siap digunakan!**

Test dengan:

1. Login sebagai admin
2. Buat user kasir baru
3. Logout dan login sebagai kasir
4. Verifikasi akses role-based

Jika ada pertanyaan atau issue, silakan kontak developer.
