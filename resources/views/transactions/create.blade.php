<h1>Tambah Transaksi</h1>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

```
<label>Produk</label>
<br>

<select name="product_id" required>
    @foreach($products as $product)
        <option value="{{ $product->id }}">
            {{ $product->nama }}
            - Rp {{ number_format($product->harga, 0, ',', '.') }}
        </option>
    @endforeach
</select>

<br><br>

<label>Jumlah Barang</label>
<br>

<input
    type="number"
    name="quantity"
    min="1"
    required
>

<br><br>

<label>Metode Pembayaran</label>
<br>

<select name="payment_method_id" required>
    @foreach($paymentMethods as $method)
        <option value="{{ $method->id }}">
            {{ $method->method_name }}
        </option>
    @endforeach
</select>

<br><br>

<button type="submit">
    Simpan Transaksi
</button>
```

</form>

<br>

<a href="{{ route('transactions.index') }}">
    Kembali ke Daftar Transaksi
</a>
