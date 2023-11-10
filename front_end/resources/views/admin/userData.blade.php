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

            <form action="">
            <label for="tambah-user-button">
                <div class="tambah-user-container">
                    <button>Tambah</button>
                    <input type="submit" id="tambah-user-button" style="display: none;">
                </div>
            </label>
            </form>

            <div class="search-bar-container">
                <input type="text" placeholder="Search">
            </div>

            <div class="table-user-container">

                <div class="keterangan-container">
                    <div>ID</div>
                    
                </div>

            </div>

        </div>

    </div>

</body>
</html>