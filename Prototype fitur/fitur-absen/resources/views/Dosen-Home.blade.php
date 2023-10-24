<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>Login Sebagai dosen</h3>
        <br><br>
        <?php

        use App\Http\Controllers\TimeControl;

        $homeSchedule = session('homeSchedule');
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
                if($homeSchedule->count() == 0 || TimeControl::compareTime(TimeControl::getTime(),$homeSchedule->first()->jam_mulai,'<')) echo "disabled";
                ?>
            >
                Generate Qr
            </button>
        </form>
    </body>
</html>