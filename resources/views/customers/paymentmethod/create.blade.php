<h1>Tambah metode pembayaran</h1>
<form method="POST" action="{{ route('paymentmethods.store') }}">
    @csrf
    <label for="method_id">Pilih metode pembayaran</label>
    <select name="method_id" id="method_id">
        <option value="">Pilih metode</option>
        @foreach ($methods as $method)
            <option value="{{ $method->method_id }}">{{ $method->method_name }}</option>
            <br>
        @endforeach
    </select>
    <br><br>
    <label for="balance">Saldo awal</label>
    <input type="number" name="balance" id="balance" placeholder="0" required min="0">
    <br><br>
    <button type="submit">Buat metode pembayaran</button>
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