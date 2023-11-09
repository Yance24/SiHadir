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

            <form action="">
            <label for="tambah-semester-button">
                <div class="tambah-semester-container">
                    <button>Tambah</button>
                    <input type="submit" id="tambah-semester-button" style="display: none;">
                </div>
            </label>
            </form>

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

                        <div class="delete-button-container">
                
                        </div>
                    @endforeach

                </div>
                @endforeach

            </div>

        </div>

    </div>

</body>
</html>