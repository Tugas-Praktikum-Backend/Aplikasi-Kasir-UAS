<h1>Ubah Password</h1>
<form method="POST" action="{{ route('customers.updatepassword') }}">
    @csrf @method('PUT')
    <label>Password lama:</label><br>
    <input type="password" name="old_password" required><br><br>

    <label>Password baru:</label><br>
    <input type="password" name="new_password" required><br><br>

    <button type="submit">Ganti Password</button>
</form>
<a href="{{ route('customers.index') }}">
    <button>Balik</button>
</a>