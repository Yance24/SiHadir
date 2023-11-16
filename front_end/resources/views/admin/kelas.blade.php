<!DOCTYPE html>
<html lang="en">
<head>

    <!-- IMPORT STUFF DO NOT DELETE!!!!! -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <!---->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- Side Nav Bar -->
    <div class="navBar-container">

        <div class="navBar-Title-container">
            <h4>SiHadir Admin</h4>            
        </div>

        <br>

        <div class="navBar-Item-Container">
            <div class="dashboard-container">
                <a href="/admin/dashboard">Dashboard</a>
            </div>

            <div class="schedule-container">
                <a href="/admin/schedule">Schedule</a>
            </div>

            <div class="user-container">
                <a href="/admin/userData">User Data</a>
            </div>

            <div class="attendance-container">
                <a href="/admin/attendanceRecap">Attendance Recap</a>
            </div>

            <div class="logout-container">
                <a href="/logout">Logout</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-container">

        <!-- Keterangan Jadwal Kelas Mana -->
        <div class="keterangan-kelas-container">
            <h4>Jadwal akademik - Kelas <?php echo $semester.$kelas?></h4>
        </div>

        <div class="base-container">

            <label for="tambah-jadwal-input">
                <div class="tambah-button-container">
                    <button id="tambah-jadwal-input" onclick="addJadwal()">Tambah</button>
                </div>
            </label>

            <!-- Aku ndk tau ini nanti logicnya bakal gimana -->
            <div class="search-button-container">
                <input type="text" placeholder="Search">
            </div>

            <div class="jadwal-container">

                <!-- Baris keterangan di paling atas tabel -->
                <div class="baris-keterangan-container">
                    <div>Hari</div>
                    <div>jam_mulai - jam_selesai</div>
                    <div>Mata Kuliah</div>
                    <div>Dosen</div>
                    <div>Aksi</div>
                </div>

                <!-- Jadwal-jadwal yang tersimpan di database -->
                <div class="baris-jadwal-container">

                    @foreach($dataJadwal as $jadwal)
                    <br>
                    <div class="content-hari"><?php echo $jadwal->hari?></div>
                    <div class="content-jam"><?php echo date('H:i',strtotime($jadwal->jam_mulai)).' - '.date('H:i',strtotime($jadwal->jam_selesai)) ;?></div>
                    <div class="content-MataKuliah"><?php echo $jadwal->mataKuliah->nama_makul?></div>
                    <div class="content-Dosen"><?php echo $jadwal->dosenAccounts->nama?></div>

                    <div class="Aksi-container">

                        <label for="edit-button-<?php echo $jadwal->id_jadwal?>">
                            <div class="edit-container">
                                <button id="edit-button-<?php echo $jadwal->id_jadwal?>" onclick="editJadwal('<?php echo $jadwal->id_jadwal?>')">Edit</button>
                            </div>
                        </label>

                        <label for="delete-button-<?php echo $jadwal->id_jadwal?>">
                            <div class="delete-container">
                                <button id="delete-button-<?php echo $jadwal->id_jadwal?>" onclick="deleteJadwal('<?php echo $jadwal->id_jadwal?>')">Delete</button>
                            </div>
                        </label>



                    </div>
                    <br>
                    @endforeach

                </div>

            </div>
        </div>

    </div>



    <script>
        function addJadwal(){
            Swal.fire({
                title: 'Tambah Jadwal',
                html:
                    '<div class="tambah-jadwal-container">'+
                        '<div>Hari</div>'+
                            '<select id="pilih-hari">'+
                                '<option value="senin">Senin</option>'+
                                '<option value="selasa">Selasa</option>'+
                                '<option value="rabu">Rabu</option>'+
                                '<option value="kamis">Kamis</option>'+
                                '<option value="jumat">Jumat</option>'+
                                '<option value="Sabtu">Sabtu</option>'+
                                '<option value="Minggu">Minggu</option>'+
                            '</select>'+

                        '<span>'+
                            '<div class="jam-mulai-container">'+
                                '<div>Jam Mulai</div>'+
                                '<input type="text" id="jam-mulai-input" placeholder="00:00">'+
                            '</div>'+
                            '<div class="jam-selesai-container">'+
                                '<div>Jam Selesai</div>'+
                                '<input type="text" id="jam-selesai-input" placeholder="00:00">'+
                            '</div>'+
                        '</span>'+

                        '<div>Mata Kuliah</div>'+
                        '<select id="pilih-matakuliah">'+
                            '<option value="none" selected>-- Pilih Mata Kuliah --</option>'+
                            '@foreach($dataMatakuliah as $makul)'+
                            '<option value="<?php echo $makul->id_makul?>"><?php echo $makul->nama_makul?></option>'+
                            '@endforeach'+
                        '</select>'+

                        '<div>Dosen pengampu</div>'+
                        '<select id="pilih-dosen">'+
                            '<option value="none" selected>-- Pilih Dosen Pengampu --</option>'+
                            '@foreach($dataDosen as $dosen)'+
                            '<option value="<?php echo $dosen->id_userdosen?>"><?php echo $dosen->nama?></option>'+
                            '@endforeach'+
                        '</select>'+
                    '</div>'
                ,
                confirmButtonText: 'OK',
                confirmButtonColor: '#78A2CC',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                cancelButtonColor: '#FC4B4B',
                reverseButtons: true,
            }).then((result) => {
                if(result.isConfirmed){

                    const idMataKuliah = document.getElementById('pilih-matakuliah').value;
                    const idDosen = document.getElementById('pilih-dosen').value;

                    // Validasi data
                    if(idMataKuliah == 'none' || idDosen == 'none'){
                        Swal.fire({
                            icon: 'error',
                            text: 'Pilih matakuliah dan dosennya!'
                        }).then(() => {
                            return;
                        });
                    }
                    
                    const formData = new FormData();
                    const pilihHari = document.getElementById('pilih-hari').value;
                    const jamMulai = document.getElementById('jam-mulai-input').value;
                    const jamSelesai = document.getElementById('jam-selesai-input').value;
                    const semester = '<?php echo $semester?>';
                    const kelas = '<?php echo $kelas?>';

                    formData.append('_token','<?php echo csrf_token()?>')
                    formData.append('hari',pilihHari);
                    formData.append('jamMulai',jamMulai);
                    formData.append('jamSelesai',jamSelesai);
                    formData.append('idMakul',idMataKuliah);
                    formData.append('idDosen',idDosen);
                    formData.append('semester',semester);
                    formData.append('kelas',kelas);

                    $.ajax({
                        url: '/admin/schedule/kelas/addJadwal',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Jadwal berhasil dibuat',
                                    confirmButtonColor: '#7ACC78',
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }
                        },
                    });
                }
            });
        }

        function editJadwal(idJadwal){
            let formData = new FormData();
            formData.append('_token','<?php echo csrf_token() ?>');
            formData.append('idJadwal',idJadwal);
            $.ajax({
                url: '/admin/schedule/kelas/getSelectedJadwal',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.status == 'success'){
                        Swal.fire({
                            title: 'Update Jadwal',
                            html:
                                '<div class="tambah-jadwal-container">'+
                                    '<div>Hari</div>'+
                                        '<select id="pilih-hari">'+
                                            '<option value="senin">Senin</option>'+
                                            '<option value="selasa">Selasa</option>'+
                                            '<option value="rabu">Rabu</option>'+
                                            '<option value="kamis">Kamis</option>'+
                                            '<option value="jumat">Jumat</option>'+
                                            '<option value="Sabtu">Sabtu</option>'+
                                            '<option value="Minggu">Minggu</option>'+
                                        '</select>'+

                                    '<span>'+
                                        '<div class="jam-mulai-container">'+
                                            '<div>Jam Mulai</div>'+
                                            '<input type="text" id="jam-mulai-input" placeholder="00:00">'+
                                        '</div>'+
                                        '<div class="jam-selesai-container">'+
                                            '<div>Jam Selesai</div>'+
                                            '<input type="text" id="jam-selesai-input" placeholder="00:00">'+
                                        '</div>'+
                                    '</span>'+

                                    '<div>Mata Kuliah</div>'+
                                    '<select id="pilih-matakuliah">'+
                                        '<option value="none" selected>-- Pilih Mata Kuliah --</option>'+
                                        '@foreach($dataMatakuliah as $makul)'+
                                        '<option value="<?php echo $makul->id_makul?>"><?php echo $makul->nama_makul?></option>'+
                                        '@endforeach'+
                                    '</select>'+

                                    '<div>Dosen pengampu</div>'+
                                    '<select id="pilih-dosen">'+
                                        '<option value="none" selected>-- Pilih Dosen Pengampu --</option>'+
                                        '@foreach($dataDosen as $dosen)'+
                                        '<option value="<?php echo $dosen->id_userdosen?>"><?php echo $dosen->nama?></option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'
                            ,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#78A2CC',
                            showCancelButton: true,
                            cancelButtonText: 'Batal',
                            cancelButtonColor: '#FC4B4B',
                            reverseButtons: true,
                            
                            didOpen: () => {
                                document.getElementById('pilih-hari').value = response.hari;
                                document.getElementById('jam-mulai-input').value = response.jamMulai;
                                document.getElementById('jam-selesai-input').value = response.jamSelesai;
                                document.getElementById('pilih-matakuliah').value = response.MataKuliah;
                                document.getElementById('pilih-dosen').value = response.DosenPengampu;
                            },
                        }).then((result) => {
                            if(result.isConfirmed){
                                const idMataKuliah = document.getElementById('pilih-matakuliah').value;
                                const idDosen = document.getElementById('pilih-dosen').value;

                                // Validasi data
                                if(idMataKuliah == 'none' || idDosen == 'none'){
                                    Swal.fire({
                                        icon: 'error',
                                        text: 'Pilih matakuliah dan dosennya!'
                                    }).then(() => {
                                        return;
                                    });
                                }
                    
                                const formData = new FormData();
                                const pilihHari = document.getElementById('pilih-hari').value;
                                const jamMulai = document.getElementById('jam-mulai-input').value;
                                const jamSelesai = document.getElementById('jam-selesai-input').value;
                                const semester = '<?php echo $semester?>';
                                const kelas = '<?php echo $kelas?>';

                                formData.append('_token','<?php echo csrf_token()?>')
                                formData.append('hari',pilihHari);
                                formData.append('jamMulai',jamMulai);
                                formData.append('jamSelesai',jamSelesai);
                                formData.append('idMakul',idMataKuliah);
                                formData.append('idDosen',idDosen);
                                formData.append('semester',semester);
                                formData.append('kelas',kelas);
                                formData.append('idJadwal',idJadwal);

                                $.ajax({
                                    url: '/admin/schedule/kelas/updateJadwal',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,

                                    success: function(response){
                                        if(response.status == 'success'){
                                            Swal.fire({
                                                icon: 'success',
                                                text: 'Jadwal berhasil dirubah',
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
                },

                error: function(error){
                    console.error('AJAX ERROR : ',error);
                }
            });
        }

        function deleteJadwal(idJadwal){
            Swal.fire({
                icon: 'warning',
                text: 'Apa anda yakin ingin menghapus jadwal?',
                confirmButtonColor: '#05FF00',
                confirmButtonText: 'Hapus',
                showCancelButton: true,
                cancelButtonColor: '#FC4B4B',
                cancelButtonText: 'Batal',
                reverseButtons: true,
            }).then((result) => {
                if(result.isConfirmed){
                    const formData = new FormData();
                    formData.append('_token','<?php echo csrf_token()?>');
                    formData.append('idJadwal',idJadwal);

                    $.ajax({
                        url: '/admin/schedule/kelas/deleteJadwal',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,

                        success:function(response){
                            if(response.status == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Jadwal berhasil dihapus',
                                    confirmButtonColor: '#7ACC78',
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }
                        }

                    })
                }
            });
        }

    </script>

</body>
</html>