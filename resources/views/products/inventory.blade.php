<h1>Inventory</h1>

<form action="{{ route('products.index') }}" method="GET" style="display:inline; margin-right: 5px;">
    <button type="submit">Kembali ke Product List</button>
</form>
<br><br>


<table border="1" cellpadding="10" cellspacing="0"> 
  <thead> 
    <tr> 
            <th>Product ID</th>   
            <th>Merek</th>
            <th>Nama Produk</th>
            <th>Kategori</th>>
            <th>Stock</th>
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
            </tr>
        @empty
            <tr>
                <td colspan="5">Inventory List is empty.</td>
            </tr>
        @endforelse
    </tbody>
</table>