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

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/mahasiswa/perizinan.css') }}">

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
    <script src="{{ asset('assets/js/mahasisiswa/perizinan.js') }}"></script>

    </section>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="row-md-6 mt-5">
                <div class="first mb-5">
                    <h1 class="fw-bold" style="font-size: 26px;">PBL</h1>
                    <hr>
                    <span>07.00 AM - 12.00 AM</span>
                </div>
            </div>
            <div class="row-md-6">
                <div class="second mb-5">
                    <h1 class="fw-bold" style="font-size: 26px;">PBL</h1>
                    <hr>
                    <span>07.00 AM - 12.00 AM</span>
                </div>
            </div>
            <div class="row">
                <div class="input-group d-block justify-content-center">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="fileName" placeholder="Nama Berkas" readonly>
                    </div>
                    <div class="custom-file d-flex justify-content-center align-items-center ms-2">
                        <div>
                            <a href="#" id="pratinjauButton"
                                class="btn btn-primary rounded-pill text-center d-flex align-items-center justify-content-center fs-2"
                                style="width: 200px; height: 70px;" disabled>Pratinjau
                            </a>
                        </div>
                        <div class="m-l-3 rounded-circle border">
                            <input type="file" id="fileInput" accept=".pdf" aria-describedby="fileInputAddon"
                                style="display: none;">
                            <div class="float-right">
                                <label for="fileInput">
                                    <i class="fa-solid fa-paperclip fa-2xl" style="cursor: pointer; font-size: 50px;"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popup -->
        <div id="pdfPopup" class="popup">
            <div class="popup-content">
                <span class="close" id="closePopupButton">&times;</span>
                <div id="pdfPreview" class="pdf-preview">
                    <canvas id="pdfCanvas"></canvas>
                </div>
                <div class="button-container">
                    <button id="sendButton" class="btn btn-primary">Kirim</button>
                    <button id="cancelButton" class="btn btn-secondary">Batal</button>
                </div>
            </div>
        </div>
    </div>
