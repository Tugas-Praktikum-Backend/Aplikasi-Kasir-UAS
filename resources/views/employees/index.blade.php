<html>
    <h1> Employees Dashboard </h1>
    <h2> Name: {{ $username }} </h2>
    <h3> Joined at : {{ $joined }} </h3>
    <a href="{{ route('employees.logout') }}"> Logout </a>
</html>
