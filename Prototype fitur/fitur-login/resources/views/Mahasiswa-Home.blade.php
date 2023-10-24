<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>Login Sebagai Mahasiswa</h3>
        <br><br>
        Informasi Akun: <br>
        <?php
            $account = session('account');
            echo "Nim:".$account->id_user."<br>";
            echo "Nama:".$account->nama."<br>";
            echo "Kelas:".$account->kelas."<br>";
        ?>
    </body>
</html>