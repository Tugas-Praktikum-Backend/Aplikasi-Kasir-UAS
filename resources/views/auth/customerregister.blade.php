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
    <input type="password" name="password" required>
    <br>
    <br>
    <button type="submit">Sign Up</button>
</form>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{ route('customer.login') }}"><button>Return</button></a>