<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Data</title>
</head>
<body>  
    <h1> Kelas {{ $class }}</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Kelamin</th>
                <th>Jumlah Sakit</th>
                <th>Jumlah Izin</th>
                <th>Jumlah Alpa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataForClass as $data)
                <tr>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->id_user }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->kelamin }}</td>
                    <td>{{ $data->jumlah_sakit }}</td>
                    <td>{{ $data->jumlah_izin }}</td>
                    <td>{{ $data->jumlah_alpa }}</td>
                    <td>{{ $data->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>