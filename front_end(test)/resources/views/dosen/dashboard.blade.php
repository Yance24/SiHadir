<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style-dashboard.css') }}" media="screen and (min-width: 768px)">
    <link rel="stylesheet" href="{{ asset('assets/css/style-android-dashboard.css') }}" media="screen and (max-width: 767px)">
    <link rel="stylesheet" href="{{ asset('assets/css/style-sidebar.css') }}" media="screen and (min-width: 768px)">
    {{-- <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
</head>



<body>

    <?php 

    //$account menyimpan informasi dari akun dosen yang terlogin
    //data dari $account akan berupa field-field dari database dummyny backend
    $account = session()->get('account');

    //$schedule menyimpan informasi dari jadwal-jadwal yang ada
    //mahasiswa dan dosen akan memiliki jadwal yang berbeda
    $schedule = session()->get('schedule');

    //$dashBoard menyimpan informasi dari jadwal sekarang dan jadwal selanjutnya
    $dashBoard = session()->get('dashboardSchedule');

    //buat melihat data dari variable $account
    // dd($account);
    
    //buat melihat data dari variable $schedule
    //dd($schedule);

    //buat melihat data dari variable $dashBoard
    //dd($dashBoard);
    ?>

    <!-- Pembatas Sidebar -->
    <div class="sidebar">
        <div class="profile-images">
            <img src="{{ asset('assets/img/Photo%20Dosen.svg') }}" alt="Foto Anda" class="photo-dosen">

            <!-- Contoh Penggunaan Data $account -->
            <!-- <div class="text-overlay">Ferry Faisal, S.ST., M.T.</div> -->
            <div class="text-overlay"><?php echo $account->nama; ?></div>

            <!-- <div class="text-overlay2">19730206 199501 1 001</div> -->
            <div class="text-overlay2"><?php echo $account->id_userdosen; ?></div>

        </div>

        <div class="nav">
            <a class="active" href="dashboard">
                <img src="{{ asset('assets/icon/table%201.svg') }}" alt="Absen">
                <span>Absen</span>
            </a>
            <a href="perizinan">
                <img src="{{ asset('assets/icon/mail%201.svg') }}" alt="Perizinan">
                <span>Perizinan</span>
            </a>
            <a href="#contact">
                <img src="{{ asset('assets/icon/lock%201.svg') }}" alt="Ganti Password">
                <span>Ganti Password</span>
            </a>
            <hr>
            <a href="#about">
                <img src="{{ asset('assets/icon/log-out%201.svg') }}" alt="Log Out">
                <span>Log Out</span>
            </a>
        </div>
    </div>
    <!-- Pembatas Sidebar -->

    <div class="content">
        <br>
        <p style="font-size: 32px; ;">Halo, <b>Ferry Faisal, S.ST., M.T.</b></p>
        <br>
        <br>
        <h2 style="display: flex; align-items: center;">
            <img src="{{ asset('assets/icon/table%204.png') }}" alt="Jadwal Sekarang"
                style="width: 45px; height: 50px; margin-right: 10px;">
            Jadwal Sekarang
        </h2>

        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah">PBL</div>
                <hr class="gariscontainer">
                <div class="jam">07:00 - 11:00</div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <!-- tombol qr -->
        <div class="center-content">
            <button id="generate-qr-button">
                <img src="{{ asset('assets/icon/qr-code%201.svg') }}" alt="Generate QR" style="width: 45px; height: 50px;">
                <span style="margin-left: 12px; font-size: 34px;">Generate QR</span>
            </button>
        </div>

        <!-- Patch Generate QR -->
        <div id="qr-patch" class="qr-patch">
            <h1>Generate QR Code</h1>
            <div class="container-fluid">
                <div class="text-center">
                    <!-- Get a Placeholder image initially,
                   this will change with a unique QR Code
                   every time the button is pressed -->
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=UniqueQRCode&chs=160x160&chld=L|0"
                        class="qr-code img-thumbnail img-responsive" alt="QR Code" />
                </div>

                <div class="form-horizontal">
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>

        
        <h2 style="display: flex; align-items: center;">
            <img src="{{ asset('assets/icon/table%204.png') }}" alt="Jadwal Sekarang"
                style="width: 45px; height: 50px; margin-right: 10px;">
            Jadwal Selanjutnya
        </h2>
        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah">PEMROGRAMAN WEB</div>
                <hr class="gariscontainer">
                <div class="jam">12:00 - 16:00</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <script>
        // Ambil tombol Generate QR dan patch Generate QR
        var generateQRButton = document.getElementById("generate-qr-button");
        var qrPatch = document.getElementById("qr-patch");

        // Tambahkan event listener untuk tombol Generate QR
        generateQRButton.addEventListener("click", function () {
            // Tampilkan patch Generate QR saat tombol ditekan
            qrPatch.style.display = "block";
            // Di sini Anda dapat menambahkan konten untuk patch Generate QR sesuai kebutuhan Anda
        });


        // untuk qr code generate
        // Function to HTML encode the text
        // This creates a new hidden element,
        // inserts the given text into it 
        // and outputs it out as HTML
        function htmlEncode(value) {
            return $('<div/>').text(value)
                .html();
        }

        $(function () {
            // Specify an onclick function for the generate button
            $('#generate-qr-button').click(function () {
                // Generate a unique QR Code with a random value
                let randomValue = Math.random().toString(36).substr(2, 5);
                let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' + randomValue + '&chs=160x160&chld=L|0';
                // Replace the src of the image with the new QR code
                $('.qr-code').attr('src', finalURL);
            });
        });




    </script>
</body>

</html>