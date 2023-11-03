@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->id_user }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->kelas }}</td>
                        <td>{{ $mahasiswa->kelamin }}</td>
                    </tr>
                @endforeach

                <td>
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>

            </tbody>
        </table>
    </div>
@endsection
