<h1>Create Manager</h1>
<form method="POST" action="{{ route('managers.store') }}">
    @csrf
    Username:
    <br>
    <input name="username" required>
    <br>
    <br>
    Password:
    <br>
    <input name="password" required>
    <br>
    <br>
    <button type="submit">Create new manager</button>
</form>
<a href="{{ route('managers.index') }}">Return</a>