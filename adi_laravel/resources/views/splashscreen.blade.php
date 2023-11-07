<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Splash Screen Example</title>
</head>

<body>
    <div class="splash-screen" id="splash-screen">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-6">
                    <img src="{{asset('assets/logo/logo-polnep.png')}}" alt="" width="200px">
                </div>
            </div>
        </div>
        <!-- Tambahkan bar loading di sini -->
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%"></div>
        </div>
    </div>

    <div class="login-page" id="login-page">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-6">
                    <!-- Isi halaman login di sini -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Mengambil elemen splash screen dan halaman login
    const splashScreen = document.getElementById('splash-screen');
    const loginPage = document.getElementById('login-page');

    // Menunggu animasi splash screen selesai
    setTimeout(() => {
        splashScreen.style.display = 'none';
        loginPage.style.display = 'block';

        // Mengarahkan ke halaman login menggunakan route('login')
        window.location.href = "{{ route('login') }}";
    }, 2000); // 2000 milidetik (2 detik) adalah durasi animasi splash screen
</script>

</html>
