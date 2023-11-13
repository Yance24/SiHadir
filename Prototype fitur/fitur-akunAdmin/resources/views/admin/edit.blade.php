<!DOCTYPE html>
<html>
<head>
    <title>Data Admin</title>
</head>
<body>
<h1>Edit Admin</h1>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.update', $admin->id_admin) }}">
    @csrf
    @method('PUT')

    <label for="id_admin">ID Admin</label>
    <input type="text" name="id_admin" id="id_admin" value="{{ $admin->id_admin }}" required>

    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="{{ $admin->nama }}" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="{{ $admin->password }}" required>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</body>
</html>