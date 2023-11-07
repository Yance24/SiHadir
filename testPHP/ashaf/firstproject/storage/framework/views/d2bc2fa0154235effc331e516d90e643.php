<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php echo csrf_field(); ?>
    
    <h1>data anggota</h1>
    <form action="datamahasiswa">
        <?php echo csrf_field(); ?>
        <button>Data Mahasiswa</button>
    </form><br>
    <form action="datadosen">
        <?php echo csrf_field(); ?>
        <button>Data Dosen</button>
    </form><br>
    <form action="/logout." method="POST">
        <?php echo csrf_field(); ?>
        <button>Logout</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\php\SiHadir\testPHP\ashaf\firstproject\resources\views/dashboardadmin.blade.php ENDPATH**/ ?>