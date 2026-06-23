<head>
    <title>Tambah Klien</title>
</head>
<h1>Tambah Klien</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <p>Nama Klien:<br><input type="text" name="nama" value="{{ old('nama') }}"></p>

    <p>Produk yang bisa disupply:</p>
    @forelse($products as $product)
        <label style="display:block">
            <input type="checkbox" name="products[]" value="{{ $product->id }}"
                @if(in_array($product->id, old('products', []))) checked @endif>
            {{ $product->nama }}
            — Harga: <input type="number" name="harga[{{ $product->id }}]" value="{{ old('harga.'.$product->id) }}" min="0">
        </label>
    @empty
        <p><em>Belum ada produk. Tambah produk dulu.</em></p>
    @endforelse

    <br>
    <button type="submit">Simpan</button>
    <a href="{{ route('clients.index') }}">Batal</a>
</form>