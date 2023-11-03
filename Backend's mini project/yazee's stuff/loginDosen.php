<?php
session_start();
$nik = $_SESSION["nik"];
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
        <h3>login sebagai dosen!</h3>
        <br>
        <?php
        try{
            $connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $connection->query("select * from dosen where `NIK/NIP`='$nik'");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo "Nim : ".$row["NIK/NIP"]."<br>";
            echo "Nama : ".$row["nama"]."<br>";
            // echo "Kelas : ".$row["kelas"]."<br>";
        }catch(PDOException $e){
            echo "Connection Error : ".$e->getMessage();
        }

        ?>

        <form action="testLogin.php" method="POST">
            <button type="submit">Log out</button>
        </form>
    </body>
</html>