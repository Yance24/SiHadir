<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_dummy_sihadir";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        $connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connection successfull!<br>";
        // echo "Username : ".$_POST["id"]."<br>";
        // echo "Password : ".$_POST["pass"]."<br>";

        $result = $connection->query("select * from siswa where NIM='".$_POST["id"]."'");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
            // echo "account found!";
            $_SESSION["nim"] = $row["NIM"];
            header("Location: loginMahasiswa.php");
            exit();
        }

        $result = $connection->query("select * from dosen where `NIK/NIP`='".$_POST["id"]."'");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
            $_SESSION["nik"] = $row["NIK/NIP"];
            header("Location: loginDosen.php");
            exit();
        }

        // echo "<br>== Table ==<br>";
        // while($row = $result->fetch(PDO::FETCH_ASSOC)){
        //     echo "id : ".$row["NIM"]."| nama : ".$row["nama"]."<br>";
        // }
        $_SESSION["status"] = "failed";
        header("Location: testLogin.php");
        $connection = null;
        exit();
    }catch(PDOException $e){
        echo "Connection failed : ".$e->getMessage();
    }
}
?>