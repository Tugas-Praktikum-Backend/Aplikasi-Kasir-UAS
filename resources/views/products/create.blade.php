<h1>Tambah Produk Baru</h1>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="nama" required>
    </div>
    <br>
    <div>
        <label>Stock:</label><br>
        <input type="number" name="stock" required>
    </div>
    <br>
    <div>
        <label>Harga:</label><br>
        <input type="number" name="harga" required>
    </div>
    <br>
    <button type="submit">Simpan Produk</button>
    <a href="{{ route('products.index') }}">Batal</a>
</form>