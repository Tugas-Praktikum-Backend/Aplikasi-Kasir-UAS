<h1>Home Page</h1>
<form action = "{{ route('employees.login') }}" method="GET">
    <button type="submit">Employee Menu</button>
</form>
<form action = "{{ route('customers.index') }}" method="GET">
    <button>Customer Menu</button>
</form>