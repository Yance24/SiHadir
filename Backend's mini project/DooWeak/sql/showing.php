<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sihadir";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the form was submitted

        // Retrieve the id_user from the POST request
        $id_user = $_POST["id_user"];

        // Query the mahasiswa table with the provided id_user
        $sql = "SELECT * FROM mahasiswa WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<h2>Selamat Datang</h2>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "Name: " . $row['nama'] . "<br>";
                echo "Kelas: " . $row['kelas'] . "<br>";
                echo "Kelamin: " . $row['kelamin'] . "<br>";
                // Add more fields as needed
            }
        } else {
            echo "No records found for ID User: $id_user";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
