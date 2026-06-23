<head>
    <title>Ubah Produk</title>
</head>
<h1>Ubah Produk</h1> 
<form method="POST" action="{{ route('products.update', $product) }}"> 
    @csrf @method('PUT') 
    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="nama" value="{{ $product->nama }}" required>
    </div>
    <br>
    <div style="display: flex; align-items: center; gap: 10px;">
        <div>
            <label>Stock (KTN):</label><br>
            <input type="number" name="stock" value="{{ $product->inventory->stock ?? 0 }}" required min="0" style="width: 80px;">
        </div>
        <div style="margin-top: 15px;">
            <strong> x </strong>
        </div>
        <div>
            <label>Isi (PC):</label><br>
            <input type="number" name="isipc" value="{{ $product->inventory->isipc ?? 1 }}" required min="1" style="width: 80px;">
        </div>
    </div>
    <br>
    <div>
        <label>Harga (per PC):</label><br>
        <input type="number" name="harga" value="{{ $product->harga }}" required min="0">
    </div>
    <br>
    <div>
        <label>Merek:</label><br>
        <input type="text" name="merek" value="{{ $product->inventory->merek ?? '' }}" required>
    </div>
    <br>
    <div>
        <label>Kategori:</label><br>
        <select name="category_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit">Simpan Produk</button>
</form> 
<form action="{{ route('inventory') }}" method="GET" style="margin-top: 10px;">
    <button type="submit">Batal</button>
</form>