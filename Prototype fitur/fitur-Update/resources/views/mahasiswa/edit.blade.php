@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="id_user">ID User:</label>
                <input type="text" name="id_user" class="form-control" value="{{ $mahasiswa->id_user }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" class="form-control" value="{{ $mahasiswa->kelas }}">
            </div>
            <div class="form-group">
                <label for="kelamin">Kelamin:</label>
                <input type="text" name="kelamin" class="form-control" value="{{ $mahasiswa->kelamin }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
