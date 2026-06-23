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
    </tr> 
  </thead> 
<tbody>
        @forelse($products as $product)
            <tr>
                <td><strong>{{ $product->id }}</strong></td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->category->nama ?? 'Tanpa Kategori' }}</td>
                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Product List is empty.</td>
            </tr>
        @endforelse
    </tbody>
</table>