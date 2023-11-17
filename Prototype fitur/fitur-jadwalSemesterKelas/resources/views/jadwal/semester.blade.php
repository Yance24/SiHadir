@extends('layouts.app')

@section('content')
    <h1>Data Jadwal</h1>

    <form action="jadwal/kelas/{kelas}" method="get">
        @csrf
        <table>
            <tr>
                <th>Kelas</th>
            </tr>
            @foreach ($semesters as $semester)
                <tr>
                    <td>
                        <button type="submit" value="{{ $loop->iteration }}" name="pilihSemester">semester {{ $semester->id_semester }}</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
    
@endsection
