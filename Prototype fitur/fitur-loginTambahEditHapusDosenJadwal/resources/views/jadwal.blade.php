@extends('layouts.app')

@section('content')
    <h1>Data Jadwal</h1>

    <a href="{{ route('jadwal.create') }}">Tambah jadwal</a>

    <table>
        <tr>
            <th>ID Jadwal</th>
            <th>ID Makul</th>
            <th>ID User Dosen</th>
            <th>ID Semester</th>
            <th>ID Tahun Ajar</th>
            <th>Hari</th>
            <th>Kelas</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Aksi</th>
        </tr>
        @foreach ($jadwal as $jdw)
            <tr>
                <td>{{ $jdw->id_jadwal }}</td>
                <td>{{ $jdw->id_makul }}</td>
                <td>{{ $jdw->id_userdosen }}</td>
                <td>{{ $jdw->id_semester }}</td>
                <td>{{ $jdw->id_tahunajar }}</td>
                <td>{{ $jdw->hari }}</td>
                <td>{{ $jdw->kelas }}</td>
                <td>{{ $jdw->jam_mulai }}</td>
                <td>{{ $jdw->jam_selesai }}</td>
                <td>
                    <a href="{{ route('jadwal.edit', $jdw->id_jadwal) }}">Edit</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('jadwal.destroy', $jdw->id_jadwal) }}">
                        @csrf
                        @method('DELETE')
                        <!-- Tombol konfirmasi penghapusan -->
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
            </tr>
        @endforeach
    </table>
@endsection
