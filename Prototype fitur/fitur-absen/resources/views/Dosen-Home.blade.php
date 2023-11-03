<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>Login Sebagai dosen</h3>
        <br><br>
        <?php

        use App\Http\Controllers\AbsensiController;

        $homeSchedule = session()->get('schedule');
        foreach($homeSchedule as $item){
            echo "===========<br>";
            echo "Nama makul : ".$item->mataKuliah->nama_makul."<br>";
            echo "Kelas : ".$item->kelas."<br>";
            echo "jam_mulai : ".$item->jam_mulai."<br>";
            echo "jam_selesai : ".$item->jam_selesai."<br>";
            echo "===========<br>";
        }
        ?>
        <br><br>
        <form action="<?php echo route('generateQr');?>" method="post">
            @csrf
            <button type="submit"
                <?php
                if(AbsensiController::checkEnableQR()) echo "disabled";
                ?>
            >
                Generate Qr
            </button>
        </form>

        <form action="<?php echo route('tutupMakul');?>" method='POST'>
            @csrf
            <button type="submit">
                Tutup Makul
            </button>
            
        </form>
    </body>
</html>