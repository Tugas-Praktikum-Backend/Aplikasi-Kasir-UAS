<h1>Dashboard Customer</h1>
<button>Riwayat Transaksi</button>
<button>Beli item</button>
<button>Kembalikan item</button>
<a href="{{ route('customers.topup') }}">
    <button>Topup</button>
</a>
<a href="{{ route('customers.metode') }}">
    <button>Tambahkan metode pembayaran</button>
</a>
<form action="{{ route('customer.logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>