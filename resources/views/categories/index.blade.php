<h1>Daftar Kategori</h1>

<a href="{{ route('categories.create') }}">Tambah Kategori Baru</a>
<br><br>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->nama }}</td>
            <td>
                <form action="{{route('categories.edit', $category->id)}}" method="GET" style="display:inline; margin-right: 5px;">
                    <button type="submit">Ubah</button>
                </form>

                <form action="{{route('categories.destroy', $category->id)}}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah anda ingin menghapus kategori ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum ada kategori.</td>
        </tr>
    @endforelse
  </tbody>
</table>