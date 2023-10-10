<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator BMI</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Kalkulator BMI</h1>
        <form action="calculate_bmi.php" method="POST">
            <label for="weight">Berat Badan (kg):</label>
            <input type="number" name="weight" required><br>

            <label for="height">Tinggi Badan (cm):</label>
            <input type="number" name="height" required><br>

            <input type="submit" value="Hitung BMI">
        </form>
    </div>
</body>

</html>