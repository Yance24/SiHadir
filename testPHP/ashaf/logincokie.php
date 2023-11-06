<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>login with cookie</h1>
    <form action="post" method="post">
        <label for="">Username</label>
        <input type="text" name="username"><br>
        <label for="">password</label>
        <input type="password" name="password"><br>
        <label for="">
            <input type="checkbox" name="setcookie" value="true" id="setcookie">
            remember me</label>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>

</html>
<?php
session_start();
include('statik_variabel.php');


?>