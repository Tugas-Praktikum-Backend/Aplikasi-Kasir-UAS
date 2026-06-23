<head>
    <title>Manager Dashboard</title>
</head>
<h1>Manager Dashboard</h1>
<div>
    <p>Total modal toko sekarang: Rp {{ number_format($market->modal_toko, 0, ',', '.') }}</p>
    <a href={{ route('managers.addinvestment') }}><button>Masukkan uang ke toko</button></a>
</div>
<br>
<a href={{ route('managers.manageemployee') }}><button>Manage Karyawan</button></a>
<a href={{ route('managers.managepaymentmethod') }}><button>Manage Metode Pembayaran</button></a>
<a href={{ route('employees.index') }}><button>Balik</button></a>