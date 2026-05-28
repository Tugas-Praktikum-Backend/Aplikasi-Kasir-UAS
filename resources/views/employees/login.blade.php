@php use function Laravel\Prompts\password; @endphp
<html>
<h1> Login Page </h1>
@dump(password_hash('12345678', PASSWORD_BCRYPT))
<form method="POST" action="{{ route('employees.login') }}">
    @csrf
    Email <input type="email">
    Password <input type="password">
    <button type="submit"> Login </button>
</form>
@if($loginFailed)
    <p1> Wrong Username or Password! </p1>
@endif
</html>
