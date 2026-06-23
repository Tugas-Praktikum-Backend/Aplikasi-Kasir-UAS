<h1>Beli Product</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf

    <p>Klien:<br>
        <select name="client_id" id="client_id">
            <option value="">-- Pilih Klien --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>{{ $client->nama }}</option>
            @endforeach
        </select>
    </p>

    <p>Produk:<br>
        <select name="product_id" id="product_id">
            <option value="">-- Pilih klien dulu --</option>
        </select>
    </p>

    <p>Jumlah (KTN):<br><input type="number" name="jumlah" value="{{ old('jumlah') }}"></p>

    <button type="submit">Simpan</button>
    <a href="{{ route('suppliers.index') }}">Batal</a>
</form>

<script>
    const katalog = @json($katalog);

    const clientSelect = document.getElementById('client_id');
    const productSelect = document.getElementById('product_id');
    const oldProduct = "{{ old('product_id') }}";

    function isiProduk(clientId) {
        const produk = katalog[clientId] || [];

        if (!clientId || produk.length === 0) {
            productSelect.innerHTML = '<option value="">-- Tidak ada produk --</option>';
            return;
        }

        productSelect.innerHTML = '<option value="">-- Pilih Produk --</option>';
        produk.forEach(function (p) {
            const opt = document.createElement('option');
            opt.value = p.id;
            opt.textContent = p.nama;
            if (String(p.id) === oldProduct) opt.selected = true;
            productSelect.appendChild(opt);
        });
    }

    clientSelect.addEventListener('change', function () {
        isiProduk(this.value);
    });

    if (clientSelect.value) {
        isiProduk(clientSelect.value);
    }
</script>