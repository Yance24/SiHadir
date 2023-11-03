<?php
session_start();
$nim = $_SESSION["nim"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_dummy_sihadir";
?>

<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <h3>login sebagai mahasiswa!</h3>
        <br>
        <?php
        try{
            $connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $connection->query("select * from siswa where NIM='$nim'");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo "Nim : ".$row["NIM"]."<br>";
            echo "Nama : ".$row["nama"]."<br>";
            echo "Kelas : ".$row["kelas"]."<br>";
        }catch(PDOException $e){
            echo "Connection Error : ".$e->getMessage();
        }

        ?>

        <form action="testLogin.php" method="POST">
            <button type="submit">Log out</button>
        </form>
    </body>
</html>