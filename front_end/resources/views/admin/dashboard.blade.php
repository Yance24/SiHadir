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
                            <button type="submit" id="admin-button" name="user" value="Admin">Admin</button>
                        </div>
                    </label>

                    <label for="dosen-button">
                        <div class="dosen-container">
                            <button type="submit" id="dosen-button" name="user" value="Dosen">Dosen</button>
                        </div>
                    </label>

                    <label for="mahasiswa-button">
                        <div class="mahasiswa-container">
                            <button type="submit" id="mahasiswa-button" name="user" value="Mahasiswa">Mahasiswa</button>
                        </div>
                    </label>

                </div>
                </form>


            </div>

            <div class="attendance-container">
                <a href="/admin/rekapData">Attendance Recap</a>
            </div>

            <div class="logout-container">
                <a href="/logout">Logout</a>
            </div>
        </div>
    </div>

    <!-- Greetings -->
    <div class="greet-container">
        <h3>Halo! Admin <?php echo session('account')->nama?></h3>
    </div>

    <!-- Total Mahasiswa -->
    <div class="Mahasiswa-container">
        <h4>Total Mahasiswa</h4>
        <h5><?php echo $totalMahasiswa; ?></h5>
    </div>

    <!-- Total Dosen -->
    <div class="Dosen-container">
        <h4>Total Dosen</h4>
        <h5><?php echo $totalDosen; ?></h5>
    </div>

</body>
</html>