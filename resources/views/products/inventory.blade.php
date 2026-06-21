<h1>Inverntory</h1>

<a href="{{ route('products.index') }}">Kembali ke Product List</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
  <thead> 
    <tr> 
            <th>Inventory ID</th> 
            <th>Product ID</th>   
            <th>Merek</th>
            <th>Nama Produk</th>
            <th>Stock</th>
    </tr> 
  </thead> 
<tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->inventory->id ?? '-' }}</td>
                <td><strong>{{ $product->id }}</strong></td>
                <td>{{ $product->inventory->merek ?? '-' }}</td> 
                <td>{{ $product->nama }}</td>
                <td>{{ $product->inventory->stock ?? 0 }} KTN</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Inventory List is empty.</td>
            </tr>
        @endforelse
    </tbody>
</table>