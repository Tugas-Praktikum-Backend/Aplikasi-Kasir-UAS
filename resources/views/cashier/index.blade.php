<html>
<h1> Pengelolaan Kasir </h1>

<form method="get">
    <button type="submit" formaction="{{ route('employees.cashier_create') }}">
        Buat Transaksi Baru
    </button>
</form>

<br> <br>

<a href="{{ route('employees.index') }}"> <button> Kembali ke menu utama </button> </a>
</html>
