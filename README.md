# Aplikasi Kasir (POS System)

--------------------------------------------------

## Setup & Instalasi

Ikuti langkah-langkah berikut ini untuk menjalankan Aplikasi Kasir (POS System) di lingkungan lokal.

### 1. Instalasi Dependensi Node.js

Langkah pertama yang harus dilakukan adalah menginstal seluruh dependensi JavaScript yang dibutuhkan oleh aplikasi. Buka terminal Anda, lalu jalankan perintah berikut:

```bash
npm install

```

### 2. Migrasi dan Seeding Database

Setelah dependensi terinstal. Anda perlu memasuki data-data penting dengan proses seeding, agar sistem dapat langsung digunakan, seperti data product toko dan akun karyawan.

Jalankan perintah migrasi dan seeding berikut:

```bash
php artisan migrate --seed

```

### 3. Menjalankan Server Development

Terakhir, jalankan aplikasi agar dapat diakses melalui browser dengan menggunakan perintah berikut:

```bash
composer run dev

```

> **FAQ:**
> **Mengapa tidak menggunakan `php artisan serve`?**
> Aplikasi ini menggunakan implementasi JavaScript secara aktif. Jika hanya menjalankan `php artisan serve`, kompilasi aset JavaScript tidak akan berjalan, yang akan mengakibatkan aplikasi tidak berfungsi. Oleh karena itu, diwajibkan untuk menggunakan perintah `composer run dev`.

--------------------------------------------------

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

<img width="403" height="237" alt="Screenshot 2026-06-24 042758" src="https://github.com/user-attachments/assets/fd52a095-c308-41bb-9ca6-5679ad8b5fb4" />

--------------------------------------------------

### 1.3 Employees Logout
URL : http://127.0.0.1:8000/employees/logout

Penjelasan :
Keluar dari sistem.

Contoh Output :

<img width="80" height="30" alt="Screenshot 2026-06-23 173245" src="https://github.com/user-attachments/assets/9cf466ac-8036-44f0-a19b-8cb9ba2556fe" />

--------------------------------------------------

### 1.4 Shift
URL : http://127.0.0.1:8000/employees/shift

Penjelasan :
Halaman untuk melihat jadwal kerja atau pergantian shift harian dan mingguan karyawan.

Contoh Output :

<img width="277" height="325" alt="Screenshot 2026-06-24 031443" src="https://github.com/user-attachments/assets/4ffcd083-982a-497a-b5ff-a1a08352e551" />

--------------------------------------------------

### 1.5 Salary Information
URL : http://127.0.0.1:8000/employees/salary

Penjelasan :
Halaman untuk melihat informasi rincian gaji, riwayat pembayaran, dan slip gaji karyawan.

Contoh Output :

<img width="1062" height="353" alt="Screenshot 2026-06-24 031456" src="https://github.com/user-attachments/assets/1240959a-e7f2-46a0-96e6-e37b1a2fcae5" />

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

Contoh Output :

<img width="446" height="319" alt="Screenshot 2026-06-23 173827" src="https://github.com/user-attachments/assets/585163ce-30df-4023-b08b-e0d1efa502c6" />

--------------------------------------------------

### 2.3 Add Product
URL : http://127.0.0.1:8000/cashier/create/add

Penjelasan :
Menambahkan produk ke transaksi.

Contoh Output :

<img width="516" height="130" alt="Screenshot 2026-06-23 174240" src="https://github.com/user-attachments/assets/c8b08150-5696-4034-8759-93d4dca01e01" />




<img width="137" height="28" alt="Screenshot 2026-06-23 174042" src="https://github.com/user-attachments/assets/5da4d8b5-441f-42d8-8b27-b88b8dff9bd3" />


--------------------------------------------------

### 2.4 Delete Product
URL : http://127.0.0.1:8000/cashier/create/delete

Penjelasan :
Menghapus produk dari transaksi.

Contoh Output :

<img width="471" height="78" alt="Screenshot 2026-06-23 174358" src="https://github.com/user-attachments/assets/d32d150d-a86d-407f-8e00-447125306b75" />




<img width="126" height="28" alt="Screenshot 2026-06-23 174315" src="https://github.com/user-attachments/assets/04b71487-61be-4b84-a3e8-a72283d9df6a" />


--------------------------------------------------

### 2.5 Process Transaction
URL : http://127.0.0.1:8000/cashier/create/process

Penjelasan :
Memproses pembayaran.

Contoh Output :

<img width="418" height="26" alt="Screenshot 2026-06-24 020231" src="https://github.com/user-attachments/assets/3425888b-23a1-4d4b-be5b-11a36d329875" />

--------------------------------------------------

## 3. Inventory

### 3.1 Inventory
URL : http://127.0.0.1:8000/inventory

Penjelasan :
Menampilkan data inventaris.

Contoh Output :

<img width="1603" height="868" alt="Screenshot 2026-06-23 175347" src="https://github.com/user-attachments/assets/5f068296-b9e5-4789-9891-4b5c724b73d8" />

--------------------------------------------------

## 4. Products

### 4.1 Product List
URL : http://127.0.0.1:8000/products

Penjelasan :
Menampilkan daftar seluruh produk yang tersedia di sistem.

Contoh Output :

<img width="885" height="820" alt="Screenshot 2026-06-23 175440" src="https://github.com/user-attachments/assets/f65e6273-91a4-4b67-8f51-962c418c9250" />

--------------------------------------------------

### 4.2 Create Product
URL : http://127.0.0.1:8000/products/create

Penjelasan :
Halaman form untuk menambahkan data produk baru ke dalam sistem.

Contoh Output :

<img width="381" height="506" alt="Screenshot 2026-06-23 175524" src="https://github.com/user-attachments/assets/64e4efd9-45bf-413d-acd2-c0d0c73721e7" />

--------------------------------------------------

### 4.3 Edit Product
URL : http://127.0.0.1:8000/products/{product}/edit

Penjelasan :
Halaman form untuk mengubah atau memperbarui data produk yang sudah ada.

Contoh Output :

<img width="265" height="506" alt="Screenshot 2026-06-23 175656" src="https://github.com/user-attachments/assets/5e1cbd14-f880-41e9-9470-6e89f5eb0d29" />

--------------------------------------------------

## 5. Customers

### 5.1 Customer Login
URL : http://127.0.0.1:8000/customers/login

Penjelasan :
Halaman login khusus untuk pelanggan.

Contoh Output :

<img width="299" height="294" alt="Screenshot 2026-06-24 024851" src="https://github.com/user-attachments/assets/903f2867-a7c0-446a-ae29-23e4bcd0999d" />

--------------------------------------------------

### 5.2 Customer Signup
URL : http://127.0.0.1:8000/customers/signup

Penjelasan :
Halaman pendaftaran akun untuk pelanggan baru.

Contoh Output :

<img width="331" height="365" alt="Screenshot 2026-06-24 024917" src="https://github.com/user-attachments/assets/d42909d1-bc59-46ab-aaf9-33d99d96d38b" />

--------------------------------------------------

### 5.3 Customer Dashboard
URL : http://127.0.0.1:8000/customers/dashboard

Penjelasan :
Dashboard utama untuk pelanggan setelah berhasil login.

Contoh Output :

<img width="396" height="436" alt="Screenshot 2026-06-24 024937" src="https://github.com/user-attachments/assets/a38333d0-ba75-410a-b800-b9b5bcfd5099" />


--------------------------------------------------

## 6. Transactions

### 6.1 Transaction List
URL : http://127.0.0.1:8000/transactions

Penjelasan :
Menampilkan daftar seluruh transaksi yang telah terjadi di dalam sistem.

Contoh Output :

<img width="728" height="222" alt="Screenshot 2026-06-23 180206" src="https://github.com/user-attachments/assets/5e81883a-842c-4356-8f2b-8b28e1b96cce" />

--------------------------------------------------

### 6.2 Create Transaction
URL : http://127.0.0.1:8000/transactions/create

Penjelasan :
Halaman untuk mencatat dan membuat transaksi baru.

Contoh Output :

<img width="168" height="24" alt="Screenshot 2026-06-23 180242" src="https://github.com/user-attachments/assets/780dbd0b-2563-4fdd-b689-cdca267fac1f" />

--------------------------------------------------

### 6.3 Transaction Bill
URL : http://127.0.0.1:8000/transactions/{id}/bill

Penjelasan :
Menampilkan tagihan atau struk dari transaksi tertentu.

Contoh Output :

<img width="744" height="181" alt="Screenshot 2026-06-24 054432" src="https://github.com/user-attachments/assets/e025fa29-5b78-468d-aa53-eb6e1abe6b98" />

--------------------------------------------------

### 6.4 Transaction Payment
URL : http://127.0.0.1:8000/transactions/{id}/pay

Penjelasan :
Halaman untuk memproses pembayaran dari sebuah transaksi yang belum lunas.

Contoh Output :

<img width="662" height="458" alt="Screenshot 2026-06-24 025208" src="https://github.com/user-attachments/assets/ca0c86c1-eb9e-4174-9c5d-39f623ee4743" />

--------------------------------------------------

### 6.5 Payment Methods
URL : http://127.0.0.1:8000/customers/paymentmethods

Penjelasan :
Halaman untuk menampilkan dan mengelola pilihan metode pembayaran yang disimpan oleh pelanggan.

Contoh Output :

<img width="467" height="222" alt="Screenshot 2026-06-24 030143" src="https://github.com/user-attachments/assets/df94820e-9eea-44a8-ac4e-1206e7983be3" />

--------------------------------------------------

### 6.6 Create Payment Methods
URL : http://127.0.0.1:8000/customers/paymentmethods/create

Penjelasan :
Halaman form bagi pelanggan untuk menambahkan atau mendaftarkan metode pembayaran baru ke dalam akun mereka.

Contoh Output :

<img width="511" height="244" alt="Screenshot 2026-06-24 030412" src="https://github.com/user-attachments/assets/49d818de-bfd8-4fae-82c2-97e7d19ce36f" />

--------------------------------------------------

## 7. Managers

### 7.1 Manager Dashboard
URL : http://127.0.0.1:8000/managers/dashboard

Penjelasan :
Dashboard utama untuk manajer yang berisi ringkasan bisnis, laporan, dan analitik.

Contoh Output :

<img width="474" height="242" alt="Screenshot 2026-06-24 051330" src="https://github.com/user-attachments/assets/33714f9f-6dfa-4591-90e1-83fa4aca5acf" />

--------------------------------------------------

### 7.2 Manage Employees
URL : http://127.0.0.1:8000/managers/manageemployees

Penjelasan :
Halaman untuk melihat dan mengelola data seluruh karyawan.

Contoh Output :

<img width="923" height="354" alt="Screenshot 2026-06-23 180411" src="https://github.com/user-attachments/assets/0fb197cd-f2f8-4fe0-a5b7-8ccf68789fdb" />

--------------------------------------------------

### 7.3 Add Employee
URL : http://127.0.0.1:8000/managers/addemployees

Penjelasan :
Halaman form untuk mendaftarkan akun karyawan baru ke dalam sistem.

Contoh Output :

<img width="358" height="401" alt="Screenshot 2026-06-24 051411" src="https://github.com/user-attachments/assets/edc6132b-98b7-48c6-9b68-878be41964c9" />

--------------------------------------------------

### 7.4 Manage Payment Methods

URL : http://127.0.0.1:8000/managers/managepaymentmethod

Penjelasan :
Halaman bagi manajer untuk melihat dan mengelola daftar seluruh metode pembayaran yang tersedia atau dapat digunakan oleh pelanggan di dalam sistem.

Contoh Output :

<img width="785" height="320" alt="Screenshot 2026-06-24 051501" src="https://github.com/user-attachments/assets/6366ddaf-020a-4eea-9591-2262c7c233f7" />

--------------------------------------------------

### 7.5 Add Payment Method

URL : http://127.0.0.1:8000/managers/addpaymentmethod

Penjelasan :
Halaman form bagi manajer untuk mendaftarkan atau menambahkan jenis metode pembayaran baru ke dalam sistem.

Contoh Output :

<img width="507" height="301" alt="Screenshot 2026-06-24 052020" src="https://github.com/user-attachments/assets/0939dd12-5670-426d-a306-f79485523af2" />

--------------------------------------------------

### 7.6 Edit Admin Fee

URL : http://127.0.0.1:8000/managers/editadminfee/{paymentmethod}

Penjelasan :
Halaman form bagi manajer untuk mengatur atau mengubah besaran biaya admin pada metode pembayaran tertentu.

Contoh Output :

<img width="410" height="203" alt="Screenshot 2026-06-24 052028" src="https://github.com/user-attachments/assets/2a2ee970-25a4-48b6-80e1-ef3f583b9375" />

--------------------------------------------------

### 7.7 Delete Payment Method

URL : http://127.0.0.1:8000/managers/deletepaymentmethod/{paymentmethod}

Penjelasan :
Endpoint atau aksi untuk menghapus sebuah metode pembayaran dari sistem agar tidak bisa lagi digunakan oleh pelanggan untuk bertransaksi.

Contoh Output :

<img width="69" height="30" alt="Screenshot 2026-06-24 052218" src="https://github.com/user-attachments/assets/0bb92d40-aae7-4fa1-88e9-d6db7145994b" />

--------------------------------------------------

### 7.8 Add Investment

URL : http://127.0.0.1:8000/managers/addinvestment

Penjelasan :
Halaman form bagi manajer untuk mencatat penambahan modal atau dana investasi baru ke dalam arus kas bisnis.

Contoh Output :

<img width="352" height="203" alt="Screenshot 2026-06-24 052444" src="https://github.com/user-attachments/assets/d5fe05c0-a9ad-4ad2-b41a-39c68e25870b" />

--------------------------------------------------


## 8. Discounts

### 8.1 Discount List

URL : http://127.0.0.1:8000/discounts

Penjelasan :
Menampilkan daftar seluruh diskon, promo, atau *voucher* yang tersedia di dalam sistem, baik yang sedang aktif maupun tidak aktif.

Contoh Output :

<img width="240" height="147" alt="Screenshot 2026-06-24 032058" src="https://github.com/user-attachments/assets/6560a9c6-2895-46f5-bf48-7a9ae14abc31" />

--------------------------------------------------

### 8.2 Create Discount

URL : http://127.0.0.1:8000/discounts/create

Penjelasan :
Halaman form untuk membuat dan mengatur program diskon atau promo baru untuk pelanggan.

Contoh Output :

<img width="357" height="500" alt="Screenshot 2026-06-24 032111" src="https://github.com/user-attachments/assets/e27f2470-3225-4b92-8697-ad880003c00d" />

--------------------------------------------------

### 8.3 Delete Discount

URL : http://127.0.0.1:8000/discounts/delete

Penjelasan :
Endpoint atau aksi untuk menghapus data program diskon atau promo secara permanen dari dalam sistem.

Contoh Output :

<img width="287" height="193" alt="Screenshot 2026-06-24 050947" src="https://github.com/user-attachments/assets/1abe5199-e5c5-4e25-ba35-46faa0582fe8" />

--------------------------------------------------

## 9. Category

### 9.1 Category List

URL : http://127.0.0.1:8000/categories

Penjelasan :
Menampilkan daftar seluruh kategori produk yang tersedia di dalam sistem untuk memudahkan pengelompokan barang.

Contoh Output :

<img width="621" height="414" alt="Screenshot 2026-06-24 033454" src="https://github.com/user-attachments/assets/7b49cf79-bc43-4976-a17f-16cc1aab009c" />

--------------------------------------------------

### 9.2 Create Category

URL : http://127.0.0.1:8000/categories/create

Penjelasan :
Halaman form untuk membuat dan menambahkan kategori produk baru ke dalam sistem.

Contoh Output :

<img width="409" height="178" alt="Screenshot 2026-06-24 033501" src="https://github.com/user-attachments/assets/ba4bc7bc-7287-4f3a-afe5-f0be071b161f" />

--------------------------------------------------

## 10. Suppliers

### 10.1 Supplier List

URL : http://127.0.0.1:8000/suppliers

Penjelasan :
Menampilkan daftar seluruh pemasok yang bekerja sama untuk menyediakan barang atau stok ke dalam inventaris.

Contoh Output :

<img width="1262" height="477" alt="Screenshot 2026-06-24 044158" src="https://github.com/user-attachments/assets/e6a06dc8-fd48-4109-9d42-4087381cf266" />

--------------------------------------------------

### 10.2 Restock

URL : http://127.0.0.1:8000/suppliers/create

Penjelasan :
Halaman form untuk mencatat transaksi pembelian barang atau penambahan stok dari supplier ke dalam inventaris toko.


Contoh Output :

<img width="320" height="442" alt="Screenshot 2026-06-24 044304" src="https://github.com/user-attachments/assets/6cc3c20a-452f-4ad0-a2e8-2c7e27ad5cfd" />

--------------------------------------------------

### 10.3 Restock History

URL : http://127.0.0.1:8000/suppliers/history

Penjelasan :
Menampilkan riwayat transaksi pembelian barang atau pasokan stok yang pernah dilakukan dari supplier.

Contoh Output :

<img width="471" height="231" alt="Screenshot 2026-06-24 045022" src="https://github.com/user-attachments/assets/6190da26-ddf4-4801-8cee-fd5d8ea3eb7c" />

--------------------------------------------------

### 10.4 Clients List

URL : http://127.0.0.1:8000/clients

Penjelasan :
Menampilkan daftar klien atau mitra bisnis yang terdaftar di dalam sistem.

Contoh Output :

<img width="1260" height="410" alt="Screenshot 2026-06-24 045110" src="https://github.com/user-attachments/assets/f5a18208-c4ca-4f15-b265-9b9f940de42e" />

--------------------------------------------------

### 10.5 Create Client

URL : http://127.0.0.1:8000/clients/create

Penjelasan :
Halaman form untuk mendaftarkan dan menambahkan data klien atau mitra bisnis baru ke dalam sistem.

Contoh Output :

<img width="678" height="609" alt="Screenshot 2026-06-24 045222" src="https://github.com/user-attachments/assets/6a230b06-e3a2-4f7e-8da0-dbeadb3aa831" />

--------------------------------------------------


