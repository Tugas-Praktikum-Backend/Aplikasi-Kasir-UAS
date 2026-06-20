<h1>Tambah Kategori Baru</h1>
<form method="POST" action="{{route('categories.store')}}">
    @csrf
    <div>
        <label>Nama Kategori:</label><br>
        <input type="text" name="nama" required>
    </div>
    <br>
    <button type="submit">Simpan Kategori</button>
    <a href=" route('categories.index') ">Batal</a>
</form>