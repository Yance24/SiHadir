@extends('layouts.app')

@section('content')
    <h1>Edit Mahasiswa</h1>
    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id_user) }}">
        @csrf
        @method('PUT')

        <!-- Input field untuk primary key yang tidak dapat diubah -->
        <label for="nama">NIM:</label>
        <input type="text" name="id_user" value="{{ $mahasiswa->id_user }}">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}">

        <label for="password">password:</label>
        <input type="text" name="password" id="password" value="{{ $mahasiswa->password }}">

        <label for="kelamin">kelamin:</label>
        <select class="form-select" name="kelamin">
            <option value="L">laki-laki</option>
            <option value="P">perempuan</option>
        </select>

        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
