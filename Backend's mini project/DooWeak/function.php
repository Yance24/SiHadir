<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function writeMsg()
    {
        echo "FUNCTION.<br>";
    }

    writeMsg();
    ?>

    <?php
    function semua($name)
    {
        echo "$name DooWeak.<br>";
    }

    semua("Function1");
    semua("Function2");
    semua("Function3");
    semua("Function4");
    ?>

    <?php
    function kelas($name, $year)
    {
        echo "$name DooWeak. Number in $year<br>";
    }

    kelas("Function", "1");
    kelas("Function", "2");
    kelas("Function", "3");
    kelas("Function", "4");
    ?>



</body>

</html>