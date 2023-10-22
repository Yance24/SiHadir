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
            display: none;
            top: 0;
            height: 100px;
            width: 100%;
            background-color: #78A2CC;
            margin-bottom: 50px;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #78A2CC;
            color: white;
            transition: transform 0.3s ease;
            display: block;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .header-box {
            padding: 40px 10px 10px 10px;
        }

        .custom-profile {
            background: url("https://github.com/pddccvv/sihadir/blob/main/public/images/bg-main.jpeg?raw=true");
            background-position: center;
            background-size: cover;
            position: relative;
            opacity: 0.7;
        }

        .custom-profile::before {
            content: "";
            background-color: #78A2CC;
            position: absolute;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            opacity: 0.2;
            z-index: -1;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
                /* Hide the sidebar */
                margin-top: 100px;
                z-index: 2;
            }

            .sidebar.active {
                transform: translateX(0);
                /* Show the sidebar */
            }

            .overlay.active {
                display: block;
            }

            .content {
                margin-left: 0;
            }

            .appbar {
                display: flex;
            }
        }
    </style>
</head>

<body>
    <!-- APP BAR MOBILE VERSION -->
    <div class="appbar fixed-top overflow-hidden">
        <div class="mt-5 ps-2">
            <i class="fas fa-bars fa-xl" onclick="toggleSidebar()"></i>
        </div>
        <div class="mx-auto mt-5">
            <h1 class="">Sihadir</h1>
        </div>
    </div>
    <!-- END -->

    <div class="container-fluid">
        <!-- SIDEBAR -->
        <div class="sidebar row" id="side-nav">
            <div class="header-box custom-profile mb-3">
                <div class="mb-2" style="z-index: 1">
                    <img src="https://github.com/pddccvv/sihadir/blob/main/public/images/profile.png?raw=true'"
                        alt="profile" class="rounded-circle" width="100px" height="100px">
                </div>
                <div class="" style="z-index: 2">
                    <span class="fw-bold">Ferry Faisal, S.ST., M.T.</span><br>
                    <span>19730206 199501 1 001</span>
                </div>
            </div>
            <div class="d-flex flex-column gap-3 p-2">
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://github.com/pddccvv/sihadir/blob/main/public/icons/absensi.png?raw=true"
                        alt="" class=" nav-custom"> Absensi</a>
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://github.com/pddccvv/sihadir/blob/main/public/icons/perizinan.png?raw=true"
                        alt="" class=" nav-custom"> Perizinan</a>
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://raw.githubusercontent.com/pddccvv/sihadir/35032d3c03b9de2ddc69bb2bdb356af33c8cc8f0/public/icons/change-password.svg"
                        alt="" class=" nav-custom"> Ganti
                    Password</a>
                <hr>
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://raw.githubusercontent.com/pddccvv/sihadir/35032d3c03b9de2ddc69bb2bdb356af33c8cc8f0/public/icons/logout.svg"
                        alt="" class=" nav-custom"> Logout</a>
            </div>
        </div>
        <!-- END -->

        <!-- CONTENT -->
        <div class="content" style="margin-top:150px;">
            <div class="main-content" style="margin-left: 25px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">
                            <div class="row">
                                <div id="content" class="content">
                                    <!-- CURRENT JADWAL -->
                                    <div class="col-sm-15 p-5 flex justify-content-center justify-content-lg-start border shadow rounded-3 mb-5"
                                        style="" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <h1 class="ml-lg-2">PBL</h1>
                                        <h1 class="ml-lg-2">07.00 - 12.00</h1>
                                        <hr>
                                    </div>
                                    <!-- END -->
                                    <!-- NEXT JADWAL -->
                                    <div class="col-sm-15 p-5 flex justify-content-center justify-content-lg-start border shadow mb-5"
                                        style="border-radius: 15px;" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <h1 class="ml-lg-2">PEMOGRAMAN WEB</h1>
                                        <h1 class="ml-lg-2">07.00 - 12.00</h1>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END -->

            <!-- SEND MAIL -->
            <div class="mb-5 text-center fs-1">
                <label class="file-upload-button">
                    <button class="btn btn-primary rounded-pill">KIRIM</button>
                    <i class="fas fa-paperclip">
                        <input type="file" id="file-input" accept=".pdf" style="display: none;">
                    </i>
                </label>
            </div>
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('side-nav');
        sidebar.classList.toggle('active');
        if (sidebar.classList.contains('active')) {
            sidebar.style.display = 'block';
        } else {
            sidebar.style.display = 'none';
        }
    }
</script>

</html>
