<h1>Inventory</h1>

<table border="1" cellpadding="10" cellspacing="0"> 
  <thead> 
    <tr> 
            <th>Product ID</th>   
            <th>Merek</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stock</th>
            <th>PCS</th> 
            <th>Harga Per Karton</th> 
            <th>Harga Per PC</th>
            <th>Aksi</th>
    </tr> 
  </thead> 
<tbody>
        @forelse($products as $product)
            <tr>
                <td><strong>{{ $product->id }}</strong></td>
                <td>{{ $product->inventory->merek ?? '-' }}</td> 
                <td>{{ $product->nama }}</td>
                <td>{{ $product->category->nama ?? 'Tanpa Kategori' }}</td>
                <td>{{ $product->inventory->stock ?? 0 }} KTN</td>
                <td>{{ $product->inventory->isipc ?? 0 }} PC</td> 
                <td>Rp {{ number_format(($product->harga * ($product->inventory->isipc ?? 1)), 0, ',', '.') }}</td>
                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>
                <form action="{{ route('products.edit', $product->id) }}" method="GET" style="display:inline; margin-right: 5px;">
                    <button type="submit">Ubah</button>
                </form>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah anda ingin menghapus produk ini?')">Hapus</button>
                </form>
            </td>    
            </tr>
        @empty
            <tr>
                <td colspan="9">Inventory List is empty.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>
<form action="{{ route('products.create') }}" method="GET" style="display:inline; margin-right: 5px;">
    <button type="submit">Tambah Produk Baru</button>
</form>

<form action="{{ route('products.index') }}" method="GET" style="display:inline; margin-right: 5px;">
    <button type="submit">Kembali ke Product List</button>
</form>
