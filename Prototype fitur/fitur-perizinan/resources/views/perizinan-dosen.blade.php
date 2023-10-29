<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>form pengizinan</h3>
    <br><br>
    <?php

    $hari = session()->get('hari');
    $waktu = session()->get('waktu');
    $tanggal = session()->get('tanggal');
    echo 'hari = '.$hari.'<br>';
    echo 'waktu = '.$waktu.'<br>';

    ?>
    <br><br>
    <h3>Jadwal Hari Ini:</h3>
    <br><br>
    <?php
    $jadwal = session()->get('jadwal');
    echo "<form action='".route('preview-izin')."' method='POST'>";
    ?>
    @csrf
    <?php
    echo "<h4>".$jadwal[0]->mataKuliah->nama_makul."</h4><br>";
    foreach($mahasiswaJadwal[0] as $item){
        echo $item['account']->nama;
        if($item['statusIzin'] != 'belum ada') echo "<button type='submit' name='buttonId' value='".encrypt($item['account']->id_user)."'>Preview</button>";
        echo "<br>";
    }
    echo "</form>";


    ?>
</body>
</html>