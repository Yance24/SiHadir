<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" type="text/css" href="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/resources/css/style-sidebar.css" media="screen and (min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/resources/css/style-dashboard.css" media="screen and (min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="https://github.com/Yance24/SiHadir/blob/frontend/testPHP/resources/css/style-android-dashboard.css" media="screen and (max-width: 767px)"> --}}

    <style>
        html {
  width: 100%;
}

body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color: #ffffff; /* Warna latar belakang putih, karena biasanya perangkat Android menggunakan latar belakang putih. */
}

.sidebar {
  margin: 0px;
  padding: 0;
  width: 100%; /* Lebar 100% agar memenuhi layar Android */
  background-color: #78a2cc;
  position: relative; /* Ubah menjadi relative agar tidak tetap di posisi fixed */
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

.sidebar a.active {
  background-color: #b2d2f2;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin: 0; /* Menghapus margin agar tidak ada jarak dari sisi layar */
  padding: 1px 16px;
}

.profile-images {
  text-align: center;
  background-image: url("/images/BG Profile.svg");
  width: 100%; /* Lebar 100% agar memenuhi layar Android */
  height: 200px; /* Mengurangi tinggi gambar */
  background-size: cover;
}

.profile-images .photo-dosen {
  margin-left: 50%; /* Memposisikan gambar di tengah layar */
  transform: translateX(-50%); /* Menggeser gambar ke kiri 50% dari pusatnya */
  width: 100px;
  border-radius: 50%;
  position: absolute;
  right: auto; /* Menghapus posisi absolute */
  top: 100px; /* Mengubah posisi top */
  left: 50%; /* Mengubah posisi left */
  transform: translateX(-50%); /* Menggeser gambar ke kiri 50% dari pusatnya */
  z-index: 1;
}

.text-overlay {
  font-size: 12px; /* Mengurangi ukuran font */
  position: relative;
  top: 120px; /* Mengubah posisi top */
  right: 0; /* Menghapus posisi right */
  color: #000000; /* Warna teks hitam */
  font-weight: bold;
}

.text-overlay2 {
  font-size: 12px; /* Mengurangi ukuran font */
  position: relative;
  top: 10px; /* Mengubah posisi top */
  right: 0; /* Menghapus posisi right */
  color: #000000; /* Warna teks hitam */
  font-weight: normal;
}

.nav hr {
  border: none;
  border-top: 1px solid #000000; /* Warna garis hitam */
  margin: 1px 0;
}

.nav a {
  display: block; /* Mengubah tampilan menjadi blok */
  color: #000000; /* Warna teks hitam */
  padding: 10px; /* Mengurangi padding */
  text-decoration: none;
}

span {
  font-size: 14px; /* Mengubah ukuran font */
  color: #000000; /* Warna teks hitam */
  padding-left: 15px;
}

.jadwal-container {
  margin: 10px; /* Menambah margin untuk memberikan jarak */
  padding: 0px;
  background-color: #f0f0f0;
  border-radius: 10px; /* Mengurangi radius sudut */
  width: 100%; /* Lebar 100% agar memenuhi layar Android */
  box-shadow: 0px 10px 4px 0px rgba(0, 0, 0, 0.25); /* Mengurangi ukuran bayangan */
}

.mata-kuliah {
  font-weight: bold;
  font-size: 24px; /* Mengurangi ukuran font */
}

.jam {
  font-weight: normal;
  font-size: 20px; /* Mengurangi ukuran font */
}

h2 {
  font-size: 20px; /* Mengurangi ukuran font */
}

.generate-qr {
  background-color: #78a2cc;
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  margin: 10px 0;
  width: 100%; /* Lebar 100% agar memenuhi layar Android */
  cursor: pointer;
}

.gariscontainer {
  border: 2px solid #757575; /* Mengurangi ketebalan border */
  margin: 10px 0; /* Menambah margin */
}

.center-content {
  display: flex;
  align-items: center;
  justify-content: center;
}
html {
  width: 100%;
  overflow: hidden;
}

div.content {
  margin-left: 330px;
  padding: 1px 16px;
  height: 1000px;
}

.jadwal-container {
  position: relative;
  left: 30px;
  /* Atur left untuk menggeser container ke kanan */
  border: 1px solid #000;
  padding: 20px;
  margin: 10px;
  background-color: #f0f0f0;
  border-radius: 15px;
  align-items: center;
  width: 900px;
  /* Atur lebar maksimum sesuai keinginan Anda */
  overflow: hidden;
  /* Mengatur overflow ke "hidden" agar elemen dalam container tidak tertutup oleh container */
  box-shadow: 0px 20px 4px 0px rgba(0, 0, 0, 0.25);
  /* x-offset y-offset blur-radius spread-radius warna */
}

.mata-kuliah {
  font-weight: bold;
  font-size: 56px;
  flex: 1;
  /* Tambahkan ini untuk mengisi ruang tersisa */
}

.jam {
  font-weight: normal;
  font-size: 40px;
  flex: 1;
  /* Tambahkan ini untuk mengisi ruang tersisa */
}

h2 {
  font-size: 32px;
  position: relative;
  margin-bottom: 0px;
  left: 40px;
}

.content p {
  font-size: 1000px;
}

.center-content {
  background-color: #78a2cc;
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  margin: 0;
  width: 320px;
  /* Lebar elemen */
  height: 100px;
  right: 170px;
  bottom: 205px;
  /* Tinggi elemen */
  /* Menghilangkan margin kanan dan mengatur margin atas dan bawah */
  cursor: pointer;
  position: relative;
  float: right;
  /* Mengatur tombol di sebelah kanan container */
  z-index: 1;
  box-shadow: 0px 20px 4px 0px rgba(0, 0, 0, 0.25);
  /* x-offset y-offset blur-radius spread-radius warna */
  border-radius: 15px;
  cursor: pointer;
}

.gariscontainer {
  border: 4px solid #757575;
  /* Atur ketebalan border sesuai preferensi (dalam contoh ini 2px) dan warna border (#000) */
  margin: 1px 0;
  /* Atur margin atas dan bawah sesuai keinginan Anda */
}

.center-content {
  display: flex;
  align-items: center;
  justify-content: center;
}

#generate-qr-button {
  background: transparent;
  border: none;
  display: flex;
  cursor: pointer;
}

.qr-patch {
  text-align: center;
  font-size: 36px;
  position: relative;
  display: none;
  border: 2px solid #ccc;
  padding: 10px;
  margin-left: 780px;
  width: 1570px;
  height: 950px;
  background-color: #fff;
  position: absolute;
  transform: translate(-50%, -50%);
  z-index: 9999;
}

.qr-code {
  width: 600px;
  /* Lebar yang Anda inginkan */
  height: 600px;
  /* Tinggi yang Anda inginkan */
}
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0px;
  padding: 0;
  width: 330px;
  background-color: #78a2cc;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

.sidebar a.active {
  background-color: #b2d2f2;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}
.profile-images {
  text-align: center;
  position: relative;

  background-image: url("/front-end/images/BG Profile.svg");
  width: 330px;
  /* Sesuaikan ukuran gambar sesuai kebutuhan */
  height: 250px;
  /* Sesuaikan tinggi gambar sesuai kebutuhan */
  background-size: cover;
}

.profile-images .photo-dosen {
  margin-left: 100px;
  width: 100px;
  /* Sesuaikan ukuran gambar sesuai kebutuhan */
  border-radius: 50%;
  /* Ini akan membuat gambar dalam elips */
  position: absolute;
  right: 215px;
  /* Sesuaikan dengan nilai x yang Anda inginkan */
  top: 70px;
  /* Sesuaikan dengan nilai y yang Anda inginkan */
  z-index: 1;
}

.text-overlay {
  font-size: 15px;
  position: relative;
  top: 190px;
  right: 70px;
  color: #ffffff;
  font-weight: bold;
}

.text-overlay2 {
  font-size: 15px;
  position: relative;
  top: 200px;
  right: 70px;
  color: #ffffff;
  font-weight: normal;
}

.nav hr {
  border: none;
  border-top: 1px solid #ffffff;
  /* Warna dan ketebalan garis sesuaikan dengan preferensi Anda */
  margin: 1px 0;
  /* Atur margin atas dan bawah sesuai keinginan Anda */
}

.nav a {
  display: flex;
  align-items: center;
  padding-left: 10px; /* Ubah angka sesuai kebutuhan Anda */
  color: #ffffff;
}

.nav img {
  margin-right: 10px; /* Untuk memberikan jarak antara ikon dan teks */
}

    </style>
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <!-- Pembatas Sidebar -->
    <div class="sidebar">
        <div class="profile-images">
            <img src="Asset\Images\Photo Dosen.svg" alt="Foto Anda" class="photo-dosen">
            <div class="text-overlay">Ferry Faisal, S.ST., M.T.</div>
            <div class="text-overlay2">19730206 199501 1 001</div>

        </div>

        <div class="nav">
            <a class="active" href="dashboard.html">
                <img src="/front-end/images/table 1.svg" alt="Absen">
                <span>Absen</span>
            </a>
            <a href="perizinan.html">
                <img src="/front-end/images/mail 1.svg" alt="Perizinan">
                <span>Perizinan</span>
            </a>
            <a href="#contact">
                <img src="/front-end/images/lock 1.svg" alt="Ganti Password">
                <span>Ganti Password</span>
            </a>
            <hr>
            <a href="#about">
                <img src="/front-end/images/log-out 1.svg" alt="Log Out">
                <span>Log Out</span>
            </a>
        </div>
    </div>
    <!-- Pembatas Sidebar -->

    <div class="content">
        <br>
        <p style="font-size: 32px; ;">Halo, <b>Ferry Faisal, S.ST., M.T.</b></p>
        <br>
        <br>
        <h2 style="display: flex; align-items: center;">
            <img src="/front-end/images/table 4.png" alt="Jadwal Sekarang"
                style="width: 45px; height: 50px; margin-right: 10px;">
            Jadwal Sekarang
        </h2>

        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah">PBL</div>
                <hr class="gariscontainer">
                <div class="jam">07:00 - 11:00</div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <div class="center-content">
            <button id="generate-qr-button">
                <img src="/front-end/images/qr-code 1.svg" alt="Generate QR" style="width: 45px; height: 50px;">
                <span style="margin-left: 12px; font-size: 34px;">Generate QR</span>
        </div>
        </button>
        <!-- Patch Generate QR -->
        <div id="qr-patch" class="qr-patch">
            <h1>Generate QR Code</h1>
            <div class="container-fluid">
                <div class="text-center">
                    <!-- Get a Placeholder image initially,
                   this will change with a unique QR Code
                   every time the button is pressed -->
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=UniqueQRCode&chs=160x160&chld=L|0"
                        class="qr-code img-thumbnail img-responsive" alt="QR Code" />
                </div>

                <div class="form-horizontal">
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>

        <img src="/front-end/images/table 1.svg" alt="Jadwal Sekarang">
        <h2 style="display: flex; align-items: center;">
            <img src="/front-end/images/table 4.png" alt="Jadwal Sekarang"
                style="width: 45px; height: 50px; margin-right: 10px;">
            Jadwal Selanjutnya
        </h2>
        <div class="jadwal-container">
            <div class="jadwal-info">
                <div class="mata-kuliah">PEMROGRAMAN WEB</div>
                <hr class="gariscontainer">
                <div class="jam">12:00 - 16:00</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <script>
        // Ambil tombol Generate QR dan patch Generate QR
        var generateQRButton = document.getElementById("generate-qr-button");
        var qrPatch = document.getElementById("qr-patch");

        // Tambahkan event listener untuk tombol Generate QR
        generateQRButton.addEventListener("click", function () {
            // Tampilkan patch Generate QR saat tombol ditekan
            qrPatch.style.display = "block";
            // Di sini Anda dapat menambahkan konten untuk patch Generate QR sesuai kebutuhan Anda
        });


        // untuk qr code generate
        // Function to HTML encode the text
        // This creates a new hidden element,
        // inserts the given text into it 
        // and outputs it out as HTML
        function htmlEncode(value) {
            return $('<div/>').text(value)
                .html();
        }

        $(function () {
            // Specify an onclick function for the generate button
            $('#generate-qr-button').click(function () {
                // Generate a unique QR Code with a random value
                let randomValue = Math.random().toString(36).substr(2, 5);
                let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' + randomValue + '&chs=160x160&chld=L|0';
                // Replace the src of the image with the new QR code
                $('.qr-code').attr('src', finalURL);
            });
        });




    </script>
</body>

</html>