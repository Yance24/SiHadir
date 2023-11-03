@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Mahasiswa</h2>
        <form action="{{ route('mahasiswa.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_user">ID User:</label>
                <input type="text" name="id_user" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" class="form-control">
            </div>
            <div class="form-group">
                <label for="kelamin">Kelamin:</label>
                <input type="text" name="kelamin" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
