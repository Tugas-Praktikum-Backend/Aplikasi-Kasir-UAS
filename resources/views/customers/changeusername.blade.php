<h1>Ubah Username</h1>
<form method="POST" action="{{ route('customers.updateusername') }}">
    @csrf @method('PUT')
    <label>Username lama:</label><br>
    <input name="old_username" required>
    @error('old_username') <br> <p1 style="color:red"> Username lama tidak sesuai! </p1> @enderror
    <br><br>

    <label>Username baru:</label><br>
    <input name="new_username" required><br><br>

    <button type="submit">Ganti Username</button>
</form>
<a href="{{ route('customers.index') }}">
    <button>Balik</button>
</a>
