@extends('layouts.appbarMobile')

@section('extra-css-js')
    <!-- Sisipkan CSS dan JavaScript yang diperlukan untuk PDF.js di sini -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf_viewer.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
    <!-- Akhir sisipan CSS dan JavaScript -->

    <!-- Gaya CSS khusus untuk tampilan PDF -->
    <style>
        /* Sesuaikan tampilan sesuai kebutuhan */
        .pdf-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        canvas {
            border: 1px solid #333;
            box-shadow: 2px 2px 5px #888;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="pdf-container">
            <canvas id="pdfCanvas"></canvas>
        </div>
    </div>
    <script>
        // Ambil data PDF dari localStorage
        const cachedPDF = localStorage.getItem("cachedPDF");

        if (cachedPDF) {
            const canvas = document.getElementById("pdfCanvas");
            const context = canvas.getContext("2d");
            
            // Dekode data PDF
            const pdfData = atob(cachedPDF.split(",")[1]);

            // Inisialisasi PDF.js
            pdfjsLib.getDocument({ data: pdfData }).promise.then(function (pdf) {
                pdf.getPage(1).then(function (page) {
                    const scale = 1.5;
                    const viewport = page.getViewport({ scale });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function () {
                        // Pratinjau PDF selesai ditampilkan
                    });
                });
            });
        } else {
            alert("Belum ada file PDF yang diunggah.");
        }
    </script>
@endsection
