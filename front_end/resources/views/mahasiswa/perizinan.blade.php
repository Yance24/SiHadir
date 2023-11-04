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

    <?php
    $schedule = session()->get('schedule');
    
    ?>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            
            <!-- Menampilkan jadwal-jadwal pelajaran -->
            @foreach($schedule as $item)
            <div class="row-md-6 mt-5">
                <div class="first mb-5">
                    <h1 class="fw-bold" style="font-size: 26px;"><?php echo $item->mataKuliah->nama_makul; ?></h1>
                    <hr>
                    <span><?php echo date('H:i',strtotime($item->jam_mulai)) . ' - ' . date('H:i',strtotime($item->jam_selesai)); ?></span>
                </div>
            </div>
            @endforeach
            <!-- <div class="row-md-6">
                <div class="second mb-5">
                    <h1 class="fw-bold" style="font-size: 26px;">PBL</h1>
                    <hr>
                    <span>07.00 AM - 12.00 AM</span>
                </div>
            </div> -->
            <div class="row">
                <div class="input-group d-block justify-content-center">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="fileName" placeholder="Nama Berkas" readonly>
                    </div>
                    <div class="custom-file d-flex justify-content-end align-items-center ms-2">
                        <a href="#" id="pratinjauButton"
                            class="btn btn-primary rounded-pill text-center d-flex align-items-center justify-content-center fs-2"
                            style="width: 200px; height: 70px;" disabled>Pratinjau</a>
                        <div class="m-l-3 rounded-circle bg-primary border">
                            <i class="fa-solid fa-paperclip fa-2xl" id="fileInputIcon"
                                style="cursor: pointer; font-size: 50px;"></i>
                        </div>
                        <div class="d-flex" style="opacity: 0;">
                            <input type="file" class="custom-file-input" id="fileInput"
                                aria-describedby="fileInputAddon">
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
