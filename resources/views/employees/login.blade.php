<html>
<h1> Employees Login Page </h1>
<form method="POST" action="{{ route('employees.login') }}">
    @csrf
    Email <input type="email" name="email">
    Password <input type="password" name="password">
    <button type="submit"> Login </button>
</form>

@foreach(['username', 'password', 'loginFailed'] as $err)
    @error($err)
    <p1 style="color:red"> Wrong Username or Password! </p1>
    @enderror
@endforeach
</html>
