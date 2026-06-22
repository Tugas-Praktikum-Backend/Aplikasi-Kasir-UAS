<h1>Tambah Klien</h1>
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <p>Nama:<br><input type="text" name="nama" value="{{ old('nama') }}"></p>
    <button type="submit">Simpan</button>
    <a href="{{ route('clients.index') }}">Batal</a>
</form>