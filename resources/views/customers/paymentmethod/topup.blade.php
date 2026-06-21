<h1>Topup {{ $paymentmethod->method_id }}</h1>
<form method="POST" action="{{ route('paymentmethods.update', $paymentmethod) }}">
    @csrf @method('PUT')
    <label for="balance">Jumlah saldo</label>
    <input type="number" name="balance" id="balance" placeholder="0" required min="1">
    <br><br>
    <button type="submit">Isi Saldo</button>
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

<a href="{{ route('paymentmethods.index') }}">
    <button>Balik</button>
</a>