<h1>Tambah Transaksi</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <label>Produk</label>
    <br>
    <select name="product_id" required>
        <option value="">-- Pilih Produk --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">
                {{ $product->nama }} - Rp {{ number_format($product->harga, 0, ',', '.') }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Jumlah Barang</label>
    <br>
    <input type="number" name="quantity" min="1" required>

    <br><br>

    <button type="submit">Buat Tagihan</button>
</form>

<br>

<a href="{{ route('transactions.index') }}">
    Kembali ke Daftar Transaksi
</a>