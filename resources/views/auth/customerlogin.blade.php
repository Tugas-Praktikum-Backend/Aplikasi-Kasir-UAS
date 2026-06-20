<h1>Login Customer</h1>
@if ($errors->any())
    <div>
        <strong>Error!</strong> {{ $errors->first('email') }}
    </div>
    <br>
 @endif
    
 <form method="POST" action="/customers/login">
    @csrf
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>
<a href="{{ route('customer.register') }}">Signup</a>
<a href="{{ route('home') }}">Return</a>