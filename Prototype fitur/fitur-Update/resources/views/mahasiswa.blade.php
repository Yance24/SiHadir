@extends('layouts.app')

@section('content')
    <h1>Data Mahasiswa</h1>

    <a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>

    <table>
        <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>Password</th>
            <th>Kelamin</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->id_user }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->password }}</td>
                <td>{{ $mhs->kelamin }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mhs->id_user) }}">Edit</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id_user) }}">
                        @csrf
                        @method('DELETE')
                        <!-- Tombol konfirmasi penghapusan -->
                        <button type="submit"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
            </tr>
        @endforeach
    </table>
@endsection
