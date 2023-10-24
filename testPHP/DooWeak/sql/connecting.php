<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sihadir";
try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM mahasiswa";

    $stmt = $connection->query($sql);
    $mahasiswaData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($mahasiswaData) > 0) {
        echo "<h2>Data from Mahasiswa Table:</h2>";
        echo "<ul>";
        foreach ($mahasiswaData as $mahasiswa) {
            echo "<li>ID User: " . $mahasiswa['id_user'] . "</li>";
            echo "<li>Nama: " . $mahasiswa['nama'] . "</li>";
            echo "<li>Kelas: " . $mahasiswa['kelas'] . "</li>";
            echo "<li>Kelamin: " . $mahasiswa['kelamin'] . "</li>";
            echo "<hr>";
        }
        echo "</ul>";
    } else {
        echo "No records found in the Mahasiswa Table.";
    }

    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
