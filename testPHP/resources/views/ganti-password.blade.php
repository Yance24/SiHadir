<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <style>
        .nav-custom {
            width: 27px;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #78A2CC;
            color: white;
        }

        .content {
            flex: 1;
            padding: 20px;
            transition: margin-left 0.3s;
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

        input::placeholder {
            color: white;
            padding-left: 20px;
            font-weight: bold;
        }

        .appbar {
            display: none;
            top: 0;
            height: 100px;
            width: 100%;
            background-color: #78A2CC;
            margin-bottom: 50px;
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

            .custom-field {
                width: 100%;
                max-width: 100%;
            }
        }
    </style>

</head>

<body>
    {{-- APP BAR MOBILE VERSION --}}
    <div class="appbar">
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
        <div class="content">
            <div class="main-content container-fluid d-block">
                <div class="logo text-center mt-5 mb-3">
                    <img src="{{ asset('icons/key.png') }}" alt="" width="190px" class="custom-icon">
                </div>
                <div class="text-center mb-5">
                    <h2 class="custom-title">Ubah Password</h2>
                    <span class="">Masukkan password lama dan <br> baru anda dibawah ini</span>
                </div>

                <!-- Untuk input password lama -->
                <div class="mb-3 form-group input-group password-toggle position-relative mx-auto"
                    style="width: 650px; height: 60px;">
                    <input type="password" name="oldPass" id="oldPassword" class="custom-field form-control shadow"
                        placeholder="Masukkan Password Lama"
                        style="background-color: #D9D9D9; padding-left: 40px;  border-radius: 12px;">
                    <i class="far fa-eye fa-lg pe-auto position-absolute top-50 toggle-password" type="button"
                        style="right: 15px;"></i>
                    <i class="fa-solid fa-lock fa-xl position-absolute top-50 left-2"
                        style="color: #333; margin-left: 15px;"></i>
                </div>

                <!-- Untuk input password baru -->
                <div class="mb-3 form-group input-group password-toggle position-relative mx-auto"
                    style="width: 650px; height: 60px;">
                    <input type="password" name="newPass" id="newPassword" class="custom-field form-control  shadow"
                        placeholder="Masukkan Password Baru"
                        style="background-color: #D9D9D9; padding-left: 40px;  border-radius: 12px;">
                    <i class="far fa-eye fa-lg pe-auto position-absolute top-50 toggle-password" type="button"
                        style="right: 15px;"></i>
                    <i class="fa-solid fa-lock fa-xl position-absolute top-50 left-2"
                        style="color: #333; margin-left: 15px;"></i>
                </div>

                <!-- Untuk input konfirmasi password baru -->
                <div class="mb-5 form-group input-group password-toggle position-relative mx-auto"
                    style="width: 650px; height: 60px;">
                    <input type="password" name="repPass" id="repPassword" class="custom-field form-control  shadow"
                        placeholder="Ulangi Password Baru"
                        style="background-color: #D9D9D9; padding-left: 40px; border-radius: 12px;">
                    <i class="far fa-eye fa-lg pe-auto position-absolute top-50 toggle-password" type="button"
                        style="right: 15px;"></i>
                    <i class="fa-solid fa-lock fa-xl position-absolute top-50 left-2"
                        style="color: #333; margin-left: 15px;"></i>
                </div>

                <div class="text-center">

                    <button class="btn text-white" onclick=""
                        style="width: 200px; background-color: #757575; border-radius: 45px; font-size: 20px">Ganti
                        Password</button>
                </div>
            </div>
            <!-- END -->
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+9Knujsl5/6b5aNCXm5i5aR5xSLt4zBn5c7n7f5Em5zjDfm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-mz6fR3HI0VtpMzj7f5vOxkfdz/75P/R6pPZf5F5u+OGpamoFVy38W5P6sl5F5F5u+OGp" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                var passwordInput = $(this).siblings("input[type='password']");
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    $(this).removeClass("fa-eye");
                    $(this).addClass("fa-eye-slash");
                } else {
                    passwordInput.attr("type", "password");
                    $(this).removeClass("fa-eye-slash");
                    $(this).addClass("fa-eye");
                }
            });
        });
    </script>

</body>

</html>
