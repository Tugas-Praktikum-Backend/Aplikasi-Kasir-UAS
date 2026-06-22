<h1>Form Restock</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <p>
        Produk:<br>
        <select name="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->nama }}</option>
            @endforeach
        </select>
    </p>
    <p>
        Klien:<br>
        <select name="client_id">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nama }}</option>
            @endforeach
        </select>
    </p>
    <p>Jumlah restock:<br><input type="number" name="jumlah" value="{{ old('jumlah') }}"></p>
    <p>Modal (harga beli /unit):<br><input type="number" name="modal" value="{{ old('modal') }}"></p>
    <p>Harga (harga jual /unit):<br><input type="number" name="harga" value="{{ old('harga') }}"></p>
    <button type="submit">Simpan Restock</button>
    <a href="{{ route('suppliers.index') }}">Batal</a>
</form>