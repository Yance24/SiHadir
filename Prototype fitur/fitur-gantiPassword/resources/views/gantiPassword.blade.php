<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Ganti Password</h3>
    <br><br>
    <form action="<?php echo route('validate-change-password'); ?>" method='POST'>
        @csrf
        Password Lama: <input type="password" name='oldPass'><br>
        Password Baru: <input type="password" name='newPass'><br>
        Ulangi Password Baru: <input type="password" name='repNewPass'><br>
        <input type="submit">
    </form>
</body>
</html>