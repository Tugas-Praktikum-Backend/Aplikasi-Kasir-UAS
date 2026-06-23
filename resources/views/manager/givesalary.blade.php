<h1>Berikan gaji ke {{ $employee->username }}</h1>
<form method="POST" action="{{ route('managers.transfersalary', $employee->id) }}">
    @csrf @method('PUT')
    <label for="salary">Jumlah gaji:</label>
    <input type="number" name="salary" id="salary" placeholder="0" required min="1">
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

<a href="{{ route('managers.manageemployee') }}">
    <button>Balik</button>
</a>