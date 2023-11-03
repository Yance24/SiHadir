<?php
// Output
echo "Halo, dunia!<br>";


// Variabel
$nama = "John Doe";
$usia = 30;

// Tipe Data
$angka = 42; // Integer
$desimal = 3.14; // Float
$teks = "Ini adalah string"; // String
$benar = true; // Boolean

// Percabangan (if-else)
if ($usia >= 18) {
    echo "Anda sudah dewasa.<br>";
} else {
    echo "Anda masih anak-anak.<br>";
}

// Perulangan (for)
for ($i = 0; $i < 5; $i++) {
    echo "Iterasi ke-$i<br>";
}

// Fungsi
function sapa($nama) {
    echo "Halo, $nama!<br>";
}

sapa("Alice");

// Array
$buah = array("Apel", "Jeruk", "Pisang");

// Class
class Mobil {
    public $merk;
    private $tahun;

    public function __construct($merk, $tahun) {
        $this->merk = $merk;
        $this->tahun = $tahun;
    }

    public function informasi() {
        echo "Mobil ini adalah $this->merk tahun $this->tahun.<br>";
    }

    public function gantitahun($tahun) {
        $this->tahun = $tahun;
    }
}

$mobil1 = new Mobil("Toyota", 2020);
$mobil2 = new Mobil("Honda", 2022);

$mobil1->gantitahun(2023);

$mobil1->informasi();
$mobil2->informasi();
?>
