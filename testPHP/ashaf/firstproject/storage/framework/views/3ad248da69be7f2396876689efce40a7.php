
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border : 3px solid black">
    <h2>register</h2>
    <form action="/register" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="NIM" placeholder="NIM">
        <input type="text" name="Nama" placeholder="Nama">
        <input type="text" name="Kelas" placeholder="Kelas">
        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="">-- Select Gender --</option>
            <option value="L">Male</option>
            <option value="P">Female</option>
        </select>
        <button>Submit</button>
    </form>
    <br>
    </div><br>
    
    
    <ul>
        <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong>Nama:</strong> <?php echo e($mhs->nama); ?><br>
                <strong>ID User:</strong> <?php echo e($mhs->id_user); ?><br>
                <strong>Kelas:</strong> <?php echo e($mhs->kelas); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <ul>
        <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong>Nama:</strong> <?php echo e($dsn->nama); ?><br>
                <strong>ID User:</strong> <?php echo e($dsn->id_userdosen); ?><br>
                <strong>kelamin:</strong> <?php echo e($dsn->kelamin); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html><?php /**PATH C:\xampp\htdocs\php\SiHadir\testPHP\ashaf\firstproject\resources\views/home.blade.php ENDPATH**/ ?>