<h1>Daftar Tagihan</h1>

@if(count($list) >= 1)
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th> ID Transaksi </th>
            <th> Produk </th>
            <th> Metode Pembayaran </th>
            <th> Total </th>
            <th> Status </th>
            <th> Aksi </th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $i => $transaction)
            <tr>
                <td>{{ $i }}</td>
                @php
                    $products = [];
                    $prices = 0;
                    foreach($transaction[0] as $id => $data){
                        $products[] = "{$data[2]}x $data[1]";
                        $prices += $data[5];
                    }
                    $productString = implode(', ', $products);
                @endphp
                <td>{{ $productString }}</td>
                <td>
                @if($transaction[1])
                    <p> {{ $transaction[2] }} </p>
                @else
                    <select name='payment' form='payment{{ $i }}'>
                        @foreach ($payments as $payment)
                            <option value={{ $payment }}> {{ $payment }} </option>
                        @endforeach
                    </select>
                @endif

                </td>
                <td>Rp {{ number_format($prices, 0, ',', '.') }}</td>
                <td>
                    @if ($transaction[1])
                        <p style='color:green'>Lunas</p>
                    @else
                        <p style='color:red'>Belum Lunas</p>
                    @endif
                </td>
                <td>
                    @if(!$transaction[1])
                        @if(count($payments) < 1)
                            <p style="color:red"> Tidak ada metode pembayaran yang dipilih </p>
                        @else
                            <form id='payment{{ $i }}' action='{{ route('transactions.payment') }}' method='get'>
                                <input type='hidden' name='transaction_id' value='{{ $i }}'>
                                <input type='hidden' name='transaction' value='@json($transaction[0])'>
                                <input type='hidden' name='prices' value='{{ $prices }}'>
                                <button type='submit'> Bayar </button>
                            </form>
                        @endif
                    @else
                        <form action='{{ route('receipts.show') }}' method='get'>
                            <input type='hidden' name='tid' value='{{ $i }}'>
                            <button type='submit'> Struk </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p> Belum ada data transaksi </p>
@endif

<br> <br>
<a href="{{ route('customers.index') }}"> <button> Kembali ke menu utama </button> </a>
