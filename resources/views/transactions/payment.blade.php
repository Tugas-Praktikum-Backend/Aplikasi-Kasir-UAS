<h1>Pembayaran</h1>

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
        @foreach ($transaction as $data)
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
<p> Total Keseluruhan : Rp{{ number_format($prices, 2, ',', '.') }} </p>
<p> Saldo Saat Ini : Rp{{ number_format($balance, 2, ',', '.') }} </p>

@if($balance < $prices)
    <p style="color:red"> Saldo tidak mencukupi! </p>
@else
    <form action="{{ route('transactions.pay') }}" method="POST">
        @csrf

        <input type='hidden' name='transaction' value='@json($transaction)'>
        <input type='hidden' name='prices' value='{{ $prices }}'>
        <input type='hidden' name='payment' value='{{ $payment }}'>
        <input type='hidden' name='transaction_id' value='{{ $tid }}'>

        <label> Metode Pembayaran {{ $payment }} </label>
        <br>

        <br><br>

        <button type="submit"> Bayar Sekarang </button>
    </form>
@endif

<br>

<a href="{{ route('transactions.index') }}"> <button> Kembali </button> </a>
