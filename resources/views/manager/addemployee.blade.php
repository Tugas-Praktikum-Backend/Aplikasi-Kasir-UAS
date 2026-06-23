<h1>Buat employee baru</h1>
<form method="POST" action="{{ route('managers.storeemployee') }}">
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
    Role:
    <br>
    <select name="role" id="role" class="form-control">
        <option value="">-- Select a Role --</option>
        @foreach($roles as $role)
            @if($role !== \App\Utils\RoleUtils::ROLE_MANAGER)
                <option value="{{ $role }}">
                    {{ $role }}
                </option>
            @endif
        @endforeach
    </select>
    <button type="submit">Simpan</button>
</form>
@if ($errors->any())
    <div style="color: #FF0000;">
        <ul style="margin-top: 5px; margin-bottom: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{ route('managers.manageemployee') }}">
    <button>Balik</button>
</a>