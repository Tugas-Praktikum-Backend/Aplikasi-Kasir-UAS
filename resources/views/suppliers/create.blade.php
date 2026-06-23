<head>
    <title>Restock</title>
</head>
<h1>Restock</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<p><strong>Modal toko saat ini:</strong> Rp {{ number_format($market->modal_toko ?? 0) }}</p>

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

    <p>Jumlah (KTN):<br><input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}"></p>

    <p>Harga satuan: <span id="harga_satuan">-</span></p>
    <p>Estimasi modal: <span id="estimasi_modal">-</span></p>

    <button type="submit">Simpan</button>
    <a href="{{ route('suppliers.index') }}">Batal</a>
</form>

<script>
    const katalog = @json($katalog);

    const clientSelect = document.getElementById('client_id');
    const productSelect = document.getElementById('product_id');
    const jumlahInput = document.getElementById('jumlah');
    const hargaSatuanEl = document.getElementById('harga_satuan');
    const estimasiModalEl = document.getElementById('estimasi_modal');
    const oldProduct = "{{ old('product_id') }}";

    function formatRupiah(n) {
        return 'Rp ' + (n || 0).toLocaleString('id-ID');
    }

    function isiProduk(clientId) {
        const produk = katalog[clientId] || [];

        if (!clientId || produk.length === 0) {
            productSelect.innerHTML = '<option value="">-- Tidak ada produk --</option>';
            updateInfoHarga();
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
        updateInfoHarga();
    }

    function updateInfoHarga() {
        const clientId = clientSelect.value;
        const productId = productSelect.value;
        const produk = (katalog[clientId] || []).find(p => String(p.id) === String(productId));

        if (!produk) {
            hargaSatuanEl.textContent = '-';
            estimasiModalEl.textContent = '-';
            return;
        }

        const jumlah = parseInt(jumlahInput.value) || 0;
        hargaSatuanEl.textContent = formatRupiah(produk.harga);
        estimasiModalEl.textContent = formatRupiah(produk.harga * jumlah);
    }

    clientSelect.addEventListener('change', function () { isiProduk(this.value); });
    productSelect.addEventListener('change', updateInfoHarga);
    jumlahInput.addEventListener('input', updateInfoHarga);

    if (clientSelect.value) {
        isiProduk(clientSelect.value);
    }
</script>