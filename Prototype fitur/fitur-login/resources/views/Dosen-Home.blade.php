<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>Login Sebagai Dosen</h3>
        <br><br>
        Informasi Akun: <br>
        <?php
            $account = session('account');
            echo "Nim:".$account->id_userdosen."<br>";
            echo "Nama:".$account->Nama."<br>";
        ?>
    </body>
</html>