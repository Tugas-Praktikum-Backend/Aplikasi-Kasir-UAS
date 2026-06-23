<h1>Daftar Klien</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif


<table border="1" cellpadding="8">
    <tr>
        <th>Nama Klien</th>
        <th>Produk yang Tersedia</th>
        <th>Aksi</th>
    </tr>
    @forelse($clients as $client)
        <tr>
            <td>{{ $client->nama }}</td>
            <td>
                @forelse($client->products as $product)
                    {{ $product->nama }} (Rp {{ number_format($product->pivot->harga) }})@if(!$loop->last), @endif
                @empty
                    <em>Belum ada</em>
                @endforelse
            </td>
            <td>
                <form action="{{ route('clients.edit', $client->id) }}" method="GET" style="display:inline; margin-right: 5px;">
                    <button type="submit">Ubah</button>
                </form>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus klien ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="3">Belum ada klien.</td></tr>
    @endforelse
</table>
<br>

<form action="{{ route('clients.create') }}" method="GET" style="display:inline; margin-right: 5px;">
    <button type="submit">Tambah Klien Baru</button>
</form>

<form action="{{ route('suppliers.index') }}" method="GET" style="display:inline; margin-right:5px;">
    <button type="submit">Supplier</button>
</form>