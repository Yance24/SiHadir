<!DOCTYPE html>
<html>
<head>
    <title>Data Admin</title>
</head>
<body>
    <h1>Data Admin</h1>

    <table>
        <thead>
            <tr>
                <th>ID Admin</th>
                <th>Nama</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id_admin }}</td>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->password }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id_admin) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.destroy', $admin->id_admin) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <h1>Tambah Admin</h1>

    <form method="POST" action="{{ route('admin.store') }}">
        @csrf
        <label for="id_admin">ID Admin</label>
        <input type="text" name="id_admin" id="id_admin" required>

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Simpan</button>
    </form>
 
</body>
</html>
