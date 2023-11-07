@extends('layouts.appbar')

@section('extra-css-js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous">
    <!-- CSS -->
    <link href="{{ asset('assets/css/mahasiswa/pemindai.css') }}" rel="stylesheet">
    <!-- JS -->
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/mahasiswa/pemindai.js') }}"></script>
    </section>

    <div class="border m-2 bg-danger" style="margin-top: 150px;">
        <video id="previewKamera" style="width: 100%; height: 85%;"></video>
        <br>
        <select id="pilihKamera" style="max-width: 400px"></select>
        <br>
        <input type="text" id="hasilscan">
        <a href="" class="btn btn-primary">Batal</a>
    </div>