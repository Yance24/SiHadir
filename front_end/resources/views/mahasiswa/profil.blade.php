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
            top: 100px;
            left: 0;
            background-color: #78A2CC;
            overflow-x: hidden;
            transition: 0.5s;
            z-index: 1;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 25px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
        }

        .custom-profile {
            background: url({{ asset('assets/img/bg-profile.png') }})
        }

        .sidebar a:hover {
            color: #78A2CC;
        }

        #menuToggle {
            display: none;
        }

        #menuToggle:checked+.appbar+.content-fluid {
            margin-left: 200px;
        }

        #menuToggle:checked+.appbar+.sidebar {
            width: 200px;
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
            background: url({{ asset('assets/img/bg-profile.png') }}) center no-repeat;
            background-size: cover;
        }

        @media (min-width: 951px) {
            .content-fluid {
                display: none;
            }
        }

        @media (max-width: 950px) {
            .content-fluid {
                display: block;
            }
        }
    </style>
</head>

<body>
    /* APPBAR */
    <input type="checkbox" id="menuToggle">
    <div class="appbar fixed-top">
        <label for="menuToggle" class="mt-5 ps-2">
            <i class="fa-solid fa-2xl fa-bars" style="color: #ffffff;"></i>
        </label>
        <div class="mx-auto mt-5">
            <h1 class="text-white">Sihadir</h1>
        </div>
    </div>
    /* END */

    /* SIDEBAR */
    <div class="sidebar text-white">
        <div class="header-box custom-profile mb-3 pb-3">
            <div class="mb-2 p-3" style="z-index: 2">
                <img src="{{ asset('assets/img/profile-pict.png') }}" alt="profile" class="rounded-circle"
                    width="80px" height="80px">
            </div>
            <div class="" style="z-index: 2">
                <span class="fw-bold">Ferry Faisal, S.ST., M.T.</span><br>
                <span>19730206 199501 1 001</span>
            </div>
        </div>

        <div class="d-flex flex-column gap-2 p-1">
            <div>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('assets/icon/absensi.png') }}" alt="" class="nav-custom">
                    <span style="font-size: 17px"> Absen</span>
                </a>
            </div>
            <div class="disabled" style="background-color: #B2D2F2;">
                <a href="/" class="text-decoration-none text-white ">
                    <img src="{{ asset('assets/icon/profil.png') }}" alt="" class="nav-custom">
                    <span class="text-dark" style="font-size: 17px"> Profil</span>
                </a>
            </div>
            <div>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('assets/icon/perizinan.png') }}" alt="" class=" nav-custom">
                    <span style="font-size: 17px"> Perizinan</span>
                </a>
            </div>
            <div>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('assets/icon/change-password.svg') }}" alt="" class=" nav-custom">
                    <span style="font-size: 17px"> Ganti Password</span>
                </a>

            </div>

            <hr>
            <div></div>
            <a href="/" class="text-decoration-none text-white">
                <img src="{{ asset('assets/icon/logout.svg') }}" alt="" class=" nav-custom">
                <span style="font-size: 17px"> Logout</span>
            </a>
        </div>
    </div>
    /* END */

    /* CONTENT */
    <div class="content-fluid" style="margin-top: 75px;">
        <div class="bg-custom mb-3 p-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('assets/img/profile-pict.png') }}" width="100px" alt="profile">
                </div>
                <div class="col">
                    <span class="text-dark fw-bold">Weldy Flamingo</span>
                    <div class="row pb-2">
                        <div class="col">
                            <span class="text-dark">3202116038</span>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 10px;">
                        <button class="btn btn-danger rounded-pill d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 25px;">
                            <span style="font-size: 15px;">SP2</span>
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white text-dark mb-2" style="padding-left: 10px;"><span class="p-2 fw-bold">Status
                    Kehadiran</span></div>
            <div class="alert alert-light alert-dismissible fade show m-0 text-dark" role="alert">
                <img src="{{ asset('assets/icon/izin.png') }}" alt="izin">
                <span class="fw-bold">Jumlah Izin</span>
                <span class="badge bg-danger position-relative right-3">1</span>
            </div>
            <div class="alert alert-light alert-dismissible fade show m-0 text-dark" role="alert">
                <img src="{{ asset('assets/icon/sakit.png') }}" alt="sakit">
                <span class="fw-bold">Jumlah Sakit</span>
                <span class="badge bg-danger ml-auto">1</span>
            </div>
            <div class="alert alert-light alert-dismissible fade show text-dark" role="alert">
                <img src="{{ asset('assets/icon/alpa.png') }}" alt="alpa">
                <span class="fw-bold">Jumlah Alpa</span>
                <span class="badge bg-danger ml-auto">1</span>
            </div>
        </div>

        <div class="text-dark mb-3 d-flex justify-content-start align-items-center"
            style="background-color: #F0F0F0; height: 34px;">
            <span class="p-2 fw-bold">Security</span>
        </div>

        <div class="bg-transparent m-3">
            <img src="{{ asset('assets/icon/lock.png') }}" alt="">
            <span class="fw-bold">Ganti Password</span>
        </div>
    </div>

    <script></script>
</body>

</html>
