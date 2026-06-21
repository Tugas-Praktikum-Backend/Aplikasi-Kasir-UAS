@php use App\Utils\RoleUtils; @endphp
<html>
    <h1> Employees Dashboard </h1>
    <h2> Halo, {{ $employeeUser->username }} </h2>
    @foreach(RoleUtils::getAllowedRoutes($employeeUser->role) as $name => $route)
        <a href="{{ route($route) }}"> {{ ucfirst($name) }} </a>
        <br>
    @endforeach
    <a href="{{ route('employees.salary') }}"> Informasi Gaji </a>
    <br> <br>
    <a href="{{ route('employees.logout') }}"> Logout </a>
</html>
