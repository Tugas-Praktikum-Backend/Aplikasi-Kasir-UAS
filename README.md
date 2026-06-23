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

contoh output:

<img width="80" height="30" alt="Screenshot 2026-06-23 173245" src="https://github.com/user-attachments/assets/9cf466ac-8036-44f0-a19b-8cb9ba2556fe" />

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

<img width="174" height="32" alt="Screenshot 2026-06-24 020217" src="https://github.com/user-attachments/assets/60ca5e0e-ce1b-4a90-b2a9-6af90db9a14f" />

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

<img width="728" height="222" alt="Screenshot 2026-06-23 180206" src="https://github.com/user-attachments/assets/5e81883a-842c-4356-8f2b-8b28e1b96cce" />

--------------------------------------------------

### 6.2 Create Transaction
URL : http://127.0.0.1:8000/transactions/create

Penjelasan :
Halaman untuk mencatat dan membuat transaksi baru (selain dari halaman kasir utama).

Contoh Output :

<img width="168" height="24" alt="Screenshot 2026-06-23 180242" src="https://github.com/user-attachments/assets/780dbd0b-2563-4fdd-b689-cdca267fac1f" />

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

<img width="925" height="235" alt="Screenshot 2026-06-23 180331" src="https://github.com/user-attachments/assets/5c415abd-63e7-43e3-bbfd-5d2a4aeec442" />

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

<img width="161" height="32" alt="Screenshot 2026-06-23 180434" src="https://github.com/user-attachments/assets/9a0fb777-a33f-4638-99f0-260b802675e7" />

--------------------------------------------------
