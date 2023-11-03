<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
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

<body>
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
</body>

</html>
