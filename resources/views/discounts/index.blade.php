<html>
    <h1>Discount List</h1>
    <a href="{{ route('discounts.create') }}">Tambah Diskon Baru</a>
    <br><br>

    @if(session('success'))
        {{ session('success') }}
        <br><br>
    @endif

    @foreach($discounts as $discount)
        <h2>{{ $discount->name }} - {{ $discount->percentage }}%</h2>
        Product: {{ $discount->product ? $discount->product->nama : 'Produk telah dihapus' }}
        <br>
        Berlaku: {{ $discount->start_date }} s/d {{ $discount->end_date }}
        <br><br>
        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
        <br>
    @endforeach
</html>