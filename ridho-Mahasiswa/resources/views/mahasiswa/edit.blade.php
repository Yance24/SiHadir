@extends('layouts.app') <!-- Pastikan layout Anda sudah disesuaikan -->

@section('content')
    <div class="container">
        <h1>Edit Mahasiswa</h1>
        <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id_user) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_user">ID User</label>
                <input type="text" class="form-control" id="id_user" name="id_user" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="kelamin">Jenis Kelamin</label>
                <select class="form-control" id="kelamin" name="kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
