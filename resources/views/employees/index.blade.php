<html>
    <h1> Employees Dashboard </h1>
    <h2> Halo, {{ $employeeUser->username }} </h2>
    <a href="{{ route('products.index') }}"> Products </a>
    <br> <br>
    <a href="{{ route('employees.logout') }}"> Logout </a>
</html>
