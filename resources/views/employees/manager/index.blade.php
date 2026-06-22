<h1>Manager Dashboard</h1>
<div>
    <p>Jumlah pemasukan: {{ $market->total_pemasukan }}</p>
    <p>Total modal toko sekarang: {{ $market->modal_toko }}</p>
    <button>Masukkan uang ke toko</button>
</div>
<br>
<a href={{ route('managers.manageemployee') }}><button>Manage Karyawan</button></a>
<a href={{ route('managers.managecustomer') }}><button>Manage Customer</button></a>
<a href={{ route('employees.index') }}><button>Balik</button></a>