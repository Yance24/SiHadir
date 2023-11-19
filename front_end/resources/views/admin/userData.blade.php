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
                <a>User Data</a>

                <!-- Expand and collapse jika user tekan tombol User Data -->
                <form action="/admin/user-data">
                <div class="expanded-user-container">
                    <label for="admin-button">
                        <div class="admin-container">
                            <button>Admin</button>
                            <input type="submit" id="admin-button" name="user" value="Admin" style="display: none;">
                        </div>
                    </label>

                    <label for="dosen-button">
                        <div class="dosen-container">
                            <button>Dosen</button>
                            <input type="submit" id="dosen-button" name="user" value="Dosen" style="display: none;">
                        </div>
                    </label>

                    <label for="mahasiswa-button">
                        <div class="mahasiswa-container">
                            <button>Mahasiswa</button>
                            <input type="submit" id="mahasiswa-button" name="user" value="Mahasiswa" style="display: none;">
                        </div>
                    </label>

                </div>
                </form>


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

        <div class="keterangan-user-container">
            <?php echo $userInfo?>
        </div>

        <div class="base-container">

            <label for="tambah-user-input">
                <div class="tambah-user-container">
                    <button id="tambah-user-input" onclick="addUser()">Tambah User</button>
                </div>
            </label>

            <div class="search-bar-container">
                <input type="text" placeholder="Search">
            </div>

            <div class="table-user-container">

                <div class="keterangan-container">
                    <div>ID</div>
                    <div>Nama</div>
                    @if($userInfo == 'Mahasiswa')
                        <div>Semester</div>
                        <div>Kelas</div>
                    @endif
                    <div>JenisKelamin</div>
                </div>

                <div class="content-table-user">

                    @foreach($data as $user)
                    <?php
                        if($userInfo == 'Mahasiswa') $id = $user->id_user;
                        else if($userInfo == 'Dosen') $id = $user->id_userdosen;
                        else if($userInfo == 'Admin') $id = $user->id_admin;
                    ?>
                    <br>
                    <div class="content-id"> <?php echo $id;?></div>
                    <div class="content-nama"><?php echo $user->nama?></div>

                    @if($userInfo == 'Mahasiswa')
                    <div class="content-semester"><?php echo $user->semester?></div>
                    <div class="content-kelas"><?php echo $user->kelas?></div>
                    @endif

                    <div class="content-jenisKelamin"><?php echo $user->kelamin?></div>

                    <label for="update-input <?php echo $id;?>">
                        <div class="update-button-container">
                            <button onclick="updateUser('<?php echo $id?>')" id="update-input <?php echo $id;?>">Update</button>
                        </div>
                    </label>
                    
                    <br>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <script>
        function addUser(){
            Swal.fire({
                title: 'Form Data <?php echo $userInfo?>',
                html:
                    '<div class="pop-up-container">'+
                        '<div>ID</div>'+
                        '<label for="id-input">'+
                            '<div class="id-container">'+
                                '<input type="text" id="id-input">'+
                            '</div>'+
                        '</label>'+

                        '<div>Nama</div>'+
                        '<label for="nama-input">'+
                            '<div class="nama-container">'+
                                '<input type="text" id="nama-input">'+
                            '</div>'+
                        '</label>'+
        
                        '@if($userInfo == "Mahasiswa")'+
                        '<div>Semester</div>'+
                        '<label for="semester-input">'+
                            '<div class="semester-container">'+
                                '<input type="text" id="semester-input">'+
                            '</div>'+
                        '</label>'+

                        '<div>Kelas</div>'+
                        '<label for="kelas-input">'+
                            '<div class="kelas-container">'+
                                '<input type="text" id="kelas-input">'+
                            '</div>'+
                        '</label>'+
                        '@endif'+

                        '<div>Jenis Kelamin</div>'+
                        '<select id="jenis-kelamin-input">'+
                            '<option value="none">-- Pilih Jenis Kelamin --</option>'+
                            '<option value="L">L</option>'+
                            '<option value="P">P</option>'+
                        '</select>'+

                    '</div>'
                ,
                confirmButtonText: 'OK',
                confirmButtonColor: '#78A2CC',
                showCancelButton: true,
                cancelButtonColor: '#FC4B4B',
                cancelButtonText: 'Batal',
                reverseButtons: true,

            }).then((result) => {
                if(result.isConfirmed){
                    const jenisKelamin = document.getElementById('jenis-kelamin-input').value;

                    console.log(jenisKelamin);
                    
                    if(jenisKelamin == 'none'){
                        Swal.fire({
                            icon: 'error',
                            text: 'Masukan jenis kelamin',
                        });
                        return;                        
                    }

                    let formData = new FormData();
                    formData.append('_token','<?php echo csrf_token()?>');

                    const id = document.getElementById('id-input').value;
                    const nama = document.getElementById('nama-input').value;
                    const userInfo = '<?php echo $userInfo?>';

                    formData.append('id',id);
                    formData.append('nama',nama);
                    formData.append('jenisKelamin',jenisKelamin);
                    formData.append('userInfo',userInfo);

                    if(userInfo == 'Mahasiswa'){
                        const semester = document.getElementById('semester-input').value;
                        const kelas = document.getElementById('kelas-input').value;

                        formData.append('semester',semester);
                        formData.append('kelas',kelas);
                    }

                    $.ajax({
                        url: '/admin/user-data/addUser',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,

                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Berhasil menambah user!'
                                }).then(() => {
                                    window.location.href = addParameter(window.location.href,'user','<?php echo $userInfo?>');
                                })
                            }else if(response.status == 'failed'){
                                Swal.fire({
                                    icon: 'error',
                                    text: 'Tidak dapat menambah user!',
                                })
                            }
                        },

                        error: function(error){
                            console.error('AJAX ERROR: ',error)
                        }
                    })
                }
            });
        }

        function updateUser(idUser){
            
        }

        function addParameter(uri, key, value) {
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) return uri.replace(re, '$1' + key + "=" + value + '$2');
            else return uri + separator + key + "=" + value;
        }
    </script>
</body>
</html>