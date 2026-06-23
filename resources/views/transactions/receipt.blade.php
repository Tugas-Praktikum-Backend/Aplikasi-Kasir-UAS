<h1>Struk Belanja</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<p><strong>ID Transaksi:</strong> {{ $receipt->id }}</p>
<p><strong>Produk:</strong> {{ $receipt->product->nama ?? '-' }}</p>
<p><strong>Harga Satuan:</strong> Rp {{ number_format($receipt->product->harga ?? 0, 0, ',', '.') }}</p>
<p><strong>Jumlah:</strong> {{ $receipt->quantity }}</p>
<p><strong>Metode Pembayaran:</strong> {{ $receipt->paymentMethod->method_name ?? '-' }}</p>
<p><strong>Total Harga:</strong> Rp {{ number_format($receipt->total_price, 0, ',', '.') }}</p>
<p><strong>Status:</strong> {{ ucfirst($receipt->status) }}</p>

<br>

<a href="{{ route('transactions.index') }}">Kembali ke daftar transaksi</a>