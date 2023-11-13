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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
                            <!-- <button class="previewButton" onclick="previewPDF('3202116005')"> -->
                            <button class="previewButton" onclick="showPreviewPopUp('<?php echo $absenMahasiswa->id_jadwal;?>','<?php echo $absenMahasiswa->id_absenMahasiswa;?>')">
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

        function showPreviewPopUp(idJadwal,idUser){
            Swal.fire({
                html:
                    '<div class="model-content">'+
                        '<iframe id="pdfPreview" width="424px" height="619px" src="/dosen/perizinan/'+idUser+'"></iframe>'+
                        '<div class="keterangan-surat"><span>Apakah dokumen tersebut <b>VALID?</b></span></div>'+
                    '</div>'
                ,

                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Valid',
                cancelButtonText: 'Invalid',
                confirmButtonColor: '#7ACC78',
                cancelButtonColor: '#FC4B4B',
                reverseButtons: true,
            }).then((result) => {
                if(result.isConfirmed){

                    let formData = new FormData();

                    formData.append('_token','<?php echo csrf_token()?>');
                    formData.append('idJadwal',idJadwal);
                    formData.append('idUser',idUser);

                    $.ajax({
                        url: '/dosen/perizinan/validateIzin',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({
                                    text: 'validasi berhasil terkirim',
                                    icon: 'success',
                                    confirmButtonColor: '#7ACC78',
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }else{
                                Swal.fire({
                                    text: 'validasi tidak berhasil dikirim!',
                                    icon: 'error',
                                    confirmButtonColor: '#7ACC78',
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }
                        }
                    });
                }else if(result.dismiss === Swal.DismissReason.cancel){

                    let formData = new FormData();

                    formData.append('_token','<?php echo csrf_token()?>');
                    formData.append('idJadwal',idJadwal);
                    formData.append('idUser',idUser);

                    $.ajax({
                        url: '/dosen/perizinan/invalidateIzin',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({
                                    text: 'invalidasi berhasil terkirim',
                                    icon: 'success',
                                    confirmButtonColor: '#7ACC78',
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }else{
                                Swal.fire({
                                    text: 'invalidasi tidak berhasil dikirim!',
                                    icon: 'error',
                                    confirmButtonColor: '#7ACC78',
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }
                        }
                    });
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