<h1>Pembayaran</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p><strong>ID Transaksi:</strong> {{ $transaction->id }}</p>
<p><strong>Produk:</strong> {{ $transaction->product->nama ?? '-' }}</p>
<p><strong>Harga Satuan:</strong> Rp {{ number_format($transaction->product->harga ?? 0, 0, ',', '.') }}</p>
<p><strong>Jumlah:</strong> {{ $transaction->quantity }}</p>
<p><strong>Total Tagihan:</strong> Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>

<form action="{{ route('transactions.pay', $transaction->id) }}" method="POST">
    @csrf

    <label>Metode Pembayaran</label>
    <br>
    <select name="payment_method_id" required>
        <option value="">-- Pilih Metode Pembayaran --</option>
        @foreach($paymentMethods as $method)
            <option value="{{ $method->method_id }}">
                {{ $method->method_name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Bayar Sekarang</button>
</form>

<br>

<a href="{{ route('transactions.index') }}">Kembali</a>