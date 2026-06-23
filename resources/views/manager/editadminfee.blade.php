<head>
    <title>Edit Biaya Admin</title>
</head>
<h1>Edit Biaya Admin {{ $paymentmethod->method_name }}</h1>
<form method="POST" action="{{ route('managers.updateadminfee', $paymentmethod->method_id) }}">
    @csrf
    <label for="admin_fee">Biaya Admin</label>
    <input type="number" name="admin_fee" id="admin_fee" value="{{ old('admin_fee', $paymentmethod->admin_fee) }}" placeholder="0" required min="0">
    <br><br>
    <button type="submit">Simpan</button>
</form>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{ route('managers.managepaymentmethod') }}">
    <button>Balik</button>
</a>