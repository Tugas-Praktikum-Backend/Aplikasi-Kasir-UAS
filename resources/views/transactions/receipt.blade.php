<h1>STRUK BELANJA</h1>

<hr>

<p>
    <strong>ID Transaksi:</strong>
    {{ $transaction->id }}
</p>

<p>
    <strong>Produk:</strong>
    {{ $transaction->product->nama }}
</p>

<p>
    <strong>Harga Satuan:</strong>
    Rp {{ number_format($transaction->product->harga,0,',','.') }}
</p>

<p>
    <strong>Jumlah:</strong>
    {{ $transaction->quantity }}
</p>

<p>
    <strong>Total Harga:</strong>
    Rp {{ number_format($transaction->total_price,0,',','.') }}
</p>

<p>
    <strong>Metode Pembayaran:</strong>
    {{ $transaction->paymentMethod->method_name }}
</p>

<hr>

<p>Terima kasih telah berbelanja.</p>

<a href="{{ route('transactions.index') }}">
    Kembali
</a>