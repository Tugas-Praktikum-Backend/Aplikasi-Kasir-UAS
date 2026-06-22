<h1>Riwayat Pembelian (Supplier)</h1>

<a href="{{ route('purchases.create') }}">Catat Pembelian Baru</a>
<br><br>

<a href="{{ route('employees.index') }}">Kembali ke Employee</a>
<br><br>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
        <th>Purchase ID</th>
        <th>Nama Produk</th>
        <th>Jumlah Barang</th>
        <th>Total Harga</th>
        <th>Tanggal Catat</th>
    </tr>
  </thead>
  <tbody>
    @forelse($purchases as $purchase)
        <tr>
            <td><strong>{{ $purchase->id }}</strong></td>
            <td>{{ $purchase->product ? $purchase->product->nama : 'Produk telah dihapus' }}</td>
            <td>{{ $purchase->jumlah }}</td>
            <td>Rp {{ number_format($purchase->harga, 0, ',', '.') }}</td>
            <td>{{ $purchase->created_at->format('d-m-Y H:i') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum ada riwayat pembelian.</td>
        </tr>
    @endforelse
  </tbody>
</table>