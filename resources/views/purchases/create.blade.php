<h1>Tambah Pembelian Barang</h1>
<form method="POST" action="{{ route('purchases.store') }}">
    @csrf
    <div>
        <label>Produk:</label><br>
        <select name="product_id" required>
            <option value="">-- Pilih Produk --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->nama }}</option>
            @endforeach
        </select>
    </div>
    <br>

    Jumlah Barang:
    <br>
    <input type="number" name="jumlah" required>
    <br>
    <br>

    Total Harga:
    <br>
    <input type="number" name="harga" required>
    <br>
    <br>

    <button type="submit">Simpan Pembelian</button>
    <a href="{{ route('purchases.index') }}">Batal</a>
</form>