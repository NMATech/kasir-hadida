# 🚀 Panduan Deploy Kasir Hadida - Hosting Gratis

Panduan lengkap untuk deploy aplikasi kasir ke server **gratis** dengan berbagai pilihan hosting.

## 🎯 Pilihan Hosting Gratis (Untuk Indonesia)

### ✅ **REKOMENDASI #1: InfinityFree** (Paling Mudah - Tanpa Kartu Kredit)

- **Hosting**: Unlimited
- **Database**: MySQL Unlimited
- **Bandwidth**: Unlimited
- **Domain**: Subdomain gratis atau bisa pakai domain sendiri
- **PHP**: Support PHP 8.x
- **100% GRATIS - Tanpa Kartu Kredit!** ✅
- **Link**: https://infinityfree.net

### ⚠️ **Option 2: Oracle Cloud Free Tier** (Butuh Kartu Kredit)

- **CATATAN**: Oracle Cloud sering **reject kartu debit Indonesia** (Jago, Jenius, dll)
- Hanya menerima kartu kredit internasional atau kartu debit tertentu
- Jika kartu Anda ditolak, pakai **InfinityFree** atau **000webhost** di bawah

### ✅ **Option 3: 000webhost** (Gratis - Tanpa Kartu Kredit)

- **Storage**: 300 MB
- **Database**: 1 MySQL
- **Bandwidth**: 3 GB/bulan
- **PHP**: Support PHP 8.x
- **Link**: https://www.000webhost.com

### ✅ **Option 4: GitHub + Cloudflare Pages** (Advanced)

- Deploy static frontend + serverless backend
- Butuh setup lebih kompleks
- **Link**: https://pages.cloudflare.com

---

# 📝 Panduan Deploy ke InfinityFree (Recommended)

## Kenapa InfinityFree?

✅ **Tanpa kartu kredit** - cukup email saja!  
✅ **Unlimited** hosting & database  
✅ **Support PHP 8.x & MySQL**  
✅ **cPanel** - mudah digunakan  
✅ **Gratis selamanya** (ada ads, tapi bisa dihilangkan)

---

## 🎯 Langkah 1: Buat Akun InfinityFree

1. Kunjungi: https://infinityfree.net
2. Klik **"Sign Up"**
3. Isi data:
   - Email (pakai email aktif)
   - Password
   - **TIDAK BUTUH KARTU KREDIT!** ✅
4. Verifikasi email Anda
5. Login ke InfinityFree

---

## 🎯 Langkah 2: Buat Hosting Account

### 2.1 Create Website

1. Di dashboard InfinityFree, klik **"Create Account"**
2. **Choose Domain**:
   - **Option A (Gratis)**: Pilih subdomain gratis (contoh: `kasir-hadida.rf.gd`)
   - **Option B**: Pakai domain sendiri (jika punya)
3. Klik **"Create Account"**
4. Tunggu 2-5 menit proses setup

### 2.2 Akses cPanel

1. Setelah account active, klik **"Control Panel"** atau **"cPanel"**
2. Login otomatis ke cPanel
3. Anda akan lihat dashboard cPanel dengan berbagai tools

---

## 🎯 Langkah 3: Setup Database

### 3.1 Create MySQL Database

1. Di cPanel, cari dan klik **"MySQL Databases"**
2. Di bagian **"Create New Database"**:
   - Database Name: `kasir_hadida` (tanpa prefix, akan ditambahkan otomatis)
   - Klik **"Create Database"**

⚠️ **CATATAN PENTING untuk InfinityFree:**

- InfinityFree **TIDAK mengizinkan** membuat MySQL user sendiri di plan gratis
- User database **sudah otomatis dibuat** dengan nama yang sama dengan username hosting Anda
- Password database **sama dengan password vPanel** Anda

### 3.2 Catat Info Database

Berdasarkan screenshot yang Anda berikan, informasi database Anda adalah:

⚠️ **PENTING - Gunakan informasi ini untuk .env:**

- **Database Host**: `sql211.infinityfree.com` (BUKAN localhost!)
- **Database Name**: `if0_40555792_kasir_hadida`
- **Database User**: `if0_40555792`
- **Database Password**: (Your vPanel Password) - Password yang Anda gunakan login ke vPanel/cPanel

> **Catatan Penting**:
>
> - Prefix `if0_40555792_` akan otomatis ditambahkan di depan nama database
> - Username database = username hosting Anda (tanpa prefix database)
> - Password database = password vPanel Anda
> - Host database di InfinityFree BUKAN `localhost`, tapi `sql211.infinityfree.com` (sesuai yang tertera di tabel)

---

## 🎯 Langkah 4: Upload File Aplikasi

### 4.1 Persiapan di Komputer Lokal

1. **Build CSS Production**:

   ```bash
   cd /Applications/XAMPP/xamppfiles/htdocs/kasir-hadida
   npm run build
   ```

2. **Install Composer Dependencies** (jika belum):

   ```bash
   composer install --no-dev --optimize-autoloader
   ```

3. **Update .env untuk production**:

   - Buka file `.env`
   - Update settings berikut:

   ```env
   CI_ENVIRONMENT = production

   app.baseURL = 'http://kasir-hadida.rf.gd'  # Ganti dengan domain Anda

   # Database Config - Sesuaikan dengan info dari Langkah 3.2
   database.default.hostname = sql211.infinityfree.com  # BUKAN localhost!
   database.default.database = if0_40555792_kasir_hadida  # Prefix otomatis
   database.default.username = if0_40555792    # Username hosting Anda
   database.default.password = YourVPanelPassword  # Password vPanel Anda
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

   ⚠️ **PENTING**:

   - Hostname di InfinityFree BUKAN `localhost`!
   - Gunakan hostname yang tertera di tabel "Current Databases" (contoh: `sql211.infinityfree.com`)
   - Username = username hosting tanpa prefix database
   - Password = password vPanel Anda (yang digunakan login ke cPanel)

### 4.2 Upload via File Manager (Cara Termudah)

1. Di cPanel, klik **"File Manager"**
2. Navigasi ke folder **`htdocs`** atau **`public_html`**
3. **Delete** semua file default di folder tersebut
4. Klik **"Upload"** di toolbar
5. **Upload semua file dari komputer** Anda:
   - Cara paling praktis: **Zip semua file project** terlebih dahulu
   - Upload file zip
   - Setelah upload selesai, klik kanan file zip → **"Extract"**
   - Setelah extract, hapus file zip

⚠️ **PENTING - File .env Tidak Bisa Diupload!**

File yang diawali dengan titik (`.env`, `.htaccess`) sering ditolak oleh File Manager.

**Solusi untuk file .env:**

**Option 1: Buat file .env langsung di File Manager (Recommended)**

1. Di File Manager, navigasi ke folder `htdocs`
2. Klik **"New File"** atau tombol **+ File**
3. Nama file: `.env` (dengan titik di depan)
4. Klik **"Create New File"**
5. Klik kanan file `.env` → **"Edit"** atau **"Code Editor"**
6. Copy-paste isi dari `.env.production` Anda (lihat contoh di bawah)
7. Save file

**Option 2: Rename file setelah upload**

1. Rename file `.env` menjadi `env.txt` di komputer lokal
2. Upload file `env.txt` via File Manager
3. Setelah upload, klik kanan file `env.txt` → **"Rename"**
4. Rename menjadi `.env`
5. Edit file dan sesuaikan konfigurasi

**Option 3: Via FTP (paling reliable)**

1. Gunakan FileZilla atau FTP client lain
2. Connect ke server dengan kredensial FTP
3. Upload file `.env` langsung via FTP (FTP client support hidden files)

### 4.3 Upload via FTP (Alternative)

1. Di cPanel, cari **"FTP Accounts"**
2. Gunakan kredensial FTP yang diberikan
3. Download FTP client seperti **FileZilla**: https://filezilla-project.org
4. Connect ke server dengan kredensial FTP
5. Upload semua file ke folder `htdocs` atau `public_html`

### 4.4 Struktur File yang Benar

Pastikan struktur file di `htdocs` seperti ini:

```
htdocs/
├── app/
├── public/
│   ├── index.php
│   ├── assets/
│   └── ...
├── vendor/
├── writable/
├── .env
├── composer.json
└── ...
```

⚠️ **PENTING**: File `index.php` utama ada di folder `public/`

---

## 🎯 Langkah 5: Set Document Root ke public/

InfinityFree (dan shared hosting lain) perlu konfigurasi agar web server nge-point ke folder `public/`.

### 5.1 Cara 1: File .htaccess di Root htdocs (Recommended)

1. Di File Manager, buka folder `htdocs` (root folder)
2. Buat file baru `.htaccess`:
   - Klik **"New File"** atau tombol **+ File**
   - Nama: `.htaccess` (dengan titik di depan)
   - Jika error, buat dengan nama `htaccess.txt` dulu, lalu rename jadi `.htaccess`
3. Edit file `.htaccess` dan paste kode ini:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

# Redirect index
DirectoryIndex public/index.php
```

4. Save file

**PENTING:** File `.htaccess` ini HARUS ada di folder `htdocs` (bukan di dalam folder `public/`)

### 5.1b Tambahan: .htaccess di folder public/

1. Di File Manager, masuk ke folder `htdocs/public/`
2. Pastikan sudah ada file `.htaccess`
3. Jika belum ada, buat file `.htaccess` dengan isi:

```apache
# Disable directory browsing
Options -Indexes

<IfModule mod_rewrite.c>
    RewriteEngine On

    # Redirect Trailing Slashes...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Rewrite "www.example.com -> example.com"
    RewriteCond %{HTTPS} !=on
    RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
    RewriteRule ^ http://%1%{REQUEST_URI} [R=301,L]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

4. Save file

### 5.2 Cara 2: Pindahkan isi public/ ke root (Alternative - Jika .htaccess tidak work)

⚠️ **Gunakan cara ini HANYA jika Cara 1 (.htaccess) tidak berhasil!**

1. Di File Manager, masuk ke folder `htdocs/public/`
2. **Select All** file di dalam folder public/ (Ctrl+A atau centang semua)
3. Klik **"Move"** atau **"Cut"**
4. Kembali ke folder `htdocs/` (parent/root)
5. Klik **"Paste"** - semua file dari public/ sekarang ada di root htdocs/
6. **PENTING**: Edit file `index.php` yang baru dipindah:
   - Klik kanan `index.php` → **"Edit"**
   - Cari baris sekitar line 18-20:
     ```php
     require FCPATH . '../app/Config/Paths.php';
     ```
   - Ganti menjadi:
     ```php
     require FCPATH . 'app/Config/Paths.php';
     ```
   - Save file
7. Sekarang folder `htdocs/` berisi:
   - `index.php` (dari public/)
   - folder `assets/` (dari public/)
   - folder `app/`
   - folder `vendor/`
   - dll.

### 5.3 Set Permissions

1. Di File Manager, klik folder **`writable`**
2. Klik **"Permissions"** atau **"Change Permissions"**
3. Set permission menjadi **`755`** atau **`775`**
4. **Centang** "Recurse into subdirectories"
5. Klik **"Change Permissions"**

---

## 🎯 Langkah 6: Import Database

### 6.1 Export Database dari Local

1. Di komputer lokal, buka **phpMyAdmin** (XAMPP)
2. Pilih database `kasir-hadida`
3. Klik tab **"Export"**
4. Pilih **"Quick"** export method
5. Format: **SQL**
6. Klik **"Go"** → file `.sql` akan terdownload

### 6.2 Import ke InfinityFree

1. Di cPanel InfinityFree, klik **"phpMyAdmin"**
2. Pilih database `if0_40555792_kasir_hadida` di sidebar kiri (sesuaikan dengan prefix Anda)
3. Klik tab **"Import"**
4. Klik **"Choose File"** → pilih file `.sql` yang tadi didownload
5. Scroll ke bawah, klik **"Go"**
6. Tunggu sampai muncul pesan "Import has been successfully finished"

⚠️ **CATATAN**: Jika file SQL terlalu besar (>2MB), Anda perlu:

- Compress file SQL menjadi .zip atau .gz terlebih dahulu, ATAU
- Split file SQL menjadi beberapa bagian kecil, ATAU
- Import manual table by table

✅ **Database berhasil diimport!**

---

## 🎯 Langkah 7: Test Aplikasi

1. Buka browser
2. Akses domain Anda: `http://kasir-hadida.rf.gd` (sesuaikan dengan domain Anda)
3. Anda akan diarahkan ke halaman login
4. Login dengan akun default:
   - Username: **admin**
   - Password: **admin123**

✅ **Aplikasi kasir berhasil online!**

---

## 🔧 Troubleshooting

### Problem: "Database connection failed"

**Solution:**

1. Pastikan .env sudah benar:
   - Hostname: `sql211.infinityfree.com` (BUKAN localhost!)
   - Database name: `if0_xxxxxxxx_kasir_hadida` (dengan prefix)
   - Username: `if0_xxxxxxxx` (username hosting, TANPA suffix `_kasir_hadida`)
   - Password: Password vPanel Anda (yang untuk login cPanel)
2. Test koneksi database di phpMyAdmin - pastikan bisa login
3. Cek di "Current Databases" untuk melihat hostname yang benar

**Contoh .env yang BENAR:**

```env
database.default.hostname = sql211.infinityfree.com
database.default.database = if0_40555792_kasir_hadida
database.default.username = if0_40555792
database.default.password = YourVPanelPasswordHere
```

**Contoh yang SALAH:**

```env
# ❌ SALAH - hostname bukan localhost
database.default.hostname = localhost

# ❌ SALAH - username tidak ada suffix database
database.default.username = if0_40555792_kasir_hadida
```

### Problem: "No index file was found for your website"

**Solution:**

Ini karena InfinityFree tidak menemukan file `index.php` di root folder.

**Solusi 1 (Recommended):** Buat file `.htaccess` di root htdocs

1. Di File Manager, buka folder `htdocs`
2. Buat file `.htaccess` dengan isi:

   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteRule ^(.*)$ public/$1 [L]
   </IfModule>

   DirectoryIndex public/index.php
   ```

3. Save dan refresh browser

**Solusi 2:** Pindahkan isi folder public/ ke root htdocs

1. Move semua file dari `htdocs/public/` ke `htdocs/`
2. Edit `index.php`, ubah `require FCPATH . '../app/Config/Paths.php';` menjadi `require FCPATH . 'app/Config/Paths.php';`

### Problem: "500 Internal Server Error"

**Solution:**

1. Check file `.htaccess` sudah benar
2. Check permission folder `writable` sudah 755/775
3. Check .env file `CI_ENVIRONMENT = production`
4. Check error log di cPanel → "Error Logs"

### Problem: CSS/JS tidak load

**Solution:**

1. Pastikan sudah run `npm run build` sebelum upload
2. Check folder `public/assets/css/output.css` ada
3. Clear browser cache (Ctrl + Shift + R)

### Problem: "403 Forbidden"

**Solution:**

1. Pastikan file `index.php` ada di folder yang benar
2. Check permission files & folders (755 untuk folder, 644 untuk file)
3. Check .htaccess configuration

---

## 🚀 Tips & Best Practices

### 1. Ganti Password Default

Setelah login pertama kali:

1. Masuk ke menu **"Kelola User"**
2. Edit user admin
3. Ganti password ke yang lebih aman

### 2. Backup Rutin

1. Export database dari phpMyAdmin setiap minggu
2. Download file aplikasi via FTP
3. Simpan backup di Google Drive / cloud storage

### 3. Monitor Resource Usage

1. Login ke InfinityFree dashboard
2. Check usage: bandwidth, storage, inode
3. Jika hampir limit, delete file tidak perlu / optimize

### 4. Update Aplikasi

Jika ada update dari GitHub:

1. Download/pull update terbaru
2. Build CSS: `npm run build`
3. Upload file yang berubah via FTP/File Manager
4. Update database (run migration jika ada)

---

## 💡 Alternative Hosting (Jika InfinityFree Penuh)

## 💡 Alternative Hosting (Jika InfinityFree Penuh)

### 1. **000webhost** (Gratis - Tanpa Kartu Kredit)

- Link: https://www.000webhost.com
- Storage: 300 MB
- Langkah deploy sama seperti InfinityFree
- Support PHP & MySQL

### 2. **Hostinger Gratis** (Limited Trial)

- Link: https://www.hostinger.co.id
- Free trial 30 hari
- Setelah itu bayar (murah, ~Rp 20.000/bulan)

### 3. **Niagahoster** (Trial Gratis)

- Link: https://www.niagahoster.co.id
- Trial gratis dengan fitur lengkap
- Support Indonesia (chat cs mudah)

---

## 🆓 Cara Dapat Domain Gratis

Jika tidak mau pakai subdomain InfinityFree:

### 1. **Freenom** (Domain .tk, .ml, .ga, .cf, .gq)

- Link: https://www.freenom.com
- Gratis 12 bulan, bisa diperpanjang
- Daftar dengan email
- Pilih domain yang available

### 2. **DuckDNS** (Subdomain .duckdns.org)

- Link: https://www.duckdns.org
- Gratis selamanya
- Setup mudah, cukup login GitHub/Google

### 3. **Afraid.org** (Berbagai subdomain gratis)

- Link: https://freedns.afraid.org
- Banyak pilihan domain/subdomain
- Gratis

---

## 📊 Perbandingan Hosting Gratis

| Hosting             | Storage   | Database  | Tanpa CC    | Ads                | Uptime |
| ------------------- | --------- | --------- | ----------- | ------------------ | ------ |
| **InfinityFree**    | Unlimited | Unlimited | ✅          | Ada (bisa dihapus) | 99%    |
| **000webhost**      | 300 MB    | 1 DB      | ✅          | Ada                | 95%    |
| ~~Oracle Cloud~~    | 200 GB    | Unlimited | ❌ Butuh CC | Tidak              | 99.9%  |
| **Hostinger Trial** | 30 GB     | Unlimited | ✅          | Tidak              | 99.9%  |

**Rekomendasi:** InfinityFree untuk start, upgrade ke Hostinger jika trafik tinggi.

---

## ✅ Checklist Deploy InfinityFree

- [ ] Akun InfinityFree dibuat (tanpa kartu kredit)
- [ ] Hosting account & domain setup
- [ ] Database MySQL dibuat
- [ ] Info database dicatat (dengan prefix!)
- [ ] File aplikasi di-build (`npm run build`)
- [ ] File .env diupdate (database info + baseURL)
- [ ] Composer install --no-dev
- [ ] Semua file di-upload ke htdocs (zip → extract)
- [ ] File .env dibuat manual di File Manager (atau upload via FTP)
- [ ] .htaccess dikonfigurasi untuk point ke public/
- [ ] Permission writable/ di-set 755
- [ ] Database di-import via phpMyAdmin
- [ ] Test akses website di browser
- [ ] Login dengan admin/admin123 berhasil
- [ ] Ganti password admin

---

## 💰 Estimasi Biaya

**TOTAL: Rp 0 / GRATIS!** 🎉

- InfinityFree Hosting: **Gratis selamanya**
- Domain: **Gratis** (pakai subdomain .rf.gd atau Freenom)
- SSL: **Gratis** (InfinityFree include SSL otomatis)
- Database: **Gratis unlimited**

**Jika mau upgrade:**

- Domain .com: ~Rp 100.000 - 150.000/tahun
- Hosting berbayar: ~Rp 20.000 - 50.000/bulan (Hostinger, Niagahoster)

---

## 📞 Bantuan & Support

### InfinityFree Support:

- Forum: https://forum.infinityfree.net
- Knowledge Base: https://kb.infinityfree.net
- Response time: 24-48 jam

### Grup Indonesia:

- Facebook Group: "Web Hosting Indonesia"
- Telegram: Cari grup "InfinityFree Indonesia"

---

## 🎯 Next Steps Setelah Deploy

1. ✅ **Ganti password default admin**
2. ✅ **Buat user kasir untuk karyawan**
3. ✅ **Input data kategori & barang**
4. ✅ **Test fitur transaksi**
5. ✅ **Backup database rutin** (setiap minggu)
6. ✅ **Monitor usage** (jangan sampai over limit)
7. ✅ **Optional**: Beli domain custom (.com) jika budget ada

---

**🎉 Selamat! Aplikasi kasir sudah online 24/7 tanpa perlu XAMPP, kartu kredit, atau server sendiri!**

**Link:** http://kasir-hadida.rf.gd (ganti dengan domain Anda)

**Login:** admin / admin123

Toko ibu Anda sekarang sudah punya sistem kasir online yang bisa diakses dari mana saja! 🚀
