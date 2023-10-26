<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">


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
            background: url("https://raw.githubusercontent.com/Yance24/SiHadir/356e83489517612a5fa574d0387b472f7cd2ec2c/Asset/Images/BG%20Profile.svg");
            background-position: center;
            background-size: cover;
            position: relative;
        }

        input::placeholder {
            color: white;
            padding-left: 20px;
            font-weight: bold;
        }

        .appbar {
            display: none;
            height: 100px;
            background-color: #78A2CC;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        @media screen and (max-width: 925px) {
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

            .form-group {
                width: 100%;
                max-width: 400px;
            }
        }

        @media screen and (max-width: 470px) {
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
                width: 80%;
                max-width: 100%;
            }

            .form-group {
                width: 100%;
                max-width: 400px;
            }
        }
    </style>

</head>

<body>
    <div class="appbar fixed-top">
        <div class="mt-5 ps-2">
            <i class="fa-solid fa-arrow-left fa-xl"></i>
        </div>
        <div class="mx-auto mt-5">
            <h1 class="">Sihadir</h1>
        </div>
    </div>

    <div class="main-container d-flex">
        <!-- SIDEBAR -->
        <div class="sidebar" id="side-nav">
            <div class="header-box custom-profile mb-3">
                <div class="mb-2" style="z-index: 1">
                    <img src="https://raw.githubusercontent.com/Yance24/SiHadir/356e83489517612a5fa574d0387b472f7cd2ec2c/Asset/Images/Photo%20Dosen.svg"
                        alt="profile" class="rounded-circle" width="100px" height="100px">
                </div>
                <div class="" style="z-index: 2">
                    <span class="fw-bold">Ferry Faisal, S.ST., M.T.</span><br>
                    <span>19730206 199501 1 001</span>
                </div>
            </div>
            <div class="d-flex flex-column gap-3 p-2">
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://github.com/Yance24/SiHadir/blob/frontend/Asset/Icon/absensi.png?raw=true"
                        alt="" class=" nav-custom"> Absensi</a>
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://github.com/Yance24/SiHadir/blob/frontend/Asset/Icon/perizinan.png?raw=true"
                        alt="" class=" nav-custom"> Perizinan</a>
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://raw.githubusercontent.com/Yance24/SiHadir/4d74821ba6efca7fbd3730a5a6b0b374a0b3bebc/Asset/Icon/change-password.svg"
                        alt="" class=" nav-custom"> Ganti
                    Password</a>
                <hr>
                <a href="/" class="text-decoration-none text-white">
                    <img src="https://raw.githubusercontent.com/Yance24/SiHadir/ec1b7bd7250a571f17cca9006ee97b8f941e3e3f/Asset/Icon/logout.svg"
                        alt="" class=" nav-custom"> Logout</a>
            </div>
        </div>
        <!-- END -->

        <!-- CONTENT -->
        <div class="content" style="margin-top: 180px;">
            <div class="main-content container-fluid d-block mx-auto">
                <div class="logo text-center mb-3">
                    <img src="https://github.com/Yance24/SiHadir/blob/frontend/Asset/Icon/key.png?raw=true"
                        alt="" width="190px" class="custom-icon">
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
                        style="background-color: #D9D9D9; padding-left: 40px; border-radius: 12px;">
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
                } else {
                    passwordInput.attr("type", "password");
                }
            });
        });
    </script>

</body>

</html>
