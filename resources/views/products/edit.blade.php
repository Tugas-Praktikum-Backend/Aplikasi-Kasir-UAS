<h1>Ubah Produk</h1> 
<form method="POST" action="{{ route('products.update', $product) }}"> 
    @csrf @method('PUT') 
    Nama Produk: 
    <br> 
    <input type="text" name="nama" value="{{ $product->nama }}" required> 
    <br> 
    <br> 
    Stock: 
    <br> 
    <input type="number" name="stock" value="{{ $product->stock }}" required> 
    <br> 
    <br> 
    Harga: 
    <br> 
    <input type="number" name="harga" value="{{ $product->harga }}" required> 
    <br> 
    <br> 
    <button type="submit">Simpan</button> 
</form>