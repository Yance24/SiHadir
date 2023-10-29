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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <style>
   .profile-images {
    text-align: center;
    position: relative;

    background-image: url("{{ asset('assets/img/bg-profile.svg') }}");
    width: 330px;
    /* Sesuaikan ukuran gambar sesuai kebutuhan */
    height: 250px;
    /* Sesuaikan tinggi gambar sesuai kebutuhan */
    background-size: cover;
}


       /* CSS untuk SweetAlert2 */
       .swal2-popup {
            text-align: center;
        }
        .swal2-title {
            left: 10px;
            text-align: center; /* Menengahkan teks judul */
            font-size: 24px; /* Ubah ukuran font judul */
            color: #333; /* Ubah warna judul */
            margin-bottom: 20px; /* Atur margin bawah judul */
        }
        .swal2-actions {
            display: flex;
            justify-content: center;
        }
        .swal2-confirm, .swal2-cancel {
            width: 100px;
            margin: 5px;
        }
</style> 
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
            <img src="{{ asset('assets/img/photo-dosen.svg') }}" alt="Foto Anda" class="photo-dosen">

            <!-- Contoh Penggunaan Data $account -->
            <!-- <div class="text-overlay">Ferry Faisal, S.ST., M.T.</div> -->
            <div class="text-overlay"><?php echo $account->nama; ?></div>

            <!-- <div class="text-overlay2">19730206 199501 1 001</div> -->
            <div class="text-overlay2"><?php echo $account->id_userdosen; ?></div>

        </div>

        <div class="nav">
            <a class="active" href="dashboard">
                <img src="{{ asset('assets/icon/table1.svg') }}" alt="Absen">
                <span>Absen</span>
            </a>
            <a href="perizinan">
                <img src="{{ asset('assets/icon/mail1.svg') }}" alt="Perizinan">
                <span>Perizinan</span>
            </a>
            <a href="../ganti-password">
                <img src="{{ asset('assets/icon/lock1.svg') }}" alt="Ganti Password">
                <span>Ganti Password</span>
            </a>
            <hr>
            <a href="../login" id="logoutLink">
                <img src="{{ asset('assets/icon/log-out1.svg') }}" alt="Log Out">
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

        <div class="center-content">
            <button id="generate-qr-button">
                <img src="{{ asset('assets/icon/qr-code%201.svg') }}" alt="Generate QR" style="width: 45px; height: 50px;">
                <span style="margin-left: 12px; font-size: 34px;">Generate QR</span>
        </div>
        </button>
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


    
    //untuk popup alert log out
     // Fungsi untuk menampilkan popup SweetAlert2
     document.getElementById('logoutLink').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari tag anchor

            Swal.fire({
                title: 'Ingin keluar dari aplikasi?',
                icon: 'warning',
                showCancelButton: true, // Menampilkan tombol "Batal"
                confirmButtonColor: '#7ACC78',
                cancelButtonColor: '#d33',
                confirmButtonText: 'YA',
                cancelButtonText: 'TIDAK',
                reverseButtons: true // Memutar urutan tombol
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menangani klik tombol "Ya"
                    Swal.fire('Anda telah keluar', '', 'success');
                    // Tambahkan fungsi logout atau redirect ke halaman logout di sini
                    window.location.href = "../login"; // Ganti dengan URL logout Anda
                } else {
                    // Menangani klik tombol "Batal"
                    // Lakukan sesuatu atau berikan perilaku kustom
                }
            });
        });

    </script>
</body>

</html>