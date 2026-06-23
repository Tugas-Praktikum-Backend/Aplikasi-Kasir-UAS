<h1>Manage Karyawan</h1>
<a href="{{ route('managers.addemployee') }}"><button>Tambah Karyawan</button></a>
<a href="{{ route('managers.index') }}"><button>Balik</button></a>
@if ($employees->isEmpty())
    <p>Belum ada employee yang tersimpan.</p>
@else
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 50px">No</th>
            <th style="width: 300px">Nama</th>
            <th style="width: 100px">Gaji yang didapat</th>
            <th style="width: 100px">Role</th>
            <th style="width: 120px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            @if($employee->role !== \App\Utils\RoleUtils::ROLE_MANAGER)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>
                        {{ $employee->username }}
                    </td>
                    <td>
                        Rp {{ number_format($employee->monthly_revenue, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $employee->role }}
                    </td>
                    <td style="text-align: center">
                        <a href="{{ route('managers.editemployee', $employee) }}"><button>Edit</button></a>
                        <a href="{{ route('managers.givesalary', $employee) }}"><button>Berikan gaji</button></a>
                        <form action="{{ route('managers.removeemployee', $employee) }}" method="post" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<br>
@endif
