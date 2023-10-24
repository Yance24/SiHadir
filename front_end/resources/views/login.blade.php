<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .bg-custom {
            background: url("{{ asset('images/bg-main.jpeg') }}") center;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #99BBEC;
            background-size: cover;
            background-repeat: no-repeat;
            height: 70vh;
            border-radius:0 0 40px 40px;
            position: relative;
        }

        .bg-custom::before {
            content: "";

            opacity: 0.7;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            z-index: -1;
        }



        .password-toggle i {
            right: 10px;
            transform: translateY(-50%);
        }

        @media screen and (max-width: 768px) {
            form {
                max-width: 80%;
                height: 300px;
                padding: 15px;
            }

            .custom-header {
                font-size: 32px;
                padding-bottom: 34px;
            }

            .bg-custom {
                height: 50vh;
            }

            .custom-logo {
                width: 113px;
            }
        }

        @media screen and (max-height: 700px) {
            form {
                height: 200px;
            }
        }
    </style>
</head>

<body class="p-0 m-0">
    <div class="bg-custom">
        <div class="container d-flex flex-column align-items-center justify-content-center" style="z-index: 1;">
            <img class="custom-logo mx-auto mb-3 mt-5" src="{{ asset('images/logo-polnep.png') }}" alt="logo polnep"
                width="150px" style="padding-bottom: 24px;">
            <h1 class="custom-header text-center text-dark text-white font-weight-bolder mb-3" style="font-size: 64px;">
                SiHadir</h1>
            <form
                class="bg-light font-weight-bold text-center p-4 shadow mb-5 mx-auto pb-5 shadow align-content-center justify-center"
                action="login.php" style="width: 550px; height: auto; border-radius: 45px;">
                <div class="mb-3 mt-3 pb-4">
                    <input type="text" name="username" placeholder="USERNAME" class="form-control rounded-pill">
                </div>
                <div class="mb-3 form-group input-group password-toggle position-relative">
                    <input type="password" class="form-control rounded-pill" placeholder="PASSWORD" name="password">
                    <i class="far fa-eye fa-lg pe-auto position-absolute top-50" id="password-toggle"
                        type="button"></i>
                </div>
                <div class="text-start p-2" style="margin-bottom: 100px">
                    <a href="" class="text-decoration-none">Lupa Password?</a>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-75 rounded-pill"
                        style="background-color: #99BBEC">Login</button>
                </div>
            </form>
        </div>
        <footer class="text-center mt-4 pb-2">
            <span class="text-dark fs-5 font-weight-bold">V.0.1.0.</span>
        </footer>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var passwordInput = $("#password");
        var passwordToggle = $("#password-toggle");

        passwordToggle.click(function() {
            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                passwordToggle.removeClass("fa-eye");
                passwordToggle.addClass("fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                passwordToggle.removeClass("fa-eye-slash");
                passwordToggle.addClass("fa-eye");
            }
        });
    });
</script>

</html>
