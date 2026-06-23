@php use App\Models\Product;use Illuminate\Support\Facades\Crypt; @endphp

@vite('resources/js/app.js')

<html>
<head>
    <title>Transaksi Baru</title>
</head>
<h1> Transaksi Baru </h1>

@error('success')
    <p1 style="color:green"> Berhasil menambahkan ke dalam tagihan customer </p1>
@enderror

@if(count($data) > 0)
    <table>
        <thead>
        <th> Nama Barang</th>
        <th> Jumlah</th>
        <th> Harga</th>
        <th> Hapus</th>
        </thead>

        <tbody>
        @foreach($data as $i => $d)
            <tr>
                @php $productData = $products[$d[1]][$i]; @endphp
                <td> {{ $productData[0] }} </td>
                <td> {{ $d[0] }} </td>
                <td> {{ $productData[2] * $d[0] }} </td>
                <td>
                    <form action="{{ route('cashier.delete') }}" method="get">
                        @csrf
                        <input type="hidden" name="id" value={{ $i }}>
                        <input type="hidden" name="data" value={{ Crypt::encrypt($data) }}>
                        <button type="submit"> Hapus Barang </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br> <br>
@endif

<form action="{{ route('cashier.add') }}" method="get">
    @csrf
    <input type="hidden" name="data" value={{ Crypt::encrypt($data) }}>
    <br>

    <label for="cashier-products-category"> Pilih Kategori Produk </label>
    <select id="cashier-products-category" name="category" required>
        @foreach(array_keys($products) as $c)
            <option value="{{ $c }}"> {{ $categories[$c] }} </option>
        @endforeach
    </select>
    <br> <br>

    <label for="cashier-products"> Pilih Produk </label>
    <select id="cashier-products" name="id" required data-products="{{ json_encode($products) }}"> </select>
    <br> <br>

    Jumlah <input name="amount" type="number" min="1" required>
    <button type="submit"> Tambah Barang </button>
</form>

<br> <br>

@if(count($data) > 0)
    <form action="{{ route('cashier.process') }}" method="get">
        @csrf
        <input type="hidden" name="data" value={{ Crypt::encrypt($data) }}>
        Username Customer <input required name="customer_id">
        <button type="submit"> Tambahkan Tagihan</button>
        @error('cid_notfound')
        <br>
        <p1 style="color:red"> Username Customer yang dimasukkan tidak valid </p1>
        @enderror
    </form>

    <br> <br>
@endif

<a href="{{ route('employees.index') }}"> <button> Kembali ke menu utama </button> </a>
</html>

<style>
    table, td, th {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td, th {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
