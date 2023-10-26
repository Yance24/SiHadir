<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <!-- output -->
    <?php
    echo "== output ==<br>";
    echo "uses echo / echo() and <br>print() to display text on a website<br>";
    echo("tes echo()<br>");
    print("tes print()<br>");
    ?>

    <br>

    <!-- variable -->
    <?php
    echo "== variable ==<br>";
    $x = 10;
    $y = 20;
    $result = $x + $y;
    echo "x = ".$x."<br>";
    echo "y = ".$y."<br>";
    echo "result = ".$result."<br>";
    ?>

    <br>
    
    <!-- input -->
    == input == <br>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <!-- <form action="processInput.php" method="post"> -->
        Nama: <input name="nama" type="text"><br>
        <button type="submit" name="clear_nama">Clear</button>
        <button type="submit" name="submit_nama">Submit</button>
    </form>

    <!-- <p id="namaui"></p> -->

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // $nama = $_POST["nama"];
        // echo "before unset = ".$nama;
        // // echo "<br>submit nama = ".$_POST["submit_nama"];
        // if(isset($_POST["nama"])) echo "<br>after unset = ".$nama;
        // unset($_POST["nama"]);
        // echo "<br>tes";

        if(isset($_POST["clear_nama"])){
            echo "<br>clear nama";
        }
        if(isset($_POST["submit_nama"])){
            echo "<br>submit nama";
        }
    }

    // if(isset($nama)) echo "<br>outside = ".$nama;

    ?>

    <!-- <?php
    $counterFilePath = "counter.txt";

    function getCounter(){
        global $counterFilePath;
        $contentFile = file_exists($counterFilePath) ? intval(file_get_contents($counterFilePath)) : 0;
        return $contentFile;
    }

    function setCounter($counter){
        global $counterFilePath;
        file_put_contents($counterFilePath,$counter);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["submit_nama"]))
            $nama = $_POST["nama"];
        unset($_POST["submit_nama"]);
        unset($_POST["nama"]);
    }

    if(isset($nama)){
       echo "nama anda : ".$nama;
       unset($nama);
    }


    $counter = getCounter();
    echo "<br>counter = ".$counter;
    $counter++;
    setCounter($counter);
    ?> -->



</body>

</html>