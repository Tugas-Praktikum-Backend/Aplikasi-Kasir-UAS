<h1>Struk Belanja</h1>

{{-- @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif --}}

{{-- <p><strong>ID Transaksi:</strong> {{ $receipt['transaction_id'] }}</p> --}}
<p><strong>Daftar Produk:</strong></p>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th> Produk </th>
            <th> Harga Satuan </th>
            <th> Jumlah </th>
            <th> Subtotal </th>
            <th> Diskon </th>
            <th> Total </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $data)
            <tr>
                <td> {{ $data[1] }} </td>
                <td> Rp{{ number_format($data[3], 2, ',', '.') }} </td>
                <td> {{ $data[2] }} </td>
                <td> Rp{{ number_format($data[2] * $data[3], 2, ',', '.') }} </td>
                <td> {{ $data[4] === 0 ? '-' : $data[4] * 100 . '%' }} </td>
                <td> Rp{{ number_format($data[5], 2, ',', '.') }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>Metode Pembayaran:</strong> {{ $receipt['payment_method'] ?? '-' }}</p>
<p><strong>Subtotal:</strong> Rp{{ number_format($receipt['total_price'], 0, ',', '.') }}</p>

<br>

<a href="{{ route('transactions.index') }}"> <button> Kembali ke daftar transaksi </button> </a>
