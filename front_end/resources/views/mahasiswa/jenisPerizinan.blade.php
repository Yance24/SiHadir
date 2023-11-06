<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- no NavBar yet!! -->

    <!-- Keterangan pilih jenis ijin -->
    <div class="keterangan-container">
        pilih jenis ijin!
    </div>


    <form action="/mahasiswa/perizinan" method="get">
        
        <label class="radioButton-container">
            <input type="radio" name="perizinan" value="Sakit">
            Sakit
        </label>
        <label class="radioButton-container">
            <input type="radio" name="perizinan" value="Izin">
            Izin
        </label>

        <div class="submitButton-container">
            <button type="submit">Selanjutnya</button>
        </div>
    </form>
</body>
</html>