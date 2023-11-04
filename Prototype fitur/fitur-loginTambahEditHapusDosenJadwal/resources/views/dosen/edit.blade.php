@extends('layouts.app')

@section('content')
    <h1>Edit Dosen</h1>
    <form method="POST" action="{{ route('dosen.update', $dosen->id_userdosen) }}">
        @csrf
        @method('PUT')
        
        <!-- Input field untuk primary key yang tidak dapat diubah -->
        <label for="nama">NIK:</label>
        <input type="text" name="id_userdosen" value="{{ $dosen->id_userdosen }}">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $dosen->nama }}">

        <label for="password">password:</label>
        <input type="text" name="password" id="password" value="{{ $dosen->password }}">

        <label for="kelamin">kelamin:</label>
        <select class="form-select" name="kelamin">
                <option value="L">laki-laki</option>
                <option value="P">perempuan</option>
        </select>
        
        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
