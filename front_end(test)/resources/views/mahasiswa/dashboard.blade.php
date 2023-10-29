<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            background: url({{ asset('assets/img/bg-sidebar.png') }})
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
            <div class="ps-1" style="z-index: 2">
                <span class="fw-bold">Weldy Flaminggo</span><br>
                <span>1234567890</span>
            </div>
        </div>
        <!-- NAVIGASI -->
        <div class="d-flex flex-column gap-2 p-1">
            <a href="/" class="text-decoration-none text-white">
                <img src="{{ asset('assets/icon/absensi.png') }}" alt="" class="nav-custom">
                <span style="font-size: 17px"> Absensi</span></a>
            <a href="/" class="text-decoration-none text-white">
                <img src="{{ asset('assets/icon/perizinan.png') }}" alt="" class=" nav-custom">
                <span style="font-size: 17px"> Perizinan</span></a>
            <a href="/" class="text-decoration-none text-white">
                <img src="{{ asset('assets/icon/change-password.svg') }}" alt="" class=" nav-custom">
                <span style="font-size: 17px"> Ganti
                    Password</span>
            </a>
            <hr>
            <a href="/" class="text-decoration-none text-white">
                <img src="{{ asset('assets/icon/logout.svg') }}" alt="" class=" nav-custom">
                <span style="font-size: 17px"> Logout</span>
            </a>
        </div>
        <!-- END -->
    </div>
    /* END */

    <!-- CONTENT -->
    <div class="content" style="margin-top:100px;">
        <div class="mb-5" style="padding-left: 25px;">
            <span style="font-size: 14px;">halo, <b>Weldy Flaminggo</b></span>
        </div>
        <div class="main-content" style="margin-left: 25px">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div id="content" class="content">
                            <div class="mb-3">
                                <img src="{{ asset('assets/icon/table.svg') }}" alt="">
                                <span class="fw-bold" style="font-size: 18px;">Jadwal Sekarang</span>
                            </div>
                            <!-- CURRENT JADWAL -->
                            <div class="col-sm-11 p-5 flex justify-content-center justify-content-lg-start mb-5"
                                style="
                                box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 1px solid #78A2CC; ">
                                <h1 class="ml-lg-2 fw-bold" style="font-size: 20px;">PBL</h1>
                                <h1 class="ml-lg-2" style="font-size: 20px;">07.00 - 12.00</h1>
                                <hr>
                                <div class="text-center" id="hideCurrent">
                                    <button id="absenButton" class="btn btn-primary shadow-lg rounded-3"
                                        style="width: 200px; height: 50px">
                                        Absen
                                    </button>
                                </div>
                            </div>
                            <!-- END -->

                            <!-- NEXT JADWAL -->
                            <div class="mb-3">
                                <img src="{{ asset('assets/icon/table.svg') }}" alt="">
                                <span class="fw-bold" style="font-size: 18px;">Jadwal Selanjutnya</span>
                            </div>
                            <div class="col-sm-11 p-5 flex justify-content-center justify-content-lg-start mb-5"
                                style="
                                box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 1px solid #78A2CC; ">
                                <h1 class="ml-lg-2 fw-bold" style="font-size: 20px;">PEMOGRAMAN WEB</h1>
                                <h1 class="ml-lg-2" style="font-size: 20px;">07.00 - 12.00</h1>
                                <hr>
                                <div class="text-center" id="hideNext">
                                    <button class="btn btn-primary shadow-lg rounded-3" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCurrent1" id="scanQrButton"
                                        style="width: 200px; height: 50px">
                                        Absen
                                    </button>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    // UNTUK PINDAH KE PEMINDAI PAGE - UNTUK TOMBOL ABSEN
    document.addEventListener('DOMContentLoaded', function() {
        const absenButton = document.getElementById('absenButton');

        absenButton.addEventListener('click', function() {
            window.location.href = "{{ route('mahasiswa.barcode.index') }}";
        });
    });
</script>

</html>
