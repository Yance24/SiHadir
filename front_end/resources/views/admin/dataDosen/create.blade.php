<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nama Aplikasi Anda</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
    
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="container">
            <h1>Create Dosen</h1>
            <form method="POST" action="{{ route('dosen.store') }}">
                @csrf
                
                <label for="id_userdosen">NIK:</label>
                <input type="text" name="id_userdosen" >

                <label for="nama">Nama:</label>
                <input type="text" name="nama" >

                <label for="kelamin">kelamin:</label>
                <select class="form-select" name="kelamin">
                        <option value="L">laki-laki</option>
                        <option value="P">perempuan</option>
                </select>
                
                <button type="submit">Simpan Data dosen</button>
            </form>
        </div>
    </main>

    <footer>
        <!-- Footer Anda di sini -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
