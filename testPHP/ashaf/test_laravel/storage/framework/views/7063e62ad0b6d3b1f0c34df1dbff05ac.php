<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black">
    <h2>INPUT</h2>
    <form action="regis" method="POST">
        <?php echo csrf_field(); ?>
        <input name="nama" type="text" placeholder="nama">
        <input name="id_user" type="text" placeholder="id_user">
        <button>submit</button>
    </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\php\SiHadir\testPHP\ashaf\test_laravel\resources\views/welcome.blade.php ENDPATH**/ ?>