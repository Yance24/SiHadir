<!DOCTYPE html>
<html>
<head>
    <title>Table Data</title>
</head>
<body>

<h1>Data Table</h1>

<form action="/admin/user-data/mahasiswa" method="get">
    @csrf
    <button type="submit">Show Mahasiswa</button>
</form>

<form action="/admin/user-data/dosen" method="get">
    @csrf
    <button type="submit">Show Dosen</button>
</form>

<form action="/admin/user-data/admin" method="get">
    @csrf
    <button type="submit">Show Admin</button>
</form>

@if(isset($data))
    
    <!-- Tambahkan tombol tambah data -->
    <form action="" method="get">
        @csrf
        <button type="submit">Tambah {{ ucfirst($model) }} Data</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
        @foreach($data as $item)
            <tr>
                @if($model == 'mahasiswa')
                    <td>{{ $item->id_user }}</td>
                @elseif($model == 'dosen')
                    <td>{{ $item->id_userdosen }}</td>
                @elseif($model == 'admin')
                    <td>{{ $item->id_admin }}</td>
                @endif
                <td>{{ $item->nama }}</td>
                @if($model == 'mahasiswa')
                    <td>Mahasiswa</td>
                @elseif($model == 'dosen')
                    <td>Dosen</td>
                @elseif($model == 'admin')
                    <td>Admin</td>
                @endif
                <td>{{ $item->kelamin }}</td>
                <td>
                    <form action="" method="get">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>                  
                </td>
                <td>
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>                    
                </td>
            </tr>
        @endforeach
    </table>
@endif

</body>
</html>
