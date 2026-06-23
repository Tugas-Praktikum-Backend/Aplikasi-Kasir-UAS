@php use function Laravel\Prompts\number; @endphp
<html>
    <head>
        <title>Informasi Gaji</title>
    </head>
<h1> Informasi Gaji </h1>

<p1>
    Gaji pokok saat ini : Rp{{ number_format($employeeUser->monthly_revenue, 2, ',', '.') }}
    <br> <br>
    Gaji pokok dibayarkan tiap bulan, pada tanggal 25
    <br> <br>
    Ketentuan lebih lanjut sebagai berikut
    <br>
</p1>

<p2>
- Jam kerja minimal untuk mendapat gaji penuh adalah <b> 170 Jam/bulan </b> <br>
- Apabila tidak memenuhi jam kerja minimal, maka akan dikenakan denda sebesar
    <b> (Gaji Pokok / 170) x Jam Kerja yang kurang </b> <br>
- Tiap jam kerja yang lebih dari prasyarat, maka akan dinyatakan sebagai <b> Lembur </b> <br>
- Besaran bonus dari tiap jam lembur ialah <b> (Gaji Pokok / 170) x 125% </b>
</p2>

<br> <br> <br>

<a href={{ route('employees.index') }}> <button> Kembali ke menu utama </button> </a>
</html>
