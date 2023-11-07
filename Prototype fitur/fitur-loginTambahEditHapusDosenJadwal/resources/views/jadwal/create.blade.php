@extends('layouts.app')

@section('content')
    <h1>Edit Mahasiswa</h1>
    <form method="POST" action="{{ route('jadwal.store') }}">
        @csrf
        <!-- Input field untuk primary key yang tidak dapat diubah -->
        {{-- <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}"> --}}
        <label for="id_makul">id_makul:</label>
        <select class="form-select" name="id_makul">
            @foreach($makuls as $makul)
                <option value="{{ $makul->id_makul }}">{{ $makul->nama_makul }}</option>
            @endforeach
        </select>

        <label for="id_userdosen">id_userdosen:</label>
        <select class="form-select" name="id_userdosen">
            @foreach($dosens as $dosen)
                <option value="{{ $dosen->id_userdosen }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>
        <label for="id_semester">Semester:</label>
        <select class="form-select" name="id_semester">
            @foreach($semesters as $semester)
                <option value="{{ $semester->id_semester }}">{{ $semester->id_semester }}</option>  
            @endforeach
        </select>

        <label for="id_tahunajar">tahun ajar:</label>
        <select class="form-select" name="id_tahunajar">
            @foreach($tahun_ajars as $tahun)
                <option value="{{ $tahun->id_tahunajar }}">{{ $tahun->tahun }}</option>   
            @endforeach
        </select>

        <label for="hari">hari:</label>
        <input type="text" name="hari" id="hari">

        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas">

        <label for="jam_mulai">jam_mulai:</label>
        <input type="time" id="jam_mulai" name="jam_mulai">

        <label for="jam_selesai">jam_selesai:</label>
        <input type="time" id="jam_selesai" name="jam_selesai">
        
        <button type="submit">Simpan Jadwal</button>
    </form>
@endsection
