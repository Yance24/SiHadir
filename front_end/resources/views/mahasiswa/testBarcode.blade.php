@section('css-js')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            background: #000;
        }

        video {
            object-fit: cover;
            background: #000;
            width: 100%;
            height: 100%;
        }

        .console {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            min-height: 15vh;
            padding: 0.5rem 1rem;
            word-break: break-all;
            font-size: 1.25rem;
            color: #fff;
            text-shadow: 0 0 0.25rem #000, 0 0 0.25rem #000, 0 0 0.25rem #000;
            background-color: rgba(0, 0, 0, 0.7);
            border-top: 0.0625rem solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0.25rem #000;
        }
    </style>
    
    </section>

    <video playsinline></video>
    <div class="console">
        <h1>Scan QR Code Absensi yang dibagikan!</h1>
        <select id="pilihKamera" style="max-width: 400px"></select>
        <br>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Batal</a>
    </div>
    <script src="{{ asset('assets/js/mahasiswa/testBarcode.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>