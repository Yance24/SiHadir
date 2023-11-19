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
            <h3>Rekap Data</h3>
        </div>

        <br>

        <div class="base-container">
            <div class="semester-container">

                <!-- Tampilan semester -->
                @foreach($dataSemester as $semester)
                <div class="semester-container">
                    <h4>Semester <?php echo $semester['semester'];?></h4>

                    <!-- Tampilan kelas dalam semester -->
                    @foreach($semester['kelas'] as $kelas)
                        <h5>Kelas <?php echo $kelas->kelas?></h5>

                        <form action="/admin/rekapData/kelas">
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
</body>
</html>