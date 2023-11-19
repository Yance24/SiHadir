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
            <h1>Edit Admin</h1>
            <form method="POST" action="{{ route('admin.update', $admin->id_admin) }}">
                @csrf
                @method('PUT')
                
                <!-- Input field untuk primary key yang tidak dapat diubah -->
                <label for="id_admin">ID:</label>
                <input type="text" name="id_admin" value="{{ $admin->id_admin }}">

                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="{{ $admin->nama }}">

                <label for="password">Password:</label>
                <input type="text" name="password" id="password" value="{{ $admin->password }}">

                <label for="kelamin">kelamin:</label>
                <select class="form-select" name="kelamin">
                        <option value="L">laki-laki</option>
                        <option value="P">perempuan</option>
                </select>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </main>

    <footer>
        <!-- Footer Anda di sini -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
