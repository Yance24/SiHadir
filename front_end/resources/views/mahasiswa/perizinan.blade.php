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

    <style>
        .first,
        .second {
            border-radius: 15px;
            border: 1px solid #78A2CC;
            background: #FFF;
            box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
            max-width: 100%;
            padding: 20px;
            margin: 10px;
        }
        @media screen and (min-width :951px){
            .container {
                display: none;
            }
        }
    </style>

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
                <div class="custom-file d-flex justify-content-center align-items-center">
                    <a href="/" class="btn btn-primary rounded-pill text-center" style="margin-right: 10px; width: 200px; height: 70px;">Pratinjau</a>
                    <i class="fa-solid fa-paperclip fa-2xl" id="fileInputIcon" style="cursor: pointer;"></i>
                    <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInputAddon" style="opacity: 0; position: absolute; top: 0; left: 0;">
                </div>
            </div>
        </div>            
    </div>
</div>
<script>
    // Update the file name when a file is selected
    document.getElementById('fileInput').addEventListener('change', function() {
        const fileName = this.files[0].name;
        document.querySelector('.custom-file-label').textContent = fileName;
    });

    // Function untuk paperclip icon
    document.querySelector('.fa-paperclip').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });
</script>
