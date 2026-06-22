<h1>Dashboard Customer</h1>
<button>Riwayat Transaksi</button>
<br><br>
<button>Beli item</button>
<br><br>
<button>Kembalikan item</button>
<br><br>
<a href="{{ route('paymentmethods.index') }}">
    <button>Metode Pembayaran</button>
</a>
<br><br><br><br>
<form action="{{ route('customer.logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>
<br><br><br><br>
<p>ZONA BERBAHAYA</p>
<a href="{{ route('customers.changeusername') }}"><button>Edit username</button></a>
<a href="{{ route('customers.changepassword') }}"><button>Edit password</button></a>
<form action="{{ route('customers.destroy') }}" method="POST">
    @csrf @method('DELETE')
    <button type="submit">Hapus akun</button>
</form>