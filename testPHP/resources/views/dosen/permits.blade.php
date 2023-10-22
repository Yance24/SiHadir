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
        }

        .header-box {
            padding: 40px 10px 10px 10px;
        }

        .custom-profile {
            background: url("{{ asset('images/bg-main.jpeg') }}");
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
            /* Match the width of the sidebar */
            height: 100%;
            opacity: 0.2;
            /* Adjust the opacity as needed */
            z-index: -1;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                display: none;
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
    {{-- APP BAR MOBILE VERSION --}}
    <div class="appbar fixed-top overflow-hidden">
        <div class="mt-5 ps-2">
            <i class="fa-solid fa-arrow-left fa-xl"></i>
        </div>
        <div class="mx-auto mt-5">
            <h1 class="">Sihadir</h1>
        </div>
    </div>
    {{-- END --}}

    <div class="main-container d-flex">
        <!-- SIDEBAR -->
        <div class="sidebar" id="side-nav">
            <div class="header-box custom-profile mb-3">
                <div class="mb-2" style="z-index: 1">
                    <img src="{{ asset('images/profile.png') }}" alt="profile" class="rounded-circle" width="100px"
                        height="100px">
                </div>
                <div class="" style="z-index: 2">
                    <span class="fw-bold">Ferry Faisal, S.ST., M.T.</span><br>
                    <span>19730206 199501 1 001</span>
                </div>
            </div>
            <div class="d-flex flex-column gap-3 p-2">
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('icons/absensi.png') }}" alt="" class=" nav-custom"> Absensi</a>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('icons/perizinan.png') }}" alt="" class=" nav-custom"> Perizinan</a>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('icons/change-password.svg') }}" alt="" class=" nav-custom"> Ganti
                    Password</a>
                <hr>
                <a href="/" class="text-decoration-none text-white">
                    <img src="{{ asset('icons/logout.svg') }}" alt="" class=" nav-custom"> Logout</a>
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
                                    <div class="col-sm-11 p-5 flex justify-content-center justify-content-lg-start border shadow rounded-3 mb-5"
                                        style="" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <h1 class="ml-lg-2">PBL</h1>
                                        <h1 class="ml-lg-2">07.00 - 12.00</h1>
                                        <hr>
                                    
                                    </div>
                                    {{-- END --}}
                                </div>
                            </div>

                            <!-- NEXT JADWAL -->
                            <div class="col-sm-11 p-5 flex justify-content-center justify-content-lg-start border shadow mb-5"
                                style="border-radius: 15px;" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                <h1 class="ml-lg-2">PEMOGRAMAN WEB</h1>
                                <h1 class="ml-lg-2">07.00 - 12.00</h1>
                                <hr>
                            </div>
                            <!-- END -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END -->

            {{-- SEND MAIL --}}
            <div class="mb-5 text-center fs-1">
                <label class="file-upload-button">
                    <button class="btn btn-primary rounded-pill">KIRIM</button>
                    <i class="fas fa-paperclip"></i>
                    <input type="file" id="file-input" accept=".pdf" style="display: none;">
                  </label>
            </div>
            
          
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
