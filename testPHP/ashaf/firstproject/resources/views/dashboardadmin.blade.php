<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <p>halo</p>
    @foreach ($account as $item)
        <p>{{ $item->nama }}</p>
    @endforeach --}}
    @csrf
    
    <h1>data anggota</h1>
    <form action="datamahasiswa">
        @csrf
        <button>Data Mahasiswa</button>
    </form><br>
    <form action="datadosen">
        @csrf
        <button>Data Dosen</button>
    </form><br>
    <form action="/logout." method="POST">
        @csrf
        <button>Logout</button>
    </form>
</body>
</html>