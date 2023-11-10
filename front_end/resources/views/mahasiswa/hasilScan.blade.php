<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Lain</title>
</head>
<body>
    <div id="scannedData"></div>

    <script>
        // Ambil data pemindaian dari sessionStorage
        var scannedData = sessionStorage.getItem('scannedData');

        // Tampilkan data pemindaian pada halaman
        document.getElementById('scannedData').innerText = `Data yang Dipindai: ${scannedData}`;
    </script>
</body>
</html>
