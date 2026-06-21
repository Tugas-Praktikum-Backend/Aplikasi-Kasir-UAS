<h1>Metode pembayaran Anda</h1>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 300px">Metode Pembayaran</th>
            <th style="width: 180px">Saldo</th>
            <th style="width: 120px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($methods as $method)
            <tr>
                <td>
                    {{ $method->method_id }}
                </td>
                <td>
                    {{ $method->balance }}
                </td>
                <td style="text-align: center">
                    <a href="{{ route('paymentmethods.topup', $method) }}">
                        <button>Top Up</button>
                    </a>
                    <form action="{{ route('paymentmethods.destroy', $method) }}" method="post"style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<a href="{{ route('paymentmethods.create') }}">
    <button>Tambah metode pembayaran</button>
</a>
<br><br>
<a href="{{ route('customers.index') }}">
    <button>Balik</button>
</a>