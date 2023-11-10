<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="{{ asset('assets/css/layouts/appbarMobile.css') }}">

</head>

<body>
    <header>
        <input type="checkbox" id="menuToggle">
        <div class="appbar fixed-top">
            <label for="menuToggle" class="mt-4 ps-2 pe-auto">
                <i class="fa-solid fa-2xl fa-bars pt-3" style="color: #ffffff;"></i>
            </label>
            <div class="mx-auto mt-4">
                <h1 class="text-white">SiHadir</h1>
            </div>
        </div>

        <div class="sidebar text-white">
            <div class="header-box custom-profile mb-3 pb-3">
                <div class="mb-2 p-3" style="z-index: 2">
                    <img src="{{ asset('assets/img/profile-pict.png') }}" alt="profile" class="rounded-circle"
                        width="80px" height="80px">
                </div>
                <div class="p-2" style="z-index: 2">
                    <span class="fw-bold nama">Weldy Flaminggo</span><br>
                    <span class="nim">123456789</span>
                </div>
            </div>

            <!-- NAVIGASI -->
            <div class="d-flex flex-column m-0 ">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                        <img src="{{ asset('assets/icon/absensi.png') }}" alt="" class="nav-custom">
                        <span style="font-size: 15px"> Absen</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('profil') }}" class="text-decoration-none text-white ">
                        <img src="{{ asset('assets/icon/profil.png') }}" alt="" class="nav-custom">
                        <span style="font-size: 17px"> Profil</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('jenis-absen') }}" class="text-decoration-none text-white">
                        <img src="{{ asset('assets/icon/perizinan.png') }}" alt="" class="nav-custom">
                        <span style="font-size: 15px">Perizinan</span>
                    </a>
                </div>
                <hr class="m-0">
                <a href="{{ route('splashscreen') }}" class="text-decoration-none text-white" id="logout">
                    <img src="{{ asset('assets/icon/logout.svg') }}" alt="" class=" nav-custom">
                    <span style="font-size: 15px"> Logout</span>
                </a>
            </div>
            <!-- END -->
        </div>
    </header>
    <script src="{{asset('assets/js/logout.js')}}"></script>

