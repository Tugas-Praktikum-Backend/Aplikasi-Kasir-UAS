<h1>Manager Dashboard</h1>
<div>
    <p>Jumlah pemasukan: {{ $market->total_pemasukan }}</p>
    <p>Total modal toko sekarang: {{ $market->modal_toko }}</p>
    <a href={{ route('managers.addinvestment') }}><button>Masukkan uang ke toko</button></a>
</div>
<br>
<a href={{ route('managers.manageemployee') }}><button>Manage Karyawan</button></a>
<a href={{ route('managers.managepaymentmethod') }}><button>Manage Metode Pembayaran</button></a>
<a href={{ route('employees.index') }}><button>Balik</button></a>