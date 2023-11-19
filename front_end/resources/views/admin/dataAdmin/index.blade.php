<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nama Aplikasi Anda</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
    
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="container">
            <h1>Data Admin</h1>
            <a href="{{ route('admin.create') }}">Tambah Admin</a>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
                @foreach ($admin as $adm)
                    <tr>
                        <td>{{ $adm->id_admin }}</td>
                        <td>{{ $adm->nama }}</td>
                        <td>Admin</td>
                        <td>{{ $adm->kelamin }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $adm->id_admin) }}">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.destroy', $adm->id_admin) }}">
                                @csrf
                                @method('DELETE')
                                <!-- Tombol konfirmasi penghapusan -->
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>

    <footer>
        <!-- Footer Anda di sini -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
