<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "coba";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $filename = $_FILES["fileToUpload"]["name"];
    $file_type = $_FILES["fileToUpload"]["type"];

    // Simpan file di sistem file
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($filename);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // File berhasil diunggah, simpan referensi dalam database
        $sql = "INSERT INTO files (filename, file_type) VALUES ('$filename', '$file_type')";

        if ($conn->query($sql) === TRUE) {
            echo "File berhasil diunggah dan referensi disimpan dalam database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

$conn->close();
?>
