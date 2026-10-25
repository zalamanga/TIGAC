# TIGAC

Alur Blade, keranjang sesi, checkout, simulasi pembayaran dan panel admin dijelaskan di [CODE_FLOW](docs/CODE_FLOW.md).

Website katalog dan toko TIGAC dengan halaman publik, keranjang berbasis sesi, checkout, simulasi pembayaran, serta panel pengelolaan konten dan pesanan.

Proyek menggunakan Laravel 12, Blade, Fortify, MySQL, dan Vite. Lingkungan Docker menyediakan PHP 8.3, Nginx, serta MySQL 8.4. Aset frontend dibangun menggunakan Node.js 22.12+; PHP, Composer, dan Node.js tidak perlu dipasang di host untuk menjalankan Docker.

## Fitur

- Katalog, kategori, varian, gambar produk, dan ulasan.
- Keranjang: tambah produk, ubah jumlah, hapus, dan kosongkan.
- Checkout dengan metode pengiriman lokal dari `config/shipping.php`.
- Nomor pesanan, pencarian pesanan menggunakan nomor dan email, serta simulasi pembayaran.
- Panel admin untuk produk, pesanan, pengguna, banner, newsletter, partnership, FAQ, dan konten lainnya.
- Registrasi publik menghasilkan pengguna biasa. Akses admin memerlukan `is_admin = true` yang diberikan secara eksplisit melalui perintah admin.

## Menjalankan dengan Docker

Gunakan Docker Desktop dengan Linux containers dan Docker Compose v2. Jalankan perintah berikut dari direktori yang berisi `compose.yaml`.

Salin konfigurasi lokal:

```powershell
Copy-Item docker/.env.example .env.docker
```

Edit `.env.docker`: isi `DB_PASSWORD` dan `MYSQL_ROOT_PASSWORD` dengan password baru, lalu sesuaikan `APP_URL` dan `APP_PORT` bila diperlukan. Gunakan alamat browser yang sama dengan `APP_URL`. File ini diabaikan Git dan tidak boleh dibagikan.

Bangun image dan buat kunci aplikasi sekali untuk konfigurasi baru:

```powershell
docker compose --env-file .env.docker build
docker compose --env-file .env.docker run --rm --no-deps --user root app php artisan key:generate --force
```

Perintah kunci menulis `APP_KEY` ke `.env.docker`. Simpan file tersebut dan gunakan kembali saat menyalakan aplikasi berikutnya.

Nyalakan layanan dan buat tabel:

```powershell
docker compose --env-file .env.docker up -d
docker compose --env-file .env.docker exec app php artisan migrate --force
```

Buka [http://localhost:8080](http://localhost:8080). Endpoint `/up` mengembalikan `{"status":"ok"}` untuk pemeriksaan aplikasi tanpa mengakses database. Status layanan dapat dilihat dengan:

```powershell
docker compose --env-file .env.docker ps
```

Layanan web hanya terikat ke alamat loopback host. MySQL tidak membuka port ke host. Database baru belum berisi katalog atau akun admin; isi konten melalui panel admin. Setup tidak mengimpor dump SQL, menjalankan seeder, atau menghapus tabel secara otomatis.

## Membuat akun admin

Setelah migrasi selesai, jalankan:

```powershell
docker compose --env-file .env.docker exec app php artisan app:create-admin
```

Masukkan email, nama, password minimal 12 karakter, dan konfirmasi password. Password diminta secara tersembunyi. Tidak ada akun atau password admin bawaan.

Jika email sudah terdaftar sebagai pengguna biasa, perintah meminta persetujuan sebelum memberikan akses admin. Password akun lama tetap berlaku. Migrasi tidak otomatis menjadikan akun lama sebagai admin. Buka `/login`, lalu masuk dengan akun tersebut untuk mengakses `/admin`.

## Alur pesanan dan batas simulasi

1. Tambahkan produk yang tersedia ke keranjang, lalu buka `/checkout`.
2. Isi data pembeli dan pilih metode pengiriman. Ongkos merupakan nilai tetap dalam konfigurasi proyek, tanpa integrasi kurir.
3. Checkout membuat pesanan berstatus `pending`. Stok belum dicadangkan pada tahap ini.
4. Tombol pembayaran menjalankan simulasi: stok diperiksa kembali dan dikurangi saat pembayaran berhasil. Tidak ada transaksi ke bank atau payment gateway.
5. Admin dapat melanjutkan pesanan berbayar ke tahap pemrosesan, pengiriman, dan selesai. Pembatalan tersedia untuk pesanan `pending`; pembatalan pesanan berbayar dan refund belum diterapkan.

Docker memaksa `MAIL_MAILER=log`, sehingga pesan email, termasuk tautan reset password, dicatat oleh aplikasi dan tidak dikirim melalui SMTP. Untuk melihat tautan reset setelah mengisi halaman lupa password, jalankan `docker compose --env-file .env.docker logs app` di komputer lokal. Nama, kontak, gambar, dan isi halaman yang sudah ada berasal dari materi proyek; keberadaannya tidak membuktikan layanan bisnis aktif.

## Pengembangan dan pengujian

Kode aplikasi disalin ke dalam image. Setelah mengubah kode atau aset, bangun dan mulai ulang layanan:

```powershell
docker compose --env-file .env.docker up -d --build
```

Untuk membangun aset langsung di host, gunakan Node.js 22.12+:

```powershell
npm ci
npm run build
```

Jalankan pengujian PHP di container:

```powershell
docker compose --env-file .env.docker exec app php artisan test
```

Konfigurasi pengujian memakai SQLite `:memory:` dan mail `array`; pengujian fitur memalsukan pengiriman email. Cakupannya meliputi pembatasan admin, registrasi, perintah pembuatan admin, serta alur keranjang dan pesanan. Pengujian otomatis tidak menjalankan pembayaran nyata atau mengirim email ke pelanggan.

Verifikasi Docker: tiga layanan berstatus sehat, 24 migrasi berhasil di MySQL 8.4, serta 54 pengujian PHP dengan 367 asersi lulus pada PHP 8.3.35.

Pemeriksaan Edge pada database kosong mencakup sembilan halaman publik/auth pada lebar 390 dan 1440 piksel (18 kunjungan), tanpa error JavaScript, aset lokal gagal, atau overflow horizontal. Beranda juga diperiksa pada lebar 320 dan 768 piksel.

Hentikan layanan tanpa menghapus data lokal:

```powershell
docker compose --env-file .env.docker down
```

Database dan berkas unggahan disimpan dalam named volumes. Penghapusan volumes akan menghapus data tersebut. Mengubah password di file konfigurasi saja tidak mengubah password MySQL pada volume yang sudah dibuat.

## Struktur

```text
app/                  Controller, model, layanan, middleware, dan perintah admin
config/shipping.php   Pilihan serta ongkos pengiriman simulasi
database/migrations/  Struktur database dan penambahan hak admin
resources/            Template Blade dan sumber aset frontend
routes/web.php        Halaman publik dan rute admin
tests/                Pengujian unit dan fitur
docker/               Contoh konfigurasi dan konfigurasi layanan
Dockerfile            Build aplikasi dan aset
compose.yaml          Layanan app, web, dan db
```

## Catatan pemeliharaan

Dependensi diperbarui dari Laravel 10 ke Laravel 12 dengan mempertahankan struktur aplikasi yang ada, termasuk `app/Http/Kernel.php` dan provider. Proyek tidak diganti dengan skeleton baru. Konfigurasi Docker ini ditujukan untuk pengembangan lokal; integrasi pembayaran dan pengiriman masih berupa simulasi.

Audit Composer pada pembaruan lockfile ini turun dari 84 temuan menjadi 0. Audit dependensi npm juga melaporkan 0 temuan.

Dump database dan konfigurasi lokal tidak disertakan dalam pohon kerja yang dipublikasikan. Penghapusan berkas tidak menghapus riwayat Git lama. Jika kredensial atau password akun bawaan dari versi lama masih digunakan, ganti sebelum memakai data atau akses yang penting.
