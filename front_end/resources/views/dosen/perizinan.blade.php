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
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            position:relative;
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 450px;
            height:750px;
            bottom:220px;
            right:150px;
            border-radius:15px;
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
        
        .keterangan-surat {
            font-size:24px;
           display:flex;
           justify-content:center;
           margin-top:10px;

        }

        .close {
            position:relative;
            bottom:610px;
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

        .previewButton {
            position:relative;

            right:100px;
        border-radius: 25px; /* Mengatur border-radius agar tombol memiliki bentuk elips */
        padding: 10px 20px; /* Padding untuk memberi ruang di dalam tombol */
        background-color: #78A2CC;
        width: 236px;
        cursor:pointer;
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
            <!-- Contoh Mahasiswa 1 -->
            <div class="mahasiswa">
                <div class="mahasiswa-info">
                    <div class="nama-mahasiswa">Adi Suryadi</div>
                    <div class="nim-mahasiswa">3202116005</div>
                    <div class="photo-mail">
                        <button class="previewButton" onclick="previewPDF('3202116005')">
                            <div class="icon-text-container"> 
                                <img src="{{ asset('assets/icon/icon-pesan.svg') }}" alt="Izin" class="icon-pesan">
                                <span>Pratinjau Izin</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Contoh Mahasiswa 2 -->
            <div class="mahasiswa">
                <div class="mahasiswa-info">
                <div class="nama-mahasiswa" id="nama-mahasiswa">Adi Suryadi</div>
<div class="nim-mahasiswa" id="nim-mahasiswa">3202116005</div>

                    <div class="photo-mail">
                        <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda" class="photo-mail-perizinan">
                    </div>
                </div>
            </div>

        <!-- Contoh Mahasiswa 2 -->
        <div class="mahasiswa">
                <div class="mahasiswa-info">
                    <div class="nama-mahasiswa">Rizky Ramadhan</div>
                    <div class="nim-mahasiswa">3202116085</div>
                    <div class="photo-mail">
                        <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda" class="photo-mail-perizinan">
                    </div>
                </div>
            </div>
             <!-- Contoh Mahasiswa 2 -->
             <div class="mahasiswa">
                <div class="mahasiswa-info">
                    <div class="nama-mahasiswa">Agustia Lita</div>
                    <div class="nim-mahasiswa">3202116085</div>
                    <div class="photo-mail">
                        <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda" class="photo-mail-perizinan">
                    </div>
                </div>
            </div>
             <!-- Contoh Mahasiswa 2 -->
             <div class="mahasiswa">
                <div class="mahasiswa-info">
                    <div class="nama-mahasiswa">Fahryan</div>
                    <div class="nim-mahasiswa">3202116085</div>
                    <div class="photo-mail">
                        <img src="{{ asset('assets/icon/icon-mail-perizinan.svg') }}" alt="Foto Anda" class="photo-mail-perizinan">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk pratinjau/preview PDF -->
    <div id="previewModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <iframe id="pdfPreview" width="424px" height="619px"></iframe>
            <div class="keterangan-surat">Apakah dokumen tersebut VALID?</div>
            <button class="invalidButton" onclick="invalidButton()">Invalid</button>
            <button class="validButton" onclick="validButton()">Valid</button>
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



// buat pratinjau PDF
        function previewPDF(studentID) {
    // Mendapatkan iframe tempat pratinjau PDF akan ditampilkan
    const pdfPreview = document.getElementById('pdfPreview');

    // Mengganti atribut src iframe dengan URL PDF yang sesuai berdasarkan ID mahasiswa
    const pdfURL = `https://docs.google.com/document/d/1rl-zyxwSaFXnMSvHUiNH_N76rIWv33WQEZcxOT79qWU/edit`;
    pdfPreview.src = pdfURL;

    // Menampilkan modal pratinjau PDF
    const modal = document.getElementById('previewModal');
    modal.style.display = 'block';
}

 // Mengatur fungsi untuk tombol "Invalid" di dalam pratinjau
 const invalidBtn = document.querySelector('.invalidButton');
    invalidBtn.onclick = function() {
        invalidButton();
    };

    // Mengatur fungsi untuk tombol "Valid" di dalam pratinjau
    const validBtn = document.querySelector('.validButton');
    validBtn.onclick = function() {
        validButton();
    };


function closeModal() {
    const modal = document.getElementById('previewModal');
    modal.style.display = 'none';
    const pdfPreview = document.getElementById('pdfPreview');
    pdfPreview.src = ''; // Hentikan pratinjau PDF
}

   

    </script>

</body>

</html>