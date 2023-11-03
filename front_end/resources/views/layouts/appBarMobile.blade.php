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
            background: url({{ asset('assets/img/bg-profile.png') }});
            background-size: cover;
            background-position: center;
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
            width: 55%;
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

        @media (max-width: 1024px) {

            #menuToggle:checked+.appbar+.sidebar {
                width: 60%;
            }
            .nav-custom{
                font-size: 50px;
            }
        }

        @media (max-width: 767px) {

            #menuToggle:checked+.appbar+.sidebar {
                width: 60%;
            }

            .nav-custom {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <input type="checkbox" id="menuToggle">
    <div class="appbar fixed-top">
        <label for="menuToggle" class="mt-5 ps-2" onclick="toggleSidebar()">
            <i class="fa-solid fa-2xl fa-bars" style="color: #ffffff;"></i>
        </label>
        <div class="mx-auto mt-5">
            <h1 class="text-white">Sihadir</h1>
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

        <div class="d-flex flex-column">
            <div>
                <a href="../mahasiswa/dashboard" class="text-decoration-none text-white">
                    <img src="{{ asset('assets/icon/absensi.png') }}" alt="" class="nav-custom">
                    <span style="font-size: 15px"> Absen</span>
                </a>
            </div>
            <div>
                <a href="mahasiswa.profile" class="text-decoration-none text-white ">
                    <img src="{{ asset('assets/icon/profil.png') }}" alt="" class="nav-custom">
                    <span style="font-size: 17px"> Profil</span>
                </a>
            </div>
            <div>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('assets/icon/perizinan.png') }}" alt="" class=" nav-custom">
                    <span style="font-size: 15px"> Perizinan</span>
                </a>
            </div>
            <div>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('assets/icon/change-password.svg') }}" alt="" class=" nav-custom">
                    <span style="font-size: 15px"> Ganti Password</span>
                </a>

            </div>

            <hr>
            <a href="/" class="text-decoration-none text-white" id="logout">
                <img src="{{ asset('assets/icon/logout.svg') }}" alt="" class=" nav-custom">
                <span style="font-size: 15px"> Logout</span>
            </a>
        </div>
    </div>
    <script>
        < script >
            function toggleSidebar() {
                var sidebar = document.querySelector('.sidebar');
                var appbar = document.querySelector('.appbar');
                var menuToggle = document.querySelector('#menuToggle');

                if (menuToggle.checked) {
                    sidebar.style.width = '350px';
                    appbar.style.marginLeft = '350px';
                } else {
                    sidebar.style.width = '0';
                    appbar.style.marginLeft = '0';
                }
            }
        // Event handler untuk tombol logout
        document.getElementById('logout').addEventListener('click', function() {
            Swal.fire({
                title: 'Do you want to log out?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Log Out',
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan tindakan logout di sini
                    Swal.fire('Logged Out!', '', 'success');
                }
            });
        });
    </>
