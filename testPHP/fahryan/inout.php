<!DOCTYPE html>
<html>

<head>
    <title>Form PHP</title>
</head>

<body>
    <h1>Form PHP</h1>

    <?php
    // Inisialisasi variabel
    $nama = "";

    // Memeriksa apakah formulir telah dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai dari input "nama" yang dikirimkan
        $nama = $_POST["nama"];
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nama: <input type="text" name="nama">
        <input type="submit" value="Submit">
    </form>

    <?php
    // Menampilkan hasil input
    if ($nama != "") {
        echo "<h2>Halo, " . $nama . "!</h2>";
    }
    ?>
</body>

</html>