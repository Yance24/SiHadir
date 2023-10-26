<!DOCTYPE html>
<html>

<head>
    <title>Contoh Halaman Web PHP</title>
</head>

<body>
    <?php
    // Cek apakah formulir sudah di-submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nama yang diinputkan oleh pengguna
        $nama = $_POST["nama"];
        // Tampilkan salam dengan nama yang diinputkan
        echo "<h1>Halo, " . $nama . "!</h1>";
    }
    ?>

    <h2>Masukkan Nama Anda</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <input type="submit" value="Submit">
    </form>
</body>

</html>