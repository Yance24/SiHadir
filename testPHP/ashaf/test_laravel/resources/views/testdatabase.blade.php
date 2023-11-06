<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tset</title>
</head>

<body>
    <div style="border: 3px solid black">
        <h2>INPUT</h2>
        <form action="regis" method="POST">
            <input name="nama" type="text" placeholder="nama">
            <input name="id_user" type="text" placeholder="id_user">
            <button>submit</button>
        </form>
        <br>
        </div>

    <?php
        $nama = DB::select('select * from mahasiswa');
    ?>

     <ul>
        @foreach ($nama as $mhs)
            <li>
                <strong>Nama:</strong> {{ $mhs->nama }}<br>
                <strong>ID User:</strong> {{ $mhs->id_user }}<br>
                <strong>Kelas:</strong> {{ $mhs->kelas }}
            </li>
        @endforeach
    </ul>

    
     {{-- <h1>Mahasiswa Data</h1>
     <ul>
        @foreach ($mahasiswas as $mahasiswa)
            <li>
                <strong>ID User:</strong> {{ $mahasiswa->id_user }}<br>
                <strong>Nama:</strong> {{ $mahasiswa->nama }}<br>
                <strong>Kelas:</strong> {{ $mahasiswa->kelas }}
            </li>
        @endforeach
    </ul> --}}
</body>

</html>