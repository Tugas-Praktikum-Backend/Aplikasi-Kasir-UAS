<h1>Home Page</h1>
<form action = "{{ route('employees.login') }}" method="GET">
    <button type="submit">Employee Login</button>
</form>
<form action = "{{ route('customer.login') }}" method="GET">
    <button>Customer Login</button>
</form>