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

    //buat melihat data dari variable $account
    // dd($account);

    //buat melihat data dari variable $schedule
    // dd($schedule);

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
            <a href="/change-password">
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
        <p style="font-size: 32px; ;">Halo, <b><?php echo $account->nama; ?></b></p>
        <br>
        <br>

        <!-- Elemen untuk nampilin tulisan "jadwal sekarang" -->
        @if($schedule->count() > 0)
        <!-- Jika ad jadwal hari ini -->
        <h2 style="display: flex; align-items: center;">
            <img src="{{ asset('assets/icon/table4.png') }}" alt="Jadwal Sekarang" style="width: 45px; height: 50px; margin-right: 10px;">
            Jadwal Sekarang
        </h2>
        @else

        <!-- jika tidak ad jadwal hari ini -->
        Tidak ada jadwal hari ini
        @endif

        @foreach ($schedule as $item)
        <br>
        <br>
        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah"><?php echo $item->mataKuliah->nama_makul;?></div>
                <hr class="gariscontainer">
                <div class="jam"><?php echo date('H:i',strtotime($item->jam_mulai)) . ' - ' . date('H:i',strtotime($item->jam_selesai)); ?></div>
            </div>
        </div>

        @endforeach

        <br>
        <br>
        <br>

        <!-- Jika dosen sudah bisa mengakses generate qr -->
        <div class="center-content">

            <!-- Formulir Tersembunyi untuk Redirect -->
            <!-- Tombol Generate QR -->
            @if($enableGenerateButton)

            <form id="redirect-form" action="qr_dosen" method="post">
                @csrf
                <input type="hidden" name="parameter_name" value="parameter_value">
                <!-- Tambahkan parameter sesuai kebutuhan -->
                <button id="generate-qr-button" type='submit'>
                    <img src="{{ asset('assets/icon/qr-code1.svg') }}" alt="Generate QR" style="width: 45px; height: 50px; margin-right:30px; ">
                    <span style="margin-left: 12px; font-size: 24px;">Generate QR</span>
                </button>
            </form>

            @else
            <!-- Jika dosen belum bisa mengakses generate qr -->
            <div class="generateQr-container">
                <!-- Tombol generateQr Tidak tersedia!! -->
            </div>
            @endif


            @if($enableCloseClass)
            <!-- <form action="<?php echo route('close-class')?>" method="POST"> -->
            <label for="close-class-input">
                <div class="close-class">
                    <button id="close-class-button" type='button' onclick="">
                        <span style="margin-left: 70px; font-size: 24px; ">Close Class</span>
                        <!-- <input type="submit" id="close-class-input" style="display: none;"> -->
                    </button>
                </div>
            </label>
            <!-- </form> -->
            @else
            <!-- Jikda dosen belum bisa mengakses generate qr -->
            <div class="close-class-container">
                <!-- Tombol close class tidak tersedia!! -->
            </div>
            @endif
        </div>

        <!-- HTML buat pop up -->
        <div class="main-container">

            <div class="logo-container"></div>

            <div class="keterangan-container">
                Apa anda ingin menutup kelas ini?
            </div>

            <form action="">
            <label for="tidak-input">
                <div class="tidak-button-container">
                    <button>Tidak</button>
                    <input type="submit" id="tidak-input" style="display: none;">
                </div>  
            </label>
            </form>

            <form action="<?php echo route('close-class')?>" method="post">
            @csrf
            <label for="ya-input">
                <div class="Ya-button-container">
                    <button>Ya</button>
                    <input type="submit" id="ya-input" style="display: none;">
                </div>
            </label>
            </form>

        </div>
        

        

        <!-- Patch Generate QR -->
        <div id="qr-patch" class="qr-patch">
            <h1>Generate QR Code</h1>
            <div class="container-fluid">
                <div class="text-center">
                    <!-- Get a Placeholder image initially,
                   this will change with a unique QR Code
                   every time the button is pressed -->
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=UniqueQRCode&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive" alt="QR Code" />
                </div>

                <div class="form-horizontal">
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>


        <!-- <h2 style="display: flex; align-items: center;">
            <img src="{{ asset('assets/icon/table4.png') }}" alt="Jadwal Sekarang" style="width: 45px; height: 50px; margin-right: 10px;">
            Jadwal Selanjutnya
        </h2>
        <br>
        <br>
        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah">PEMROGRAMAN WEB</div>
                <hr class="gariscontainer">
                <div class="jam">12:00 - 16:00</div>
            </div>
        </div>
        <br>
        <br>
        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah">JARINGAN KOMPUTER LANJUT</div>
                <hr class="gariscontainer">
                <div class="jam">16:20 - 18:00</div>
            </div>
        </div> -->
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <script>
        // Ambil tombol Generate QR dan patch Generate QR
        // var generateQRButton = document.getElementById("generate-qr-button");
        // var qrPatch = document.getElementById("qr-patch");

        // // Tambahkan event listener untuk tombol Generate QR
        // generateQRButton.addEventListener("click", function() {
        //     // Tampilkan patch Generate QR saat tombol ditekan
        //     qrPatch.style.display = "block";
        //     // Di sini Anda dapat menambahkan konten untuk patch Generate QR sesuai kebutuhan Anda
        // });


        // // untuk qr code generate
        // // Function to HTML encode the text
        // // This creates a new hidden element,
        // // inserts the given text into it 
        // // and outputs it out as HTML
        // function htmlEncode(value) {
        //     return $('<div/>').text(value)
        //         .html();
        // }

        // $(function() {
        //     // Specify an onclick function for the generate button
        //     $('#generate-qr-button').click(function() {
        //         // Generate a unique QR Code with a random value
        //         let randomValue = Math.random().toString(36).substr(2, 5);
        //         let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' + randomValue + '&chs=160x160&chld=L|0';
        //         // Replace the src of the image with the new QR code
        //         $('.qr-code').attr('src', finalURL);
        //     });
        // });



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
                    window.location.href = "<?php echo route('logout')?>"; // Ganti dengan URL logout Anda
                } else {
                    // Menangani klik tombol "Batal"
                    // Lakukan sesuatu atau berikan perilaku kustom
                }
            });
        });

        // Function to display the SweetAlert2 popup untuk Close Class
        function closeclassButton() {
            Swal.fire({
                title: 'Apa anda ingin menutup kelas ini?',
                icon: 'warning',
                showCancelButton: true, // Menampilkan tombol "Tidak"
                confirmButtonColor: '#7ACC78',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                reverseButtons: true // Memutar urutan tombol
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle "Ya" button click
                    Swal.fire('Validasi berhasil terkirim', '', 'success');
                    removeDataAndAdjustSchedule(); // Call the function to remove data and adjust the schedule

                } else {
                    // Handle "Tidak" button click
                    // Do nothing or provide custom behavior
                }
            });
        }


        //buat redirect generate qr code
        // Tambahkan event listener ke tombol "Generate QR"
        // document.getElementById("generate-qr-button").addEventListener("click", function() {
        //     // Dapatkan formulir tersembunyi
        //     var form = document.getElementById("redirect-form");

        //     // Submit formulir tersembunyi dengan metode POST
        //     form.submit();
        // });

        // Function to remove data and adjust the schedule
        // Function to remove data and adjust the schedule
        // function removeDataAndAdjustSchedule() {
        //     const containerToRemove = document.querySelector('.jadwal-container');
        //     if (containerToRemove) {
        //         const jadwalSekarangContainer = document.querySelector('.content');
        //         const jadwalSelanjutnyaContainers = document.querySelectorAll('.jadwal-container');

        //         const jadwalSekarang = jadwalSelanjutnyaContainers[0];
        //         const jadwalSelanjutnya2 = jadwalSelanjutnyaContainers[1];

        //         if (jadwalSekarang) {
        //             // Remove the current schedule
        //             jadwalSekarang.remove();

        //             // Move the "Jadwal Sekarang" label and details
        //             jadwalSekarangContainer.innerHTML = `
        //             <br>
        //             <p style="font-size: 32px;">Halo, <b><?php echo $account->nama; ?></b></p>
        //             <br>
        //             <br>
        //             <h2 style="display: flex; align-items: center;">
        //             <img src="{{ asset('assets/icon/table4.png') }}" alt="Jadwal Sekarang" style="width: 45px; height: 50px; margin-right: 10px;">
        //             Jadwal Sekarang
        //             </h2>
        //             <br>
        //             <br>
        //             ${jadwalSelanjutnya2.outerHTML}
        //             <br>
                    
        //             <h2 style="display: flex; align-items: center;">
        //             <img src="{{ asset('assets/icon/table4.png') }}" alt="Jadwal Selanjutnya" style="width: 45px; height: 50px; margin-right: 10px;">
        //             Jadwal Selanjutnya
        //             </h2>
        //             <br>
        //             <br>
        //             `;



        //             // Show the remaining schedule(s)
        //             if (jadwalSelanjutnyaContainers.length > 2) {
        //                 const remainingSchedules = Array.from(jadwalSelanjutnyaContainers).slice(2);
        //                 remainingSchedules.forEach(schedule => {
        //                     jadwalSekarangContainer.insertAdjacentElement('beforeend', schedule);
        //                 });
        //             }
        //         }

        //         // Hide the "Generate QR" and "Close Class" buttons
        //         const generateQRButton = document.getElementById('generate-qr-button');
        //         const closeClassButton = document.getElementById('close-class-button');
        //         generateQRButton.style.display = 'none';
        //         closeClassButton.style.display = 'none';

        //         // Set a timer to show the buttons when the new schedule starts
        //         const nextScheduleTime = '12:00'; // Replace this with the next schedule time
        //         const [hours, minutes] = nextScheduleTime.split(':');
        //         const currentDate = new Date();
        //         const nextScheduleDate = new Date();
        //         nextScheduleDate.setHours(hours, minutes, 0, 0);
        //         const timeUntilNextSchedule = nextScheduleDate - currentDate;

        //         setTimeout(() => {
        //             generateQRButton.style.display = 'block';
        //             closeClassButton.style.display = 'block';
        //         }, timeUntilNextSchedule);
        //     }
        // }
    </script>
</body>

</html>