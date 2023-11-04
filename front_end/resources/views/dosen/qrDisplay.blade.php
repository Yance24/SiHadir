<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $account = session()->get('account');

    ?>


    <!-- "Yang aku copy dari dashboard dosen" - Yance -->
    <!-- Pembatas Sidebar -->
    <div class="sidebar">
        <div class="profile-images">
            <img src="{{ asset('assets/img/photo-dosen.svg') }}" alt="Foto Anda" class="photo-dosen">

            <!-- Contoh Penggunaan Data $account -->
            <!-- <div class="text-overlay">Ferry Faisal, S.ST., M.T.</div> -->
            <div class="text-overlay"><?php echo $account->nama; ?></div>

            <!-- <div class="text-overlay2">19730206 199501 1 001</div> -->
            <div class="text-overlay2"><?php echo $account->id_userdosen; ?></div>

        </div>

        <div class="nav">
            <a class="active" href="/dosen/dashboard">
                <img src="{{ asset('assets/icon/table1.svg') }}" alt="Absen">
                <span>Absen</span>
            </a>
            <a href="/dosen/perizinan">
                <img src="{{ asset('assets/icon/mail1.svg') }}" alt="Perizinan">
                <span>Perizinan</span>
            </a>
            <a href="/dosen/ganti-password">
                <img src="{{ asset('assets/icon/lock1.svg') }}" alt="Ganti Password">
                <span>Ganti Password</span>
            </a>
            <hr>
            <a href="/login" id="logoutLink">
                <img src="{{ asset('assets/icon/log-out1.svg') }}" alt="Log Out">
                <span>Log Out</span>
            </a>
        </div>
    </div>
    <!-- Pembatas Sidebar -->

    <!-- Content -->
    <div class="content-container">
        <div class="qr-container">
            <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo session()->get('idQr');?>&chs=160x160&chld=L|0" alt="qr-code here">
        </div>
    </div>
</body>
</html>