<head>
    <title>Tambah Metode Pembayaran</title>
</head>
<h1>Tambah metode pembayaran</h1>
<form method="POST" action="{{ route('managers.storepaymentmethod') }}">
    @csrf
    <label for="method_id">ID metode</label>
    <input name="method_id" id="method_id">
    <br><br>
    <label for="method_name">Nama metode</label>
    <input name="method_name" id="method_name">
    <br><br>
    <label for="admin_fee">Biaya admin</label>
    <input name="admin_fee" id="admin_fee" placeholder="0" required min="0">
    <br><br>
    <button type="submit">Tambah</button>
</form>
<a href="{{ route('managers.managepaymentmethod') }}">
    <button>Balik</button>
</a>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif