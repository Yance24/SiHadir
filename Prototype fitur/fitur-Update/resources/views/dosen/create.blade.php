@extends('layouts.app')

@section('content')
    <h1>Create Dosen</h1>
    <form method="POST" action="{{ route('dosen.store') }}">
        @csrf

        <label for="id_userdosen">NIK:</label>
        <input type="text" name="id_userdosen">

        <label for="nama">Nama:</label>
        <input type="text" name="nama">

        <label for="kelamin">kelamin:</label>
        <select class="form-select" name="kelamin">
            <option value="L">laki-laki</option>
            <option value="P">perempuan</option>
        </select>

        {{-- <label for="password">password:</label>
        <input  type="text" name="password"> --}}

        <button type="submit">Simpan Data dosen</button>
    </form>
@endsection
