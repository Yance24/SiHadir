@extends('layouts.app') <!-- Pastikan layout Anda sudah disesuaikan -->

@section('content')
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <a href="{{  route('mahasiswa.create') }}">Tambah Mahasiswa</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Password</th>
                    <th>Kelamin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->id_user }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->kelas }}</td>
                    <td>{{ $mhs->password }}</td>
                    <td>{{ $mhs->kelamin }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mhs->id_user) }}">edit</a>
                    </td>
                    <td>
                        <form action="{{ route('mahasiswa.destroy', $mhs->id_user) }}" method="POST">
                            @csrf
                            @method('Delete')
                            <button type="submit" onclick="return confirm('Hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
