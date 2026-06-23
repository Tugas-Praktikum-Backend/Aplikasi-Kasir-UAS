<h1>Struk Belanja</h1>

<p><strong>ID Transaksi:</strong> {{ $receipt->id }}</p>
<p><strong>Produk:</strong> {{ $receipt->product->nama ?? '-' }}</p>
<p><strong>Harga Satuan:</strong> Rp {{ number_format($receipt->product->harga ?? 0, 0, ',', '.') }}</p>
<p><strong>Jumlah:</strong> {{ $receipt->quantity }}</p>
<p><strong>Metode Pembayaran:</strong> {{ $receipt->paymentMethod->method_name ?? '-' }}</p>
<p><strong>Total Harga:</strong> Rp {{ number_format($receipt->total_price, 0, ',', '.') }}</p>

<<<<<<< HEAD
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
    Rp {{ number_format($transaction->product->harga, 0, ',', '.') }}
</p>

<p>
    <strong>Jumlah:</strong>
    {{ $transaction->quantity }}
</p>

<p>
    <strong>Total Harga:</strong>
    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
</p>

<p>
    <strong>Metode Pembayaran:</strong>
    {{ $transaction->paymentMethod->method_name }}
</p>

<hr>

<p>Terima kasih telah berbelanja.</p>

<button onclick="window.print()">
    Cetak Struk
</button>

<br><br>

<a href="{{ route('transactions.index') }}">
    Kembali
</a>
=======
<br>
<a href="{{ route('transactions.index') }}">Kembali ke daftar transaksi</a>
>>>>>>> 458eac1c21e0881c399a80f4e3d10bd30c44cb62
