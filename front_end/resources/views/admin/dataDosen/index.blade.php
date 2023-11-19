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
            <h1>Data Jadwal</h1>
            <a href="{{ route('dosen.create') }}">Tambah jadwal</a>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
                @foreach ($dosen as $dsn)
                    <tr>
                        <td>{{ $dsn->id_userdosen }}</td>
                        <td>{{ $dsn->nama }}</td>
                        <td>Admin</td>
                        <td>{{ $dsn->kelamin }}</td>
                        <td>
                            <a href="{{ route('dosen.edit', $dsn->id_userdosen) }}">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('dosen.destroy', $dsn->id_userdosen) }}">
                                @csrf
                                @method('DELETE')
                                <!-- Tombol konfirmasi penghapusan -->
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
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
