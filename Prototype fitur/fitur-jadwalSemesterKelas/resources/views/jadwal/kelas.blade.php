@extends('layouts.app')

@section('content')
    <h1>Data Jadwal semester {{ $semester }}</h1>

    <form action="/jadwal2" method="get">
        @csrf
        <input type="hidden" name="semester" value="{{ $semester }}">

        <table>
            <tr>
                <th>Kelas</th>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="pilihKelas" value="5A">Kelas 5A</button>
                </td>
                <td>
                    <button type="submit" name="pilihKelas" value="5B">Kelas 5B</button>
                </td>
                <td>
                    <button type="submit" name="pilihKelas" value="5C">Kelas 5C</button>
                </td>
                <td>
                    <button type="submit" name="pilihKelas" value="5D">Kelas 5D</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
