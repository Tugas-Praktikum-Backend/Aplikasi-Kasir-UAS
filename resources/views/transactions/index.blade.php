<h1>Daftar Transaksi</h1>

<a href="{{ route('transactions.create') }}">
    Tambah Transaksi Baru
</a>

<br><br>

@if(session('success')) <div style="color: green;">
{{ session('success') }} </div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Metode Pembayaran</th>
        </tr>
    </thead>

```
<tbody>
    @forelse($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->product->nama }}</td>
            <td>{{ $transaction->quantity }}</td>
            <td>
                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
            </td>
            <td>{{ $transaction->paymentMethod->method_name }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5">
                Belum ada transaksi.
            </td>
        </tr>
    @endforelse
</tbody>
```

</table>
