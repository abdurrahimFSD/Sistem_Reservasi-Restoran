# Sistem Reservasi Restoran

Sistem Reservasi Restoran adalah aplikasi berbasis web yang memungkinkan pelanggan untuk membuat, memperbarui, dan mengelola reservasi meja di restoran. Aplikasi ini juga memungkinkan manajer restoran untuk mengelola data meja, pelanggan, dan reservasi melalui antarmuka pengguna yang intuitif.

## Struktur Folder

- `assets/`
  - `css/` - File CSS untuk gaya aplikasi.
  - `images/` - Direktori untuk menyimpan gambar.
  - `js/` - File JavaScript untuk interaktivitas.
  - `libs/`
    - `bootstrap/` - Bootstrap library untuk styling.
    - `datatable/` - Library DataTables untuk tabel interaktif.
    - `iconify-icon/` - Library ikon Iconify.
    - `simplebar/` - Library SimpleBar untuk scrollbars custom.
    - `sweetalert/` - Library SweetAlert untuk popups dan alert.

- `components/`
  - `alert/` - Komponen untuk alert dengan `alert.js`.
  - `chart/` - Komponen untuk grafik dengan `chart.init.php`.

- `controllers/`
  - `authController.php` - Mengelola otentikasi pengguna.
  - `process.php` - Menangani pemrosesan formulir.
  - `function.php` - Berisi fungsi-fungsi umum.

- `config/`
  - `authCheck.php` - Memeriksa status otentikasi pengguna.
  - `connection.php` - Konfigurasi koneksi database.

- `database/`
  - `sistem_reservasi-restoran.sql` - Skrip SQL untuk membuat dan mengisi database.

- `layouts/`
  - `mainWrapper.php` - Layout utama aplikasi.
  - `sidebar.php` - Sidebar navigasi.
  - `pageWrapper.php` - Pembungkus halaman.
  - `footer.php` - Footer halaman.

- `pages/`
  - `auth/` - Halaman otentikasi.
    - `logout.php` - Proses logout pengguna.
    - `signin.php` - Halaman login pengguna.
    - `signup.php` - Halaman pendaftaran pengguna.

  - `meja/` - Halaman untuk mengelola meja.
    - `mejaRead.php` - Melihat data meja.
    - `mejaCreate.php` - Menambah meja baru.
    - `mejaUpdate.php` - Memperbarui data meja.
    - `mejaDelete.php` - Menghapus meja.

  - `pelanggan/` - Halaman untuk mengelola pelanggan.
    - `pelangganRead.php` - Melihat data pelanggan.
    - `pelangganCreate.php` - Menambah pelanggan baru.
    - `pelangganUpdate.php` - Memperbarui data pelanggan.
    - `pelangganDelete.php` - Menghapus pelanggan.

  - `reservasi/` - Halaman untuk mengelola reservasi.
    - `reservasiRead.php` - Melihat data reservasi.
    - `reservasiCreate.php` - Menambah reservasi baru.
    - `reservasiUpdate.php` - Memperbarui data reservasi.
    - `reservasiDelete.php` - Menghapus reservasi.
    - `reservasiDetail.php` - Melihat detail reservasi.

- `home.php` - Halaman utama aplikasi.
- `index.php` - Halaman utama untuk routing aplikasi.
