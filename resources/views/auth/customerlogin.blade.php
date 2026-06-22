<h1>Login Customer</h1>
    
 <form method="POST" action="/customers/login">
    @csrf
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            <strong>Error!</strong> {{ $errors->first('email') }}
        </ul>
    </div>
@endif
<a href="{{ route('customer.register') }}"><button>Signup</button></a>
<a href="{{ route('home') }}"><button>Return</button></a>