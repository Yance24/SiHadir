@extends('layouts.app')

@section('content')
    <h1>Create Mahasiswa</h1>
    <form method="POST" action="{{ route('mahasiswa.store') }}">
        @csrf

        <label for="id_user">NIM:</label>
        <input type="text" name="id_user">

        <label for="nama">Nama:</label>
        <input type="text" name="nama">

        <label for="kelamin">kelamin:</label>
        <select class="form-select" name="kelamin">
            <option value="L">laki-laki</option>
            <option value="P">perempuan</option>
        </select>

        {{-- <label for="password">password:</label>
        <input  type="text" name="password"> --}}

        <button type="submit">Simpan Data Mahasiswa</button>
    </form>
@endsection
