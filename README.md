# Aplikasi Kasir (POS System)

## 1. Employees

### 1.1 Employees Login
URL : http://127.0.0.1:8000/employees/login

Penjelasan :
Halaman login untuk karyawan.

Contoh Output :

<img width="403" height="274" alt="Screenshot 2026-06-23 172829" src="https://github.com/user-attachments/assets/a806757a-49a1-477d-8e42-131e9b09ef21" />

--------------------------------------------------

### 1.2 Employees Dashboard
URL : http://127.0.0.1:8000/employees

Penjelasan :
Dashboard utama karyawan.

Contoh Output :
<img width="947" height="264" alt="Screenshot 2026-06-23 172618" src="https://github.com/user-attachments/assets/b00ba507-c9eb-40bc-87a7-38afdddc1e73" />

--------------------------------------------------

### 1.3 Employees Logout
URL : http://127.0.0.1:8000/employees/logout

Penjelasan :
Keluar dari sistem.

--------------------------------------------------

## 2. Cashier

### 2.1 Cashier
URL : http://127.0.0.1:8000/cashier

Penjelasan :
Halaman utama kasir.

Contoh Output :
<img width="327" height="198" alt="Screenshot 2026-06-23 173357" src="https://github.com/user-attachments/assets/e8132f2e-f081-470f-a4f8-066310fb83b6" />

--------------------------------------------------

### 2.2 Create Transaction
URL : http://127.0.0.1:8000/cashier/create

Penjelasan :
Membuat transaksi baru.

--------------------------------------------------

### 2.3 Add Product
URL : http://127.0.0.1:8000/cashier/create/add

Penjelasan :
Menambahkan produk ke transaksi.

--------------------------------------------------

### 2.4 Delete Product
URL : http://127.0.0.1:8000/cashier/create/delete

Penjelasan :
Menghapus produk dari transaksi.

--------------------------------------------------

### 2.5 Process Transaction
URL : http://127.0.0.1:8000/cashier/create/process

Penjelasan :
Memproses pembayaran.

--------------------------------------------------

## 3. Inventory

### 3.1 Inventory
URL : http://127.0.0.1:8000/inventory

Penjelasan :
Menampilkan data inventaris.

--------------------------------------------------

## 4. Products

### 4.1 Product List
URL : http://127.0.0.1:8000/products

Penjelasan :
Menampilkan daftar seluruh produk yang tersedia di sistem.

Contoh Output :
Tabel berisi nama produk, harga, jumlah stok, dan kategori.

--------------------------------------------------

### 4.2 Create Product
URL : http://127.0.0.1:8000/products/create

Penjelasan :
Halaman form untuk menambahkan data produk baru ke dalam sistem.

Contoh Output :
Form input untuk nama produk, harga, stok awal, dan deskripsi produk.

--------------------------------------------------

### 4.3 Product Detail
URL : http://127.0.0.1:8000/products/{product}

Penjelasan :
Menampilkan informasi detail dari satu produk spesifik.

Contoh Output :
Halaman detail berisi foto produk, deskripsi lengkap, harga, dan riwayat stok.

--------------------------------------------------

### 4.4 Edit Product
URL : http://127.0.0.1:8000/products/{product}/edit

Penjelasan :
Halaman form untuk mengubah atau memperbarui data produk yang sudah ada.

Contoh Output :
Form input yang sudah terisi dengan data produk saat ini untuk diedit dan disimpan.

--------------------------------------------------

## 5. Customers

### 5.1 Customer Login
URL : http://127.0.0.1:8000/customers/login

Penjelasan :
Halaman login khusus untuk pelanggan (customer).

Contoh Output :
Form login pelanggan berisi input email/username dan password.

--------------------------------------------------

### 5.2 Customer Signup
URL : http://127.0.0.1:8000/customers/signup

Penjelasan :
Halaman pendaftaran (registrasi) akun untuk pelanggan baru.

Contoh Output :
Form pendaftaran berisi input nama lengkap, email, password, dan nomor telepon.

--------------------------------------------------

### 5.3 Customer Dashboard
URL : http://127.0.0.1:8000/customers/dashboard

Penjelasan :
Dashboard utama untuk pelanggan setelah berhasil login.

Contoh Output :
Ringkasan profil pelanggan, poin loyalitas (jika ada), dan riwayat pembelian terakhir.

--------------------------------------------------

## 6. Transactions

### 6.1 Transaction List
URL : http://127.0.0.1:8000/transactions

Penjelasan :
Menampilkan daftar seluruh transaksi yang telah terjadi di dalam sistem.

Contoh Output :
Tabel riwayat transaksi beserta ID transaksi, tanggal, nama kasir, dan total harga.

--------------------------------------------------

### 6.2 Create Transaction
URL : http://127.0.0.1:8000/transactions/create

Penjelasan :
Halaman untuk mencatat dan membuat transaksi baru (selain dari halaman kasir utama).

Contoh Output :
Form pembuatan transaksi atau antarmuka Point of Sale (POS).

--------------------------------------------------

### 6.3 Transaction Bill
URL : http://127.0.0.1:8000/transactions/{id}/bill

Penjelasan :
Menampilkan tagihan atau struk (invoice) dari transaksi tertentu.

Contoh Output :
Halaman cetak struk/invoice dengan rincian produk yang dibeli, pajak, dan total tagihan.

--------------------------------------------------

### 6.4 Transaction Payment
URL : http://127.0.0.1:8000/transactions/{id}/pay

Penjelasan :
Halaman untuk memproses pembayaran dari sebuah transaksi yang belum lunas.

Contoh Output :
Pilihan metode pembayaran (tunai/kartu/e-wallet) dan form konfirmasi nominal uang yang dibayarkan.

--------------------------------------------------

## 7. Managers

### 7.1 Manager Dashboard
URL : http://127.0.0.1:8000/managers/dashboard

Penjelasan :
Dashboard utama untuk manajer yang berisi ringkasan bisnis, laporan, dan analitik.

Contoh Output :
Grafik pendapatan bulanan, ringkasan produk terlaris, dan performa kasir.

--------------------------------------------------

### 7.2 Manage Employees
URL : http://127.0.0.1:8000/managers/manageemployees

Penjelasan :
Halaman untuk melihat dan mengelola data seluruh karyawan.

Contoh Output :
Tabel daftar karyawan beserta informasi kontak, jabatan, dan status keaktifan.

--------------------------------------------------

### 7.3 Add Employee
URL : http://127.0.0.1:8000/managers/addemployees

Penjelasan :
Halaman form untuk mendaftarkan akun karyawan baru ke dalam sistem.

Contoh Output :
Form pengisian data diri karyawan, penentuan posisi/role (kasir/admin), dan pengaturan kredensial login.

--------------------------------------------------
