@extends('layouts.appbarMobile')

@section('layouts.title', 'Dashboard')

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

    <div class="content container" style="margin-top:100px; overflow-x:hidden;">
        <div class="mb-5 pl-3 pt-3" style="">
            <span style="font-size: 14px;">halo, <b>Weldy Flaminggo</b></span>
        </div>
        <div class="main-content">
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
                                <form action="/scanner" method="POST">
                                    @csrf
                                    <div class="text-center">
                                        <button id="absenButton" class="btn btn-primary shadow-lg rounded-3"
                                            style="width: 200px; height: 50px">
                                            Absen
                                        </button>
                                    </div>
                                </form>
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
                                <form action="/scanner" method="POST">
                                    @csrf
                                    <div class="text-center">
                                        <button id="absenButton" class="btn btn-primary shadow-lg rounded-3"
                                            style="width: 200px; height: 50px">
                                            Absen
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
