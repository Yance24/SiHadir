@extends('layouts.appbarMobile')

@section('extra-css-js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <style>
            .container {
                display: none;
            }
    
            @media screen and (max-width: 767px) {
                .container {
                    display: block;
                }
            }
        </style>
</section>

<div class="container" style="margin-top: 100px">
    <div class="text-center">
        <label class="p-3" style="font-size: 14px;">Pilih Jenis <b>Absen!</b></label>
    </div>

    <div class="my-5">
        <div class="col-12 col-lg-5 mx-auto">
            <div class="form-check mb-5 d-flex align-items-center justify-content-center rounded"
                style="background-color: #FFF; box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); width: 100%; max-width: 350px; height: 75px; border-radius: 15px;">
                <input class="form-check-input ms-2" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                    style="width: 20px; height: 20px;">
                <label class="form-check-label text-center w-100"
                    style="color: #000; font-family: Inter; font-size: 40px; font-style: normal; font-weight: 400; line-height: normal;">
                    Izin
                </label>
            </div>
        </div>

        <div class="col-12 col-lg-5 mx-auto">
            <div class="form-check mb-5 d-flex align-items-center justify-content-center rounded"
                style="background-color: #FFF; box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); width: 100%; max-width: 350px; height: 75px; border-radius: 15px;">
                <input class="form-check-input ms-2" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                    checked style="width: 20px; height: 20px;">
                <label class="form-check-label text-center w-100"
                    style="color: #000; font-family: Inter; font-size: 40px; font-style: normal; font-weight: 400; line-height: normal;">
                    Sakit
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="btn btn-secondary">
            <a href="{{ route('perizinan') }}" class="text-decoration-none text-dark">
                <span class="fw-bold text-white">Selanjutnya</span>
            </a>
        </div>
    </div>
</div>

