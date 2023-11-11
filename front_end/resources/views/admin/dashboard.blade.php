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
            <h4>SiHadir <h5>Admin</h5></h4>            
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