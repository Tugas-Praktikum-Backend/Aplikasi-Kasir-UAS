<h1>Pembayaran</h1>

{{-- @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaction as $data)
            <tr>
                <td>{{ $data[1] }}</td>
                <td>{{ $data[3] }} </td>
                <td>{{ $data[2] }}</td>
                <td>{{ $data[2] * $data[3] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p> Total Keseluruhan : Rp{{ $prices }} </p>


<form action="{{ route('transactions.pay') }}" method="POST">
    @csrf

    <input type='hidden' name='transaction' value='@json($transaction)'>
    <input type='hidden' name='prices' value='{{ $prices }}'>
    <input type='hidden' name='payment' value='{{ $payment }}'>
    <input type='hidden' name='transaction_id' value='{{ $tid }}'>

    <label> Metode Pembayaran {{ $payment }} </label>
    <br>

    <br><br>

    <button type="submit">Bayar Sekarang</button>
</form>

<br>

<a href="{{ route('transactions.index') }}">Kembali</a>