<html>
<h1> Pengelolaan Kasir </h1>

<form method="get">
    <button type="submit" formaction="{{ route('employees.cashier_create') }}">
        Buat Transaksi Baru
    </button>
</form>

<br> <br>

<a href="{{ route('employees.index') }}"> Kembali ke menu utama </a>
</html>
