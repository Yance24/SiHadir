@extends('layouts.appbarGantiPassword')

@section('extra-css-js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+9Knujsl5/6b5aNCXm5i5aR5xSLt4zBn5c7n7f5Em5zjDfm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-mz6fR3HI0VtpMzj7f5vOxkfdz/75P/R6pPZf5F5u+OGpamoFVy38W5P6sl5F5F5u+OGp" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/gantiPassword.js') }}"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/gantiPassword.css') }}">
    </section>

    <form action="<?php echo route('validate-changePassword')?>" method="POST">
    @csrf
    <div class="main-content container d-block mx-auto">
        <div class="logo text-center mb-3">
            <img src="https://github.com/Yance24/SiHadir/blob/frontend/Asset/Icon/key.png?raw=true" alt=""
                width="190px" class="custom-icon">
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
            <i class="fa-solid fa-lock fa-xl position-absolute top-50 left-2" style="color: #333; margin-left: 15px;"></i>
        </div>

        <!-- Untuk input password baru -->
        <div class="mb-3 form-group input-group password-toggle position-relative mx-auto"
            style="width: 650px; height: 60px;">
            <input type="password" name="newPass" id="newPassword" class="custom-field form-control  shadow"
                placeholder="Masukkan Password Baru"
                style="background-color: #D9D9D9; padding-left: 40px;  border-radius: 12px;">
            <i class="far fa-eye fa-lg pe-auto position-absolute top-50 toggle-password" type="button"
                style="right: 15px;"></i>
            <i class="fa-solid fa-lock fa-xl position-absolute top-50 left-2" style="color: #333; margin-left: 15px;"></i>
        </div>

        <!-- Untuk input konfirmasi password baru -->
        <div class="mb-5 form-group input-group password-toggle position-relative mx-auto"
            style="width: 650px; height: 60px;">
            <input type="password" name="repPass" id="repPassword" class="custom-field form-control  shadow"
                placeholder="Ulangi Password Baru"
                style="background-color: #D9D9D9; padding-left: 40px; border-radius: 12px;">
            <i class="far fa-eye fa-lg pe-auto position-absolute top-50 toggle-password" type="button"
                style="right: 15px;"></i>
            <i class="fa-solid fa-lock fa-xl position-absolute top-50 left-2" style="color: #333; margin-left: 15px;"></i>
        </div>

        <div class="text-center">
            <button class="btn text-white" onclick=""
                style="width: 200px; background-color: #757575; border-radius: 45px; font-size: 20px">Ganti
                Password
            </button>
        </div>
    </div>
    </form>
