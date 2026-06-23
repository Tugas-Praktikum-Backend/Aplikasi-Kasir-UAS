<h1>Edit employee {{ $employee->username }}</h1>
<form method="POST" action="{{ route('managers.updateemployee', $employee->id) }}">
    @csrf @method('PUT')
    Ubah Nama:
    <br>
    <input name="username" required>
    <br>
    <br>
    Ubah Password: (kosongkan jika tidak mau mengubah)
    <br>
    <input name="password" type="password" required>
    <br>
    <br>
    <button type="submit">Update Data</button>
</form>
<br>
@if ($errors->any())
    <div style="color: #FF0000;">
        <ul style="margin-top: 5px; margin-bottom: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{ route('managers.manageemployee') }}">
    <button>Balik</button>
</a>