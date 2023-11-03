<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai yang dikirimkan melalui POST
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    // Menampilkan hasil
    echo "Halo, $nama! Email Anda adalah: $email";
}
?>