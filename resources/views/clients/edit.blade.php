<head>
    <title>Edit Klien</title>
</head>
<h1>Edit Klien</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nama Klien:<br><input type="text" name="nama" value="{{ old('nama', $client->nama) }}"></p>

    <p>Produk yang bisa disupply:</p>
    @php
        $hargaMap = $client->products->pluck('pivot.harga', 'id');
    @endphp

    @forelse($products as $product)
        <label style="display:block">
            <input type="checkbox" name="products[]" value="{{ $product->id }}"
                @if(in_array($product->id, old('products', $client->products->pluck('id')->toArray()))) checked @endif>
            {{ $product->nama }}
            — Harga: <input type="number" name="harga[{{ $product->id }}]" value="{{ old('harga.'.$product->id, $hargaMap[$product->id] ?? '') }}" min="0">
        </label>
    @empty
        <p><em>Belum ada produk.</em></p>
    @endforelse

    <br>
    <button type="submit">Update</button>
    <a href="{{ route('clients.index') }}">Batal</a>
</form>