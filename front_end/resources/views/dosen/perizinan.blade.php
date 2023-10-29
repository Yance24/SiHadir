<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-perizinan.css') }}" media="screen and (min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-sidebar.css') }}" media="screen and (min-width: 768px)">
    {{-- <link rel="stylesheet" type="text/css" href="styles/style-android.css" media="screen and (max-width: 767px)"> --}}
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Gaya CSS untuk tampilan popup */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .modal-button-container {
            text-align: center;
            margin-top: 20px;
        }

        .modal-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        /* Gaya CSS untuk pesan validasi */
        .validation-message {
            font-weight: bold;
        }

        .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: initial;
            background-image: initial;
            background-color: #7AAC78;
            color: #fff;
            font-size: 1em;
        }

        

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
    <!-- Pembatas Sidebar -->
    <div class="sidebar">
        <div class="profile-images">
            <img src="{{ asset('assets/img/photo-dosen.svg') }}" alt="Foto Anda" class="photo-dosen">
            <div class="text-overlay">Ferry Faisal, S.ST., M.T.</div>
            <div class="text-overlay2">19730206 199501 1 001</div>

        </div>

        <div class="nav">
            <a href="dashboard">
                <img src="{{ asset('assets/icon/table1.svg') }}" alt="Absen">
                <span>Absen</span>
            </a>
            <a class="active" href="perizinan">
                <img src="{{ asset('assets/icon/mail1.svg') }}" alt="Perizinan">
                <span>Perizinan</span>
            </a>
            <a href="#contact">
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
    <div class="content-perizinan">
        <div class="jadwal-container-perizinan">
            <div class="jadwal-info-perizinan">
                <div class="mata-kuliah-perizinan1">PBL</div>
                <div class="jam-perizinan1">07:00 - 12:00</div>
                <hr class="gariscontainer-perizinan1">
            </div>
            <div class="mahasiswa-container">
                <div class="mahasiswa">
                    <div class="mahasiswa-info">
                        <div class="nama-mahasiswa">Adi Suryadi</div>
                        <div class="nim-mahasiswa">3202116005</div>
                        <div class="photo-mail">
                            <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda"
                                class="photo-mail-perizinan">
                        </div>
                    </div>
                    <div class="expand-content">
                        <button class="invalidButton" onclick="invalidButton()">Invalid</button>
                        <button class="validButton" onclick="validButton()">Valid</button>
                    </div>
                </div>

                <div class="mahasiswa">
                    <div class="mahasiswa-info">
                        <div class="nama-mahasiswa">Agustia Lita</div>
                        <div class="nim-mahasiswa">3202116085</div>
                        <div class="photo-mail">
                            <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda"
                                class="photo-mail-perizinan">
                        </div>
                    </div>
                    <div class="expand-content">
                        <button class="invalidButton" onclick="invalidButton()">Invalid</button>
                        <button class="validButton" onclick="validButton()">Valid</button>
                    </div>
                </div>
                <div class="mahasiswa">
                    <div class="mahasiswa-info">
                        <div class="nama-mahasiswa">Rizky Ramadhan</div>
                        <div class="nim-mahasiswa">3202116004</div>
                        <div class="photo-mail">
                            <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda"
                                class="photo-mail-perizinan">
                        </div>
                    </div>
                    <div class="expand-content">
                        <button class="invalidButton" onclick="invalidButton()">Invalid</button>
                        <button class="validButton" onclick="validButton()">Valid</button>
                    </div>

                </div>
                <div class="mahasiswa">
                    <div class="mahasiswa-info">
                        <div class="nama-mahasiswa">Fahryan</div>
                        <div class="nim-mahasiswa">3202116051</div>
                        <div class="photo-mail">
                            <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda"
                                class="photo-mail-perizinan">
                        </div>
                    </div>
                    <div class="expand-content">
                        <button class="invalidButton" onclick="invalidButton()">Invalid</button>
                        <button class="validButton" onclick="validButton()">Valid</button>
                    </div>
                </div>
                <div class="mahasiswa">
                    <div class="mahasiswa-info">
                        <div class="nama-mahasiswa">Fahryan</div>
                        <div class="nim-mahasiswa">3202116051</div>
                        <div class="photo-mail">
                            <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda"
                                class="photo-mail-perizinan">
                        </div>
                    </div>
                    <div class="expand-content">
                        <button class="invalidButton" onclick="invalidButton()">Invalid</button>
                        <button class="validButton" onclick="validButton()">Valid</button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        
        <div class="jadwal-container-perizinan2">
            <div class="jadwal-info-perizinan">
                <div class="mata-kuliah-perizinan2">Pemrograman Web</div>
                <hr class="gariscontainer-perizinan2">
                <div class="jam-perizinan2">14:00 - 16:00</div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const mahasiswaElements = document.querySelectorAll(".mahasiswa");
            console.log(mahasiswaElements);
            mahasiswaElements.forEach(function (mahasiswa) {
                const expandContent = mahasiswa.querySelector(".expand-content");
                const validButton = mahasiswa.querySelector(".valid-button");
                const invalidButton = mahasiswa.querySelector(".invalid-button");
                mahasiswa.addEventListener("click", function () {

                    mahasiswaElements.forEach(function (element) {
                        if (element !== mahasiswa) {
                            element.querySelector(".expand-content").style.display = "none";
                        }
                    });

                    if (expandContent.style.display === "none" || expandContent.style.display === "") {
                        expandContent.style.display = "block";
                        validButton.style.display = "inline";
                        invalidButton.style.display = "inline";
                    } else {
                        expandContent.style.display = "none";
                        validButton.style.display = "none";
                        invalidButton.style.display = "none";
                    }
                });

            });
        });



        //untuk popup alert invalid dan valid
         // Function to display the SweetAlert2 popup
         function invalidButton() {
            Swal.fire({
                title: 'Anda tidak mengizinkan izin tersebut?',
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


                    // Clear the name data here
                } else {
                    // Handle "Tidak" button click
                    // Do nothing or provide custom behavior
                }
            });
        }

        // Function to display the SweetAlert2 popup
        function validButton() {
            Swal.fire({
                title: 'Anda mengizinkan izin tersebut?',
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
                    // Clear the name data here
                } else {
                    // Handle "Tidak" button click
                    // Do nothing or provide custom behavior
                }
            });
        }
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