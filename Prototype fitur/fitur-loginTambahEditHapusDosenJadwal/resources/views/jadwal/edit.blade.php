@extends('layouts.app')

@section('content')
    <h1>Edit Mahasiswa</h1>
    <form method="POST" action="{{ route('jadwal.update', $jadwal->id_jadwal) }}">
        @csrf
        @method('PUT')
        
        <!-- Input field untuk primary key yang tidak dapat diubah -->
        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">

        <label for="id_makul">id_makul:</label>
        <select class="form-select" name="id_makul">
            @foreach($makuls as $makul)
                @if (old('id_makul', $jadwal->id_makul) == $makul->id_makul)
                    <option value="{{ $makul->id_makul }}" selected>{{ $makul->nama_makul }}</option>
                @else
                    <option value="{{ $makul->id_makul }}">{{ $makul->nama_makul }}</option>
                @endif
            @endforeach
        </select>

        <label for="id_userdosen">id_userdosen:</label>
        <select class="form-select" name="id_userdosen">
            @foreach($dosens as $dosen)
                @if (old('id_userdosen', $jadwal->id_userdosen) == $dosen->id_userdosen)
                    <option value="{{ $dosen->id_userdosen }}" selected>{{ $dosen->nama }}</option>
                @else
                    <option value="{{ $dosen->id_userdosen }}">{{ $dosen->nama }}</option>
                @endif
            @endforeach
        </select>
        <label for="id_semester">Semester:</label>
        <select class="form-select" name="id_semester">
            @foreach($semesters as $semester)
                @if (old('id_semester', $jadwal->id_semester) == $semester->id_semester)
                    <option value="{{ $semester->id_semester }}" selected>{{ $semester->id_semester }}</option>
                @else
                    <option value="{{ $semester->id_semester }}">{{ $semester->id_semester }}</option>
                @endif
            @endforeach
        </select>

        <label for="id_tahunajar">tahun ajar:</label>
        <select class="form-select" name="id_tahunajar">
            @foreach($tahun_ajars as $tahun)
                @if (old('id_tahunajar', $jadwal->id_tahunajar) == $tahun->id_tahunajar)
                    <option value="{{ $tahun->id_tahunajar }}" selected>{{ $tahun->tahun }}</option>
                @else
                    <option value="{{ $tahun->id_tahunajar }}">{{ $tahun->tahun }}</option>
                @endif
            @endforeach
        </select>

        <label for="hari">hari:</label>
        <input type="text" name="hari" id="hari" value="{{ $jadwal->hari }}">

        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" value="{{ $jadwal->kelas }}">

        <label for="jam_mulai">jam_mulai:</label>
        <input type="time" id="jam_mulai" name="jam_mulai">

        <label for="jam_selesai">jam_selesai:</label>
        <input type="time" id="jam_selesai" name="jam_selesai">
        
        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
