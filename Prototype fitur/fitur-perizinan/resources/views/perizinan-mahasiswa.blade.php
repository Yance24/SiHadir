<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Terizin sebagai mahasiswa</h3>
    <br><br>
    <?php 

    $hari = session()->get('hari');
    $waktu = session()->get('waktu');
    echo 'hari = '.$hari.'<br>';
    echo 'waktu = '.$waktu.'<br>';

    ?>
    <br><br>

    Jadwal Hari Ini:
    <br>
    <?php
    $jadwal = session()->get('jadwal');

    foreach($jadwal as $item){
        echo 'nama makul = '.$item->mataKuliah->nama_makul.'<br>';
    }

    ?>

    <br><br>
    <form action="<?php echo route('post-perizinan');?>" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name='file' value='file' <?php if($statusIzin) echo 'disabled';?>>
        <input type="submit" value='kirim' <?php if($statusIzin) echo 'disabled';?>>
    </form>

</body>
</html>