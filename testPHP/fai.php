<?php
// Deklarasi variabel
$nama = "John";
$umur = 30;

// Percabangan
if ($umur < 18) {
    $status = "anak-anak";
} elseif ($umur < 30) {
    $status = "dewasa muda";
} else {
    $status = "dewasa";
}

// Perulangan dengan for
echo "Perulangan menggunakan for:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo "Iterasi ke-$i<br>";
}

// Perulangan dengan foreach
$angka = [1, 2, 3, 4, 5];
echo "<br>Perulangan menggunakan foreach:<br>";
foreach ($angka as $nilai) {
    echo "Nilai: $nilai<br>";
}

// Fungsi
function sapa($nama)
{
    return "Halo, $nama!";
}

$pesanSapaan = sapa($nama);


// Array
$buah = ["Apel", "Jeruk", "Mangga"];
echo "<br>Daftar Buah:<br>";
foreach ($buah as $buah_item) {
    echo "Buah: $buah_item<br>";
}

// Output pesan sapaan dan status
echo "<br>$pesanSapaan, Anda adalah seorang $status.";
