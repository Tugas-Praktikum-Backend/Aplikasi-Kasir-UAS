<h1>Daftar Tagihan</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Metode Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->product->nama ?? '-' }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                <td>{{ ucfirst($transaction->status) }}</td>
                <td>{{ $transaction->paymentMethod->method_name ?? '-' }}</td>
                <td>
                    @if($transaction->status === 'pending')
                        <a href="{{ route('transactions.payment', $transaction->id) }}">Bayar</a>
                    @else
                        <a href="{{ route('receipts.show', $transaction->id) }}">Lihat Struk</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Belum ada data transaksi</td>
            </tr>
        @endforelse
    </tbody>
</table>