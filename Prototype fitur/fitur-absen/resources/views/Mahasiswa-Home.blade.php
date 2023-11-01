<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>Login Sebagai mahasiswa!</h3>
        <br><br>
        <?php
        $homeSchedule = session()->get('schedule');
        foreach($homeSchedule as $item){
            echo "===========<br>";
            echo "nama makul : ".$item->mataKuliah->nama_makul."<br>";
            echo "dosen pengampu : ".$item->dosenAccounts->nama."<br>";
            echo "nik : ".$item->id_userdosen."<br>";
            echo "jam mulai : ".$item->jam_mulai."<br>";
            echo "jam selesai : ".$item->jam_selesai."<br>";
            echo "===========<br>";
        }
        ?>
        <br><br>
        <form action="<?php echo route('sqanQR');?>" method="post">
            @csrf

            <button type="submit"
                <?php
                use App\Http\Controllers\AbsensiController;
                if(AbsensiController::checkEnableQR()) echo "disabled";
                ?>
            >
                Scan QR
            </button>

        </form>
    </body>
</html>