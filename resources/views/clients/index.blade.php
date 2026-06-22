<h1>Daftar Klien</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('clients.create') }}">Tambah Klien</a>
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @forelse($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->nama }}</td>
            <td>
                <form action="{{ route('clients.edit', $client->id) }}" method="GET" style="display:inline; margin-right: 5px;">
                    <button type="submit">Ubah</button>
                </form>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Belum ada klien.</td></tr>
    @endforelse
</table>