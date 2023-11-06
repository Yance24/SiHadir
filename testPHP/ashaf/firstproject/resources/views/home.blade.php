
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border : 3px solid black">
    <h2>register</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="NIM" placeholder="NIM">
        <input type="text" name="Nama" placeholder="Nama">
        <input type="text" name="Kelas" placeholder="Kelas">
        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="">-- Select Gender --</option>
            <option value="L">Male</option>
            <option value="P">Female</option>
        </select>
        <button>Submit</button>
    </form>
    <br>
    </div><br>
    {{-- <form action="/dashboardadmin" method="POST">
        <button>submit</button>
        </form> --}}
    
    <ul>
        @foreach ($mahasiswa as $mhs)
            <li>
                <strong>Nama:</strong> {{ $mhs->nama }}<br>
                <strong>ID User:</strong> {{ $mhs->id_user }}<br>
                <strong>Kelas:</strong> {{ $mhs->kelas }}
            </li>
        @endforeach
    </ul>
    <ul>
        @foreach ($dosen as $dsn)
            <li>
                <strong>Nama:</strong> {{ $dsn->nama }}<br>
                <strong>ID User:</strong> {{ $dsn->id_userdosen }}<br>
                <strong>kelamin:</strong> {{ $dsn->kelamin }}
            </li>
        @endforeach
    </ul>
</body>
</html>