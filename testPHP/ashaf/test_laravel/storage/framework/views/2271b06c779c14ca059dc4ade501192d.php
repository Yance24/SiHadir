<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tset</title>
</head>

<body>
    <div style="border: 3px solid black">
        <h2>INPUT</h2>
        <form action="regis" method="POST">
            <input name="nama" type="text" placeholder="nama">
            <input name="id_user" type="text" placeholder="id_user">
            <button>submit</button>
        </form>
        <br>
        </div>

    <?php
        $nama = DB::select('select * from mahasiswa');
    ?>

     <ul>
        <?php $__currentLoopData = $nama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong>Nama:</strong> <?php echo e($mhs->nama); ?><br>
                <strong>ID User:</strong> <?php echo e($mhs->id_user); ?><br>
                <strong>Kelas:</strong> <?php echo e($mhs->kelas); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    
     
</body>

</html><?php /**PATH C:\xampp\htdocs\php\SiHadir\testPHP\ashaf\test_laravel\resources\views/testdatabase.blade.php ENDPATH**/ ?>