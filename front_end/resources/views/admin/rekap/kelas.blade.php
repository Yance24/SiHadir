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

    <div class="main-content">
        <!-- Keterangan -->
        <div class="keterangan-container">
            <h4>Rekap Data</h4>
        </div>

        <div class="base-container">
            <div class="keterangan-kelas-container">
                <div>Semester <?php echo $semester?> - Kelas <?php echo $kelas?></div>
            </div>

            @if($editMode)
            <label for="download-button-input">
                <div class="download-button-container">
                    <button id="download-button-input" onclick="" disabled>Download</button>
                </div>
            </label>

            <label for="edit-button-input">
                <div class="edit-button-container">
                    <button type="submit" id="edit-button-input" onclick="confirmChanges()">Confirm</button>
                </div>
            </label>

            <label for="search-bar-input">
                <div class="search-bar-container">
                    <input type="text" id="search-bar-input" placeholder="Search" disabled>
                </div>
            </label>
            @else
            <label for="download-button-input">
                <div class="download-button-container">
                    <button id="download-button-input" onclick="">Download</button>
                </div>
            </label>

            <form action="">
            <label for="edit-button-input">
                <div class="edit-button-container">
                    <button type="submit" id="edit-button-input" name="edit">Edit</button>
                </div>
            </label>
            <input type="hidden" name="semester" value="<?php echo $semester?>">
            <input type="hidden" name="kelas" value="<?php echo $kelas?>">
            </form>

            <label for="search-bar-input">
                <div class="search-bar-container">
                    <input type="text" id="search-bar-input" placeholder="Search">
                </div>
            </label>
            @endif

            <div class="recap-container">

                <!-- Baris keterangan di paling atas tabel -->
                <div class="baris-keterangan-container">
                    <div>No</div>
                    <div>Nama Mahasiswa</div>
                    <div>NIM</div>
                    <div>ALPA</div>
                    <div>IJIN</div>
                    <div>SAKIT</div>
                    <div>JUMLAH</div>
                    <div>STATUS</div>
                    <div>KOMPENSASI</div>
                </div>

                <div class="baris-dataMahasiswa-container">
                    <?php $i = 1;?>
                    
                    @if($editMode)
                    @foreach($viewMahasiswa as $mahasiswa)
                    <br>
                    <div class="content-no"><?php echo $i++?></div>
                    <div class="content-nama"><?php echo $mahasiswa['mahasiswa']->nama?></div>
                    <div class="content-nim"><?php echo $mahasiswa['mahasiswa']->id_user?></div>
                    <input type="hidden" name="nim[]" value="<?php echo $mahasiswa['mahasiswa']->id_user?>">
                    <input type="text" name="jumlahAlpa[]" class="input-alpa" value="<?php echo $mahasiswa['mahasiswa']->jumlah_alpa?>">
                    <input type="text" name="jumlahIzin[]" class="input-izin" value="<?php echo $mahasiswa['mahasiswa']->jumlah_izin?>">
                    <input type="text" name="jumlahSakit[]" class="input-sakit" value="<?php echo $mahasiswa['mahasiswa']->jumlah_sakit?>">
                    <div class="content-jumlah"><?php echo $mahasiswa['jumlah']?></div>
                    <input type="text" name="status[]" class="input-status" value="<?php echo $mahasiswa['mahasiswa']->status?>">
                    <input type="text" name="kompensasi[]" class="input-kompensasi" value="<?php echo $mahasiswa['mahasiswa']->kompensasi?>">
                    <br>
                    @endforeach
                    @else
                    @foreach($viewMahasiswa as $mahasiswa)
                    <br>
                    <div class="content-no"><?php echo $i++?></div>
                    <div class="content-nama"><?php echo $mahasiswa['mahasiswa']->nama?></div>
                    <div class="content-nim"><?php echo $mahasiswa['mahasiswa']->id_user?></div>
                    <div class="content-alpa"><?php echo $mahasiswa['mahasiswa']->jumlah_alpa?></div>
                    <div class="content-ijin"><?php echo $mahasiswa['mahasiswa']->jumlah_izin?></div>
                    <div class="content-sakit"><?php echo $mahasiswa['mahasiswa']->jumlah_sakit?></div>
                    <div class="content-jumlah"><?php echo $mahasiswa['jumlah']?></div>
                    <div class="content-status"><?php echo $mahasiswa['mahasiswa']->status?></div>
                    <div class="content-kompensasi"><?php echo $mahasiswa['mahasiswa']->kompensasi?></div>
                    <br>
                    @endforeach
                    @endif
                </div>

            </div>

        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('#search-bar-input').on('keypress', function(event){
                if(event.which == 13){
                    var searchInput = $(this).val();
                    window.location.href = addParameter(window.location.href,'search',searchInput);
                }
            });
            
        });


        function confirmChanges(){
            let nim = getValueInName('input[name="nim[]"]');
            let jumlahAlpa = getValueInName('input[name="jumlahAlpa[]"]');
            let jumlahIzin = getValueInName('input[name="jumlahIzin[]"]');
            let jumlahSakit = getValueInName('input[name="jumlahSakit[]"]');
            let status = getValueInName('input[name="status[]"]');
            let kompensasi = getValueInName('input[name="kompensasi[]"]');

            const formData = new FormData();
            formData.append('_token','<?php echo csrf_token()?>');
            formData.append('idUser',nim);
            formData.append('jumlahAlpa',jumlahAlpa);
            formData.append('jumlahSakit',jumlahSakit);
            formData.append('jumlahIzin',jumlahIzin);
            formData.append('status',status);
            formData.append('kompensasi',kompensasi);

            $.ajax({
                url: '/admin/rekapData/kelas/updateChanges',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,

                success: function(response){
                    if(response.status == 'success'){
                        window.location.href = removeURLParameter(window.location.href,'edit');
                    }
                },

                error: function(error){
                    console.error('AJAX ERROR: ',error);
                }
            });

        }

        function getValueInName(name){
            let arrayObj = document.querySelectorAll(name);
            let data = [];
            
            arrayObj.forEach(function(obj){
                data.push(obj.value);
            });
            return data;
        }

        // Function to remove a parameter from the URL
        function removeURLParameter(url, parameter) {
            var urlParts = url.split('?');
            if (urlParts.length >= 2) {
                var prefix = encodeURIComponent(parameter) + '=';
                var params = urlParts[1].split(/[&;]/g);

                // Loop through the parameters and remove the 'edit' parameter
                for (var i = params.length; i-- > 0;) {
                    if (params[i].lastIndexOf(prefix, 0) !== -1) {
                        params.splice(i, 1);
                    }
                }

                // Reconstruct the URL
                return urlParts[0] + (params.length > 0 ? '?' + params.join('&') : '');
            }

            return url;
        }

        // Function to update or add a query parameter to the URL
        function addParameter(uri, key, value) {
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) return uri.replace(re, '$1' + key + "=" + value + '$2');
            else return uri + separator + key + "=" + value;
        }
    </script>
</body>
</html>