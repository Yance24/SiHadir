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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <?php

    $account = session()->get('account');

    ?>

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
                    <span class="fw-bold nama"><?php echo $account->nama?></span><br>
                    <span class="nim"><?php echo $account->id_user?></span>
                </div>
            </div>

            <!-- NAVIGASI -->
            <div class="d-flex flex-column m-0 ">
                <div>
                    <a href="/mahasiswa/dashboard" class="text-decoration-none text-white">
                        <img src="{{ asset('assets/icon/absensi.png') }}" alt="" class="nav-custom">
                        <span style="font-size: 15px"> Absen</span>
                    </a>
                </div>
                <div>
                    <a href="/mahasiswa/profil" class="text-decoration-none text-white ">
                        <img src="{{ asset('assets/icon/profil.png') }}" alt="" class="nav-custom">
                        <span style="font-size: 17px"> Profil</span>
                    </a>
                </div>
                <div>
                    <a href="/mahasiswa/perizinan" class="text-decoration-none text-white">
                        <img src="{{ asset('assets/icon/perizinan.png') }}" alt="" class="nav-custom">
                        <span style="font-size: 15px">Perizinan</span>
                    </a>
                </div>
                <hr class="m-0">
                <a class="text-decoration-none text-white" id="logout">
                    <img src="{{ asset('assets/icon/logout.svg') }}" alt="" class=" nav-custom">
                    <span style="font-size: 15px"> Logout</span>
                </a>
            </div>
            <!-- END -->
        </div>
    </header>
    <script src="{{asset('assets/js/logout.js')}}"></script>

