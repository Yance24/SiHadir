<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
</head>

<body>
    <?php
    // Inisialisasi variabel
    $pesan = "Masukkan username dan password anda";

    // formulir 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // nilai username dan password yang diinputkan oleh pengguna
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Verifikasi username dan password
        if ($username === "satria" && $password === "kampret123") {
            header("Location: fajri1.php");
            $pesan = "Selamat datang, " . $username . "!";
        } else {
            $pesan = "Username atau password salah. Coba lagi.";
        }
    }

    ?>

    <?php
    $nilai = 75;
    // contoh percabangan
    if ($nilai >= 80) {
        echo "Nilai Anda adalah A";
    } else if ($nilai >= 70) {
        echo "Nilai Anda adalah B";
    } else if ($nilai >= 60) {
        echo "Nilai Anda adalah C";
    } else if ($nilai >= 50) {
        echo "Nilai Anda adalah D";
    } else {
        echo "Nilai Anda adalah E";
    }

    // contoh perulangan
    for ($i = 1; $i <= 5; $i++) {
        echo "Iterasi ke-$i <br>";
    }

    ?>

    <?php echo $_SERVER["PHP_SELF"]; ?>


    <h2>Halaman Login</h2>
    <p><?php echo $pesan; ?></p>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">


    </form>
</body>

</html>