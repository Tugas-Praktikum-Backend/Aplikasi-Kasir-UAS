<head>
    <title>Tambah Produk Baru</title>
</head>
<h1>Tambah Produk Baru</h1>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="nama" required>
    </div>
    <br>
    <div style="display: flex; align-items: center; gap: 10px;">
    <div>
        <label>Stock (KTN):</label><br>
        <input type="number" name="stock" required min="0" style="width: 80px;">
    </div>
    <div style="margin-top: 15px;">
        <strong> x </strong>
    </div>
    <div>
        <label>Isi (PC):</label><br>
        <input type="number" name="isipc" required min="1" style="width: 80px;">
    </div>
    </div>
    <br>
    <div>
        <label>Harga (per PC):</label><br>
        <input type="number" name="harga" required min="0">
    </div>
    <br>
    <div>
        <label>Merek:</label><br>
        <input type="text" name="merek" required>
    </div>
    <br>
    <div>
        <label>Kategori:</label><br>
        <select name="category_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nama }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit">Simpan Produk</button>
    </form> 
<form action="{{ route('inventory') }}" method="GET" style="margin-top: 10px;">
    <button type="submit">Batal</button>
</form>
