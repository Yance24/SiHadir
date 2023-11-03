<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Fitur Pengganti Password</h3>
    <br><br>
    <form action="<?php echo route('validate-login');?>" method="POST">
        @csrf
        Usename: <input type="text" name='id'><br>
        Password: <input type="text" name='pass'><br>
        <input type="Submit">
    </form>
</body>
</html>