<h1>Discount List</h1>

<a href="{{ route('discounts.create') }}">  Tambah Diskon Baru</a>

<br><br>

@foreach($discounts as $discount)
    <p>{{ $discount->name }} - {{ $discount->percentage }}%</p>
@endforeach