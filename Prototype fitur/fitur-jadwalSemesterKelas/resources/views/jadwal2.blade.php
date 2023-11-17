@extends('layouts.app')

@section('content')
    <h1>Data Jadwal</h1>

    <a href="{{ route('jadwal.create') }}">Tambah jadwal</a>

    @if ($message)
        <p>{{ $message }}</p>
    @else
    <table>
        <tr style="align-items: center">
            <th>Hari</th>
            <th>Jam Mulai - Jam Selesai</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>Aksi</th>
        </tr>
        @foreach ($jadwal as $jdw)
            <tr style="align-items: center">
                <td>{{ $jdw->hari }}</td>
                <td>{{ $jdw->jam_mulai }} - {{ $jdw->jam_selesai }}</td>
                <td>{{ $jdw->matakuliah->nama_makul }}</td>
                <td>{{ $jdw->dosen->nama }}</td>
                <td>{{ $jdw->kelas }}</td>
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
    @endif
@endsection
