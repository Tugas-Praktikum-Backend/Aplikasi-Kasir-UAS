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
            <th>ID Transaksi</th>
            <th>Produk</th>
            <th>Metode Pembayaran</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
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
                        $prices += $data[2] * $data[3];
                    }
                    $productString = implode(', ', $products);
                @endphp
                <td>{{ $productString }}</td>
                <td>
                    <select id='payment_method'> 
                        @foreach ($payments as $payment)
                            <option value={{ $payment }}> {{ $payment }} </option>
                        @endforeach
                    </select>
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
                        <form action='{{ route('transactions.payment') }}' method='get'>
                            <input type='hidden' name='transaction_id' value='{{ $i }}'>
                            <input type='hidden' name='transaction' value='@json($transaction[0])'>
                            <input type='hidden' name='prices' value='{{ $prices }}'>
                            <input type='hidden' id='payment' name='payment' value='BCA'>
                            <button type='submit'> Bayar </button>
                        </form>
                    @else
                        <form action='{{ route('receipts.show') }}' method='get'>
                            <input type='hidden' name='tid' value='{{ $i }}'>
                            <button type='submit'> Struk </button>
                        </form>
                    @endif
                </td>
            </tr>
        {{-- @empty
            <tr>
                <td colspan="8">Belum ada data transaksi</td>
            </tr> --}}
        @endforeach
    </tbody>
</table>

<script>
    document.getElementById('payment_method').addEventListener('change', function () {
        document.getElementById('payment').value = this.value;
    });
    document.getElementById('payment_method').dispatchEvent('change');
</script>