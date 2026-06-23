<h1>Tambah modal toko</h1>
<form method="POST" action="{{ route('managers.storeinvestment') }}">
    @csrf
    <label for="balance">Jumlah uang</label>
    <input type="number" name="balance" id="balance" placeholder="0" required min="1">
    <br><br>
    <button type="submit">Isi</button>
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

<a href="{{ route('managers.index') }}">
    <button>Balik</button>
</a>