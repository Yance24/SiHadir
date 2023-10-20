<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>== Fitur Absen == </h3>
        <br>
        <form action="<?php echo route('login-validation');?>" method="post">
            @csrf
            Nim : <input type="text" name="id"><br>
            Hari : <input type="text" name="hari"><br>
            Waktu : <input type="text" name="waktu"><br>
            <br>
            <input type="submit">
        </form>
    </body>
</html>