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

    <br>
    <br>


    <!-- Main Content -->
    <div class="Content-container">

        <!-- Keterangan page -->
        <div class="keterangan-container">
            <h3>Jadwal Akademik</h3>
        </div>

        <br>

        <div class="base-container">

            <label for="tambah-semester-input">
                <div class="tambah-semester-container">
                    <button id="tambah-semester-input" onclick="addSemester()">Tambah Semester</button>
                </div>
            </label>

            <label for="delete-semester-input">
                <div class="delete-semester-container">
                    <button id="delete-semester-input" onclick="removeSemester()">Remove Semester</button>
                </div>
            </label>

            <label for="tambah-kelas-input">
                <div class="tambah-kelas-container">
                    <button id="tambah-kelas-input" onclick="addKelas()">Tambah Kelas</button>
                </div>
            </label>

            <div class="semester-container">

                <!-- Tampilan semester -->
                @foreach($dataSemester as $semester)
                <div class="semester-container">
                    <h4>Semester <?php echo $semester['semester'];?></h4>

                    <!-- Tampilan kelas dalam semester -->
                    @foreach($semester['kelas'] as $kelas)
                        <h5>Kelas <?php echo $kelas->kelas?></h5>

                        <form action="/admin/schedule/kelas">
                            <label for="view-button<?php echo $semester['semester'].$kelas->kelas?>">
                                <div class="view-button-container">
                                    <button>View</button>
                                    <input type="hidden" name="semester" value="<?php echo $semester['semester'];?>">
                                    <input type="hidden" name="kelas" value="<?php echo $kelas->kelas?>">
                                    <input type="submit" id="view-button<?php echo $semester['semester'].$kelas->kelas?>" style="display: none;">
                                </div>
                            </label>
                        </form>

                        <label for="delete-button-input"></label>
                        <div class="delete-button-container">
                            <button id="delete-button-input" onclick="removeKelas('<?php echo $semester['semester'];?>','<?php echo $kelas->kelas?>')">Delete</button>
                        </div>
                    @endforeach

                </div>
                @endforeach

            </div>

        </div>

    </div>

    <script>
        function addSemester(){
            let formData = new FormData()
            formData.append('_token','<?php echo csrf_token();?>');

            $.ajax({
                url: '/admin/schedule/addSemester',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    window.location.href = "";
                },
            });
        }

        function removeSemester(){
            let formData = new FormData()
            formData.append('_token','<?php echo csrf_token();?>');
            // formData.append('operation','check');

            $.ajax({
                url: '/admin/schedule/removeSemester',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.status == 'needConfirmation'){
                        Swal.fire({
                            icon: 'warning',
                            text: 'data kelas dan jadwal akan ikut terhapus, anda yakin?',
                            confirmButtonText: 'Hapus',
                            confirmButtonColor: '#78A2CC',
                            showCancelButton: true,
                            cancelButtonText: 'Batal',
                            cancelButtonColor: '#FC4B4B',
                            reverseButtons: true,
                        }).then((result) => {
                            if(result.isConfirmed){
                                formData.append('operation','confirmed');
                                $.ajax({
                                    url: '/admin/schedule/removeSemester',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response){
                                        if(response.status == 'success'){
                                            Swal.fire({
                                                icon: 'success',
                                                text: 'berhasil menghapus seluruh data satu semester',
                                                confirmButtonColor: '#78A2CC',
                                            }).then(() => {
                                                window.location.href = "";
                                                return;
                                            });
                                    }   
                                    }   
                                });
                            }
                        });
                    }else
                    window.location.href = "";
                }
            });
        }

        function addKelas(){

            Swal.fire({
                title: 'Tambah Kelas',
                html: 
                '<div class="tambah-kelas-pop-container">'+
                    '<label for="pilih-semester">'+
                        '<div>Semester</div>'+
                        '<select id="pilih-semester">'+
                            '@foreach($dataSemester as $semester)'+
                            '<option value="<?php echo $semester['semester']?>">Semester <?php echo $semester['semester'];?></option>'+
                            '@endforeach'+
                        '</select>'+
                    '</label>'+
                    '<label for="kelas-input">'+
                        '<div>Kelas</div>'+
                        '<input type="text" id="kelas-input">'+
                    '</label>'+
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

                    const selectedSemester = document.getElementById('pilih-semester').value;
                    const kelasName = document.getElementById('kelas-input').value;

                    let formData = new FormData();
                    formData.append('_token','<?php echo csrf_token()?>');
                    formData.append('selectedSemester',selectedSemester);
                    formData.append('kelasName',kelasName);

                    $.ajax({
                        url: '/admin/schedule/addKelas',
                        type: 'POST',
                        data: formData,  
                        processData: false,
                        contentType: false,
                        
                        success: function(response){
                            window.location.href = "";
                        },

                        error: function(error){
                            console.error('AJAX ERROR : '+error)
                        },
                    });
                }
            });

            
        }

        function removeKelas(semester,kelas){
            Swal.fire({
                icon: 'warning',
                text: 'Apa anda yakin ingin menghapus kelas '+kelas+' semester '+semester+'?',
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#7ACC78',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                cancelButtonColor: '#FC4B4B',
                reverseButtons: true,
            }).then((result) => {
                if(result.isConfirmed){
                    let formData = new FormData();
                    formData.append('_token','<?php echo csrf_token()?>');
                    formData.append('semester',semester);
                    formData.append('kelas',kelas);

                    $.ajax({
                        url: '/admin/schedule/removeKelas',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,

                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Kelas Berhasil di hapus',
                                    confirmButtonColor: '#7ACC78'
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    text: 'Kelas gagal di hapus',
                                    confirmButtonColor: '#7ACC78'
                                }).then(() => {
                                    window.location.href = "";
                                });
                            }
                        }
                    });
                }
            });
        }

    </script>
</body>
</html>