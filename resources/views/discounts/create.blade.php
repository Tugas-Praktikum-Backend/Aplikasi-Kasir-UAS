<head>
    <title>Tambah Diskon</title>
</head>
<h1>Add Discount</h1>
<form method="POST" action="{{ route('discounts.store') }}">
    @csrf
    Product:
    <br>
    <select name="product_id" required>
        <option value="" disabled selected>-- Pilih Produk --</option>
        @foreach($products as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select>
    <br>
    <br>
    Discount Name:
    <br>
    <input name="name" required>
    <br>
    <br>
    Percentage:
    <br>
    <input type="number" step="0.01" name="percentage" required>
    <br>
    <br>
    Start Date:
    <br>
    <input type="date" name="start_date">
    <br>
    <br>
    End Date:
    <br>
    <input type="date" name="end_date">
    <br>
    <br>
    <button type="submit">Save</button>
</form>
<a href="{{ route('discounts.index') }}">Back</a>