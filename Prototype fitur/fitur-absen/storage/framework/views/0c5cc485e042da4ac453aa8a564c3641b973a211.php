<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>== Fitur Absen == </h3>
        <br>
        <form action="<?php echo route('login-validation');?>" method="post">
            <?php echo csrf_field(); ?>
            Nim : <input type="text" name="id"><br>
            Hari : <input type="text" name="hari"><br>
            Waktu : <input type="text" name="waktu"><br>
            Tanggal : <input type="text" name="tanggal"><br>
            <br>
            <input type="submit">
        </form>
    </body>
</html><?php /**PATH C:\xampp\htdocs\web-projects\SiHadir\Prototype fitur\fitur-absen\resources\views/login.blade.php ENDPATH**/ ?>