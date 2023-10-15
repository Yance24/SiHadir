<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>== Form Login == </h3>
        <br>
        <form action="<?php echo route('login-validation')?>" method="post">
            @csrf
            Username: <input type="text" name="id"><br>
            Password: <input type="text" name="pass"><br>
            <br>
            <br><br>
            <input type="submit">
        </form>
    </body>
</html>