<!DOCTYPE html>
<html lang="en">
<head>
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

            <form action="">
            <label for="tambah-button">
                <div class="tambah-button-container">
                    <button>Tambah</button>
                    <input type="submit" id="tambah-button" style="display: none;">
                </div>
            </label>
            </form>

            <!-- Aku ndk tau ini nanti logicnya bakal gimana -->
            <div class="search-button-container">
                <textarea cols="30" rows="1">Search</textarea>
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

                        <form action="">
                        <label for="edit-button">
                            <div class="edit-container">
                                <button>Edit</button>
                                <input type="submit" id="edit-button" style="display: none;">
                            </div>
                        </label>
                        </form>

                        <form action="">
                        <label for="delete-button">
                            <div class="delete-container">
                                <button>Delete</button>
                                <input type="submit" id="delete-button" style="display: none;">
                            </div>
                        </label>
                        </form>



                    </div>
                    <br>
                    @endforeach

                </div>

            </div>
        </div>

    </div>

</body>
</html>