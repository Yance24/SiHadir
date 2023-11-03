@extends('layouts.appbarMobile')

@section('extra-css-js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous">
    </section>

    <div class="content-fluid" style="margin-top: 100px;">
        <div class="bg-custom mb-3 p-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('assets/img/profile-pict.png') }}" width="100px" alt="profile">
                </div>
                <div class="col">
                    <span class="text-dark fw-bold">Weldy Flamingo</span>
                    <div class="row pb-2">
                        <div class="col">
                            <span class="text-dark">3202116038</span>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 10px;">
                        <button class="btn btn-danger rounded-pill d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 25px;">
                            <span style="font-size: 15px;">SP2</span>
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white text-dark mb-2" style="padding-left: 10px;"><span class="p-2 fw-bold">Status
                    Kehadiran</span></div>
            <div class="alert alert-light alert-dismissible fade show m-0 text-dark" role="alert">
                <img src="{{ asset('assets/icon/izin.png') }}" alt="izin">
                <span class="fw-bold">Jumlah Izin</span>
                <span class="badge bg-danger position-relative right-3">1</span>
            </div>
            <div class="alert alert-light alert-dismissible fade show m-0 text-dark" role="alert">
                <img src="{{ asset('assets/icon/sakit.png') }}" alt="sakit">
                <span class="fw-bold">Jumlah Sakit</span>
                <span class="badge bg-danger ml-auto">1</span>
            </div>
            <div class="alert alert-light alert-dismissible fade show text-dark" role="alert">
                <img src="{{ asset('assets/icon/alpa.png') }}" alt="alpa">
                <span class="fw-bold">Jumlah Alpa</span>
                <span class="badge bg-danger ml-auto">1</span>
            </div>
        </div>

        <div class="text-dark mb-3 d-flex justify-content-start align-items-center"
            style="background-color: #F0F0F0; height: 34px;">
            <span class="p-2 fw-bold">Security</span>
        </div>

        <div class="bg-transparent m-3">
            <img src="{{ asset('assets/icon/lock.png') }}" alt="">
            <span class="fw-bold">Ganti Password</span>
        </div>
    </div>
