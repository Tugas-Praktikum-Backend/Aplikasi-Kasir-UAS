<h1>Ubah Kategori</h1>
<form method="POST" action="{{route('categories.update', $category->id)}}">
    @csrf @method('PUT')
    Nama Kategori:
    <br>
    <input type="text" name="nama" value="{{$category->nama}}" required>
    <br>
    <br>
    <button type="submit">Simpan</button>
</form>