<html>
<h1> Employees Login Page </h1>
<form method="POST" action="{{ route('employees.login') }}">
    @csrf
    Email <input type="email" name="email">
    <br> <br>
    Password <input type="password" name="password">
    <br> <br>
    <button type="submit"> Login </button>
</form>

@foreach(['username', 'password', 'loginFailed'] as $err)
    @error($err)
    <p1 style="color:red"> Wrong Username or Password! </p1>
    <br>
    @enderror
@endforeach

<br>
<a href="{{ route('home') }}"> <button> Kembali </button> </a>
</html>
