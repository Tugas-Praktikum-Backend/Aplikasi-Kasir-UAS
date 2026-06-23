@php use App\Models\Shift;use Illuminate\Support\Facades\Auth; @endphp
<html>
<head>
    <title>Absen Shift</title>
</head>
<h1> Absen Shift </h1>
@if($shiftData->start_shift)
    <form action="{{ route('employees.stop_shift') }}" method="get">
        <button> Absen Pulang Shift </button>
    </form>
@else
    <form action="{{ route('employees.start_shift') }}" method="get">
        <button> Absen Masuk Shift </button>
    </form>
@endif
<br>

<h2> Riwayat Absen Shift </h2>
@if(count(json_decode($shiftData->logs)) > 0)
    <table>
        <thead>
        <th> Tipe Absen </th>
        <th> Waktu Absen </th>
        </thead>
        <tbody>
        @foreach(json_decode($shiftData->logs, true) as $log)
            <tr>
                <td> {{ $log[0] }} </td>
                <td> {{ date("d M Y H:i:s", (int)$log[1]) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br> <br>
@else
    <h2> - </h2>
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
