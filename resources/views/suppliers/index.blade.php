<head>
    <title>Supplier</title>
</head>
<h1>Supplier</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Nama Klien</th>
        <th>Produk yang Tersedia</th>
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
        </tr>
    @empty
        <tr><td colspan="2">Belum ada klien.</td></tr>
    @endforelse
</table>
<br>

<form action="{{ route('suppliers.create') }}" method="GET" style="display:inline; margin-right:5px;">
    <button type="submit">Beli Produk</button>
</form>

<form action="{{ route('suppliers.history') }}" method="GET" style="display:inline; margin-right:5px;">
    <button type="submit">History Pembelian</button>
</form>

<form action="{{ route('clients.index') }}" method="GET" style="display:inline; margin-right:5px;">
    <button type="submit">Kelola Klien</button>
</form>
<p><strong>Modal toko:</strong> Rp {{ number_format($market->modal_toko ?? 0) }}</p>

<a href={{ route('employees.index') }}><button>Balik</button></a>