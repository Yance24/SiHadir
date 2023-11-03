@extends('layouts.app')

@section('content')
    <h1>Data Dosen</h1>

    <a href="{{ route('dosen.create') }}">Tambah Dosen</a>

    <table>
        <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>Password</th>
            <th>Kelamin</th>
            <th>Aksi</th>
        </tr>
        @foreach ($dosen as $dsn)
            <tr>
                <td>{{ $dsn->id_userdosen }}</td>
                <td>{{ $dsn->nama }}</td>
                <td>{{ $dsn->password }}</td>
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
            </tr>
        @endforeach
    </table>
@endsection
