<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiHadir | Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        .appbar {
            display: flex;
            height: 100px;
            background-color: #78A2CC;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #78A2CC;
            overflow-x: hidden;
            transition: 0.5s;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 25px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #78A2CC;
        }

        #menuToggle {
            display: none;
        }

        #menuToggle:checked+.appbar+.content-fluid {
            margin-left: 20%;
        }

        #menuToggle:checked+.appbar+.content-fluid+.sidebar {
            width: 30%;
        }

        #menuToggle:checked+.appbar label {
            background-color: transparent;
        }

        #menuToggle:checked+.appbar label i {
            color: #ffffff;
        }

        #menuToggle:checked+.appbar label:hover i {
            color: #78A2CC;
        }


        .bg-custom {
            background: url("https://raw.githubusercontent.com/Yance24/SiHadir/f5951c8b5b4805564e605848cc5f10c81a520165/Asset/Images/BG%20Profile.svg") center no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="menuToggle">
    <div class="appbar fixed-top">
        <label for="menuToggle" class="mt-5 ps-2">
            <i class="fa-solid fa-2xl fa-bars" style="color: #ffffff;"></i>
        </label>
        <div class="mx-auto mt-5">
            <h1 class="">Sihadir</h1>
        </div>
    </div>

    <div class="sidebar text-white">
        <div class="header-box custom-profile mb-3">
            <div class="mb-2" style="z-index: 1">
                <img src="https://github.com/pddccvv/sihadir/blob/main/public/images/profile.png?raw=true"
                    alt="profile" class="rounded-circle" width="100px" height="100px">
            </div>
            <div class="" style="z-index: 2">
                <span class="fw-bold">Ferry Faisal, S.ST., M.T.</span><br>
                <span>19730206 199501 1 001</span>
            </div>
        </div>

        <div class="nav">

        </div>
    </div>

    <div class="content-fluid" style="margin-top: 100px;">
        <div class="bg-custom mb-3">
            <img src="https://github.com/pddccvv/sihadir/blob/main/public/images/profile.png?raw=true" width="100px"
                alt="profile">
            <div class="">
                <span class="text-dark">Weldy Flaminggo</span>
            </div>
            <div>
                <span class="text-dark">3202116038</span>
            </div>
            <div class="">
                <button class="btn btn-danger rounde-pill">SP2</button>
            </div>
        </div>

        <div>
            <div>
                <div class="bg-white text-dark"><span class="p-2 fw-bold">Status Kehadiran</span></div>
                <div class="alert alert-light alert-dismissible fade show m-0 text-dark" role="alert">
                    <img src="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/public/assets/icon/izin.png?raw=true"
                        alt="izin">
                    <span class="fw-bold">Jumlah Izin</span>
                    <span class="badge bg-danger">1</span>
                </div>
                <div class="alert alert-light alert-dismissible fade show m-0 text-dark" role="alert">
                    <img src="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/public/assets/icon/sakit.png?raw=true"
                        alt="sakit">
                    <span class="fw-bold">Jumlah Sakit</span>
                    <span class="badge bg-danger">1</span>
                </div>
                <div class="alert alert-light alert-dismissible fade show text-dark" role="alert">
                    <img src="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/public/assets/icon/alpa.png?raw=true"
                        alt="alpa">
                    <span class="fw-bold">Jumlah Alpa</span>
                    <span class="badge bg-danger">1</span>
                </div>
            </div>
            <div class="text-dark mb-3" style="background-color: #F0F0F0; height: 34px;"><span
                    class="p-2 fw-bold">Security</span> </div>
            <div class="bg-transparent m-3">
                <img src="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/public/assets/icon/lock.png?raw=true"
                    alt="">
                <span class="fw-bold">Ganti Password</span>
            </div>
        </div>
    </div>

    <script></script>
</body>

</html>
