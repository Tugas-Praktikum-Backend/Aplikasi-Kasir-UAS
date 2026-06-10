<h1>Customer Sign Up</h1>
<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    Username:
    <br>
    <input name="username" required>
    <br>
    <br>
    Email:
    <br>
    <input name="email" required>
    <br>
    <br>
    Password:
    <br>
    <input name="password" required>
    <br>
    <br>
    <button type="submit">Sign Up</button>
</form>
<a href="{{ route('customers.index') }}">Return</a>