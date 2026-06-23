<head>
    <title>Ubah Diskon</title>
</head>
<h1>Ubah Diskon</h1>
<form method="POST" action="{{ route('discounts.update', $discount->id) }}">
    @csrf @method('PUT')
    
    <div>
        <label>Produk:</label><br>
        <select name="product_id" required>
            <option value="">-- Pilih Produk --</option>
            @foreach($products as $p)
                <option value="{{ $p->id }}" {{ $discount->product_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <br>

    Nama Diskon:
    <br>
    <input type="text" name="name" value="{{ $discount->name }}" required>
    <br>
    <br>

    Persentase:
    <br>
    <input type="number" step="0.01" name="percentage" value="{{ $discount->percentage }}" required>
    <br>
    <br>

    Tanggal Mulai:
    <br>
    <input type="date" name="start_date" value="{{ $discount->start_date }}">
    <br>
    <br>

    Tanggal Selesai:
    <br>
    <input type="date" name="end_date" value="{{ $discount->end_date }}">
    <br>
    <br>

    <button type="submit">Simpan</button>
</form>