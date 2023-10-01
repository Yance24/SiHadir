<!DOCTYPE html>
<html>
<head>
    <title>Contoh Program PHP nonop</title>
</head>
<body>
    <?php
    // Variabel
    $nama = "Novia";
    $umur = 20;

    // Output
    echo "<h1>Halo, nama saya $nama dan saya berumur $umur tahun.</h1>";

    // Input
    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : "";

    // Percabangan
    if ($nilai != "") {
        if ($nilai >= 60) {
            echo "<p>Anda lulus!</p>";
        } else {
            echo "<p>Anda gagal.</p>";
        }
    }
    ?>

    <!-- Form Input -->
    <form method="post" action="">
        <label for="nilai">Masukkan nilai Anda: </label>
        <input type="number" name="nilai" id="nilai">
        <input type="submit" value="Cek Nilai">
    </form>

    <?php
    // Perulangan
    echo "<h2>Menggunakan perulangan for:</h2>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<p>Iterasi ke-$i</p>";
    }

    // Fungsi
    function tambah($a, $b) {
        return $a + $b;
    }

    $hasil = tambah(5, 3);
    echo "<p>Hasil penjumlahan: $hasil</p>";

    // Array
    $buah = array("apel", "mangga", "jeruk");
    echo "<h2>Buah-buahan:</h2>";
    echo "<ul>";
    foreach ($buah as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";

    // Class
    class Manusia {
        public $nama;
        public $umur;

        public function __construct($nama, $umur) {
            $this->nama = $nama;
            $this->umur = $umur;
        }

        public function perkenalan() {
            echo "<p>Halo, nama saya {$this->nama} dan saya berumur {$this->umur} tahun.</p>";
        }
    }

    $orang = new Manusia("Novia", 20);
    $orang->perkenalan();
    ?>
</body>
</html>
