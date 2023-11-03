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

        @media screen and (min-width :951px) {
            .container {
                display: none;
            }
        }
    </style>
    </section>
@section('content')
    
@endsection

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
                    <div class="custom-file d-flex justify-content-end align-items-center">
                        <a href="#" id="pratinjauButton" class="btn btn-primary rounded-pill text-center d-flex align-items-center justify-content-center fs-2" style="margin-right: 10px; width: 200px; height: 70px;" disabled>Pratinjau</a>
                        <div class="m-l-3 rounded-circle bg-primary border">
                            <i class="fa-solid fa-paperclip fa-2xl" id="fileInputIcon" style="cursor: pointer; font-size: 50px;"></i>
                        </div>
                        <div>
                            <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInputAddon" style="opacity: 0; position: absolute; top: 0; left: 0;">
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
    <script>
        // Get references to elements
        const fileInput = document.getElementById("fileInput");
        const pratinjauButton = document.getElementById("pratinjauButton");
        const pdfCanvas = document.getElementById("pdfCanvas");
        const pdfPreview = document.getElementById("pdfPreview");
    
        // Function to handle the file input change
        fileInput.addEventListener("change", function() {
            const file = this.files[0];
    
            if (file) {
                const fileName = file.name;
    
                if (fileName.endsWith(".pdf")) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const pdfData = event.target.result;
    
                        // Save the PDF data to web storage
                        sessionStorage.setItem("cachedPDF", pdfData);
    
                        // Enable the "Pratinjau" button after a PDF is uploaded
                        pratinjauButton.disabled = false;
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Berkas harus berformat PDF untuk dapat dilihat.");
                }
            }
        });
    
        // Function to trigger file input by clicking the paperclip icon
        document.querySelector(".fa-paperclip").addEventListener("click", function() {
            fileInput.click();
        });
    
        // Function to open the popup
        pratinjauButton.addEventListener("click", function() {
            document.getElementById("pdfPopup").style.display = "block";
            previewPDF();
        });
    
        // Function to close the popup
        document.getElementById("closePopupButton").addEventListener("click", function() {
            document.getElementById("pdfPopup").style.display = "none";
        });
    
        function previewPDF() {
            const cachedPDF = sessionStorage.getItem("cachedPDF");
    
            if (cachedPDF) {
                // Get the canvas element to display the PDF
                const canvas = document.createElement("canvas");
                const context = canvas.getContext("2d");
                pdfPreview.appendChild(canvas);
    
                // Use PDF.js to render the PDF
                const pdfData = atob(cachedPDF.split(",")[1]); // Decode PDF data
                const loadingTask = pdfjsLib.getDocument({
                    data: pdfData
                });
    
                loadingTask.promise.then(function(pdf) {
                    pdf.getPage(1).then(function(page) {
                        const viewport = page.getViewport({
                            scale: 1
                        });
                        const scale = pdfPreview.offsetWidth / viewport.width;
    
                        canvas.height = viewport.height * scale;
                        canvas.width = pdfPreview.offsetWidth;
    
                        const renderContext = {
                            canvasContext: context,
                            viewport: page.getViewport({
                                scale
                            })
                        };
    
                        page.render(renderContext).promise.then(function() {
                            pdfPreview.style.display = "block";
                        });
                    });
                });
            } else {
                alert("Belum ada file PDF yang diunggah.");
            }
        }
    </script>
    
