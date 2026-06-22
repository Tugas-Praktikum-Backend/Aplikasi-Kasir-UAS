<h1>Buat employee baru</h1>
<form method="POST" action="{{ route('managers.addemployee') }}">
    @csrf
    Nama:
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
    <input name="password" type="password" required>
    <br>
    <br>
    <button type="submit">Simpan</button>
</form>