@php use App\Utils\RoleUtils; @endphp
<html>
    <h1> Employees Dashboard </h1>
    <h2> Halo, {{ $employeeUser->username }} </h2>
    @foreach(RoleUtils::getAllowedRoutes($employeeUser->role) as $route)
        <a href="{{ route($route) }}"> Products </a>
        <br>
    @endforeach
    <br> <br>
    <a href="{{ route('employees.logout') }}"> Logout </a>
</html>
