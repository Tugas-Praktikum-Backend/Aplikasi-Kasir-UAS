<h1>Ubah Klien</h1>
<form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nama:<br><input type="text" name="nama" value="{{ old('nama', $client->nama) }}"></p>
    <button type="submit">Update</button>
    <a href="{{ route('clients.index') }}">Batal</a>
</form>