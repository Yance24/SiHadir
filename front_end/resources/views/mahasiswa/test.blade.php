@extends('layouts.appbarMobile')


@section('extra-css-js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous">
    <link href="asset('css/mahasiswa/dashboard.css')" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('assets/js/pemindai.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </section>


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                <div class="col-sm-12">
                    <video id="preview" class="p-1 border" style="width:100%;"></video>
                </div>
                <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                    </label>
                </div>
            </div>
        </div>
    </div>
