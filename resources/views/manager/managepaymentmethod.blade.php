<head>
    <title>Manage Metode Pembayaran</title>
</head>
<h1>Manage Metode Pembayaran</h1>
<a href="{{ route('managers.addpaymentmethod') }}"><button>Tambah Metode Pembayaran</button></a>
<a href="{{ route('managers.index') }}"><button>Balik</button></a>
@if ($paymentmethod->isEmpty())
    <p>Belum ada metode pembayaran yang tersimpan.</p>
@else
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th style="width: 300px">Nama Metode</th>
            <th style="width: 100px">Biaya admin</th>
            <th style="width: 120px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paymentmethod as $method)
            <tr>
                <td>
                    {{ $method->method_id }}
                </td>
                <td>
                    {{ $method->method_name }}
                </td>
                <td>
                    {{ $method->admin_fee }}
                </td>
                <td style="text-align: center">
                    <a href="{{ route('managers.editadminfee', $method) }}"><button>Ubah biaya admin</button></a>
                    <form action="{{ route('managers.deletepaymentmethod', $method) }}" method="post"style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
@endif
