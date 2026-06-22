<h1>Daftar Restock (Supplier)</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('suppliers.create') }}">Restock Produk</a>
<br><br>
<table border="1" cellpadding="8">
    <tr>
        <th>Tanggal</th>
        <th>Produk</th>
        <th>Klien</th>
        <th>Jumlah</th>
        <th>Modal</th>
        <th>Harga</th>
    </tr>
    @forelse($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $supplier->product->nama ?? '-' }}</td>
            <td>{{ $supplier->client->nama ?? '-' }}</td>
            <td>{{ $supplier->jumlah }}</td>
            <td>Rp {{ number_format($supplier->modal) }}</td>
            <td>Rp {{ number_format($supplier->harga) }}</td>
        </tr>
    @empty
        <tr><td colspan="6">Belum ada restock.</td></tr>
    @endforelse
</table>