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

    use function PHPUnit\Framework\isEmpty;

    $account = session()->get('account');

    //$schedule menyimpan informasi dari jadwal-jadwal yang ada
    //mahasiswa dan dosen akan memiliki jadwal yang berbeda
    $schedule = session()->get('schedule');

    //$dashBoard menyimpan informasi dari jadwal sekarang dan jadwal selanjutnya
    $dashBoard = session()->get('dashboardSchedule');

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
        <!-- Jadwal serta daftar Mahasiswa yang izin-->
        @foreach($parsedPerizinan as $item)
        <!-- info jadwal -->
        <div class="jadwal-container-perizinan">
            <div class="jadwal-info-perizinan">
                <div class="mata-kuliah-perizinan1"><?php echo $item['jadwal']->mataKuliah->nama_makul;?></div>
                <div class="jam-perizinan1"><?php echo date('H:i',strtotime($item['jadwal']->jam_mulai)) . ' - ' . date('H:i',strtotime($item['jadwal']->jam_selesai)); ?></div>
                <hr class="gariscontainer-perizinan1">
            </div>
            
            <!-- Mahasiswa yang izin pada saat jadwal ini -->
            <div class="mahasiswa-container">
                @foreach($item['mahasiswa'] as $absenMahasiswa)
                <div class="mahasiswa">
                    <div class="mahasiswa-info">
                        <div class="nama-mahasiswa"><?php echo $absenMahasiswa->mahasiswa->nama?></div>
                        <div class="nim-mahasiswa"><?php echo $absenMahasiswa->mahasiswa->id_user?></div>
                        <div class="photo-mail">
                            <button class="previewButton" onclick="previewPDF('3202116005')">
                                <div class="icon-text-container">
                                    <span style="font-size: 24px; color: #FFFF; margin-right: 15px;"><b>Pratinjau Izin</b></span>
                                    <img src="{{ asset('assets/icon/icon-pesan.svg') }}" alt="Izin" class="icon-pesan">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        
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
                    removeData(); // Panggil removeData setelah popup ditutup
                    closeModal();

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
                    removeData(); // Panggil removeData setelah popup ditutup
                    closeModal();
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
            // Mengganti atribut src iframe dengan URL PDF yang sesuai berdasarkan ID mahasiswa
            const pdfURL = `{{ asset('assets/img/uud.pdf') }}`;
            document.getElementById('pdfPreview').src = pdfURL;

            // Menampilkan modal pratinjau PDF
            const modal = document.getElementById('previewModal');
            modal.style.display = 'block';

            // Menambahkan kelas 'active' ke elemen mahasiswa yang dipilih
            const selectedMahasiswa = document.querySelector(`[onclick="previewPDF('${studentID}')"]`).closest('.mahasiswa');
            if (selectedMahasiswa) {
                selectedMahasiswa.querySelector('.mahasiswa-info').classList.add('active');
            }
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

        //untuk menutup preview pdf saat tekan yes

        function closeModal() {
            const modal = document.getElementById('previewModal');
            modal.style.display = 'none';
            const pdfPreview = document.getElementById('pdfPreview');
            pdfPreview.src = ''; // Hentikan pratinjau PDF
        }


        // function removeData() {
        //     // Cari elemen yang ingin dihapus
        //     const containerToRemove = document.querySelector('.mahasiswa-info.active');

        //     if (containerToRemove) {
        //         containerToRemove.parentNode.remove(); // Hapus container
        //     }
        // }

        // function untuk menghapus data atau container yang dipilih,dan dipanggil di dalam IF alert
        function removeData() {
            // Cari elemen yang ingin dihapus
            const containerToRemove = document.querySelector('.mahasiswa-info.active');
            if (containerToRemove) {
                containerToRemove.closest('.mahasiswa').remove(); // Hapus container
            }
        }
    </script>

</body>

</html>