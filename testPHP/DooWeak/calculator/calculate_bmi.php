<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $height = $_POST["height"] / 100; // Mengubah tinggi ke meter

    $bmi = $weight / ($height * $height);

    echo "BMI Anda adalah: " . number_format($bmi, 2);

    if ($bmi < 18.5) {
        echo "<br>Anda termasuk ke dalam kategori Berat Badan Kurang!";
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        echo "<br>Anda termasuk ke dalam kategori Berat Badan Normal.";
    } elseif ($bmi >= 24.9 && $bmi < 29.9) {
        echo "<br>Anda termasuk ke dalam kategori Kelebihan Berat Badan.";
    } else {
        echo "<br>Anda termasuk ke dalam kategori Obesitas.";
    }
}
