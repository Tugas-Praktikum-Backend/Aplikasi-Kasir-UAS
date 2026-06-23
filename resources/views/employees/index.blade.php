@php use App\Utils\RoleUtils; @endphp
<html>
    <head>
        <title>Dashboard Karyawan</title>
    </head>
    <h1> Employees Dashboard </h1>
    <h2> Halo, {{ $employeeUser->username }} </h2>

    <div style="display: flex; justify-content: flex-start; gap:10px; width:100%">
        @foreach(RoleUtils::getAllowedRoutes($employeeUser->role) as $route)
            @php $name = str_replace(['.index', 'employees.', 'products.'], '', $route) @endphp
            <a href="{{ route($route) }}"> <button> {{ ucfirst($name) }} </button> </a>
        @endforeach
        <a href="{{ route('employees.salary') }}"> <button> Informasi Gaji </button> </a>
    </div>

    <br> <br>
    <a href="{{ route('employees.logout') }}"> <button> Logout </button> </a>
</html>
