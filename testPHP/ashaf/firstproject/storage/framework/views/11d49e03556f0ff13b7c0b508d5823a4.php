
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Login admin</h1>
    
    <form action="/regisadmin" method="POST">
        <?php echo csrf_field(); ?>
        <label for="">Id Admin</label>
        <input type="text" name="id_admin" autofocus><br>
        <label for="">Password</label>
        <input type="password" name="password"><br>
        <button>Submit</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\php\SiHadir\testPHP\ashaf\firstproject\resources\views/loginadmin.blade.php ENDPATH**/ ?>