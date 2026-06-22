<h1>Produk List</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0"> 
  <thead> 
    <tr> 
            <th>Product ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
    </tr> 
  </thead> 
<tbody>
        @forelse($products as $product)
            <tr>
                <td><strong>{{ $product->id }}</strong></td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->category->nama ?? 'Tanpa Kategori' }}</td>
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
                <td colspan="5">Product List is empty.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>
<form action="{{ route('products.create') }}" method="GET" style="display:inline; margin-right: 5px;">
    <button type="submit">Tambah Produk Baru</button>
</form>

<form action="{{ route('inventory') }}" method="GET" style="display:inline; margin-right: 5px;">
    <button type="submit">Inventory</button>
</form>