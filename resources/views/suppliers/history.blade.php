<head>
    <title>Riwayat Restock (Supplier)</title>
</head>
<h1>History Restock (Supplier)</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Tanggal</th>
        <th>Produk</th>
        <th>Klien</th>
        <th>Jumlah</th>
        <th>Modal</th>
    </tr>
    @forelse($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $supplier->product->nama ?? '-' }}</td>
            <td>{{ $supplier->client->nama ?? '-' }}</td>
            <td>{{ $supplier->jumlah }}</td>
            <td>Rp {{ number_format($supplier->modal) }}</td>
        </tr>
    @empty
        <tr><td colspan="5">Belum ada restock.</td></tr>
    @endforelse
</table>
<br>

<form action="{{ route('suppliers.index') }}" method="GET" style="display:inline;">
    <button type="submit">Kembali</button>
</form>