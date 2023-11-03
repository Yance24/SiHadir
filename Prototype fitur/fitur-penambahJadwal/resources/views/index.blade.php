<h1>Data Jadwal</h1>
<table>
    <button class="btn btn-primary" onclick="window.location.href='/jadwal/create'">Tambah Jadwal</button>
    <thead>
        <tr>
            <th>ID Jadwal</th>
            <th>ID Makul</th>
            <th>ID User Dosen</th>
            <th>ID Semester</th>
            <th>ID Tahun Ajar</th>
            <th>Hari</th>
            <th>Kelas</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwals as $jadwal)
        <tr>
            <td>{{ $jadwal->id_jadwal }}</td>
            <td>{{ $jadwal->id_makul }}</td>
            <td>{{ $jadwal->id_userdosen }}</td>
            <td>{{ $jadwal->id_semester }}</td>
            <td>{{ $jadwal->id_tahunajar }}</td>
            <td>{{ $jadwal->hari }}</td>
            <td>{{ $jadwal->kelas }}</td>
            <td>{{ $jadwal->jam_mulai }}</td>
            <td>{{ $jadwal->jam_selesai }}</td>
        </tr>
        @endforeach
    </tbody>


</table>