<h1>Kategori: {{ $category->nama }}</h1>

<a href="{{ route('categories.index') }}">← Kembali ke Daftar Kategori</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
        <th>ID Produk</th>
        <th>Nama Produk</th>
        <th>Harga</th>
    </tr>
  </thead>
  <tbody>
    @forelse($category->products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nama }}</td>
            <td>Rp {{ $product->harga }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Belum ada produk di kategori ini.</td>
        </tr>
    @endforelse
  </tbody>
</table>