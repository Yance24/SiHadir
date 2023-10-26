<?php
// Kelas Induk (Parent Class)
class Hewan {
    // Properti
    public $nama;
    public $jenis;

    // Konstruktor
    public function __construct($nama, $jenis) {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }

    // Metode
    public function bersuara() {
        echo "Hewan ini bersuara.\n";
    }
}

// Kelas Anak (Child Class) yang Mewarisi dari Kelas Induk
class Kucing extends Hewan {
    // Konstruktor khusus untuk kelas Kucing
    public function __construct($nama) {
        parent::__construct($nama, "Kucing");
    }

    // Metode khusus untuk kelas Kucing
    public function bersuara() {
        echo "Meong!\n";
    }
}

class Anjing extends Hewan {
    // Konstruktor khusus untuk kelas Anjing
    public function __construct($nama) {
        parent::__construct($nama, "Anjing");
    }

    // Metode khusus untuk kelas Anjing
    public function bersuara() {
        echo "Guk guk!\n";
    }
}

// Membuat objek dari kelas Kucing
$kucing = new Kucing("Meky");
echo "Nama: " . $kucing->nama . "\n";
echo "Jenis: " . $kucing->jenis . "\n";
$kucing->bersuara();

// Membuat objek dari kelas Anjing
$anjing = new Anjing("Melly");
echo "Nama: " . $anjing->nama . "\n";
echo "Jenis: " . $anjing->jenis . "\n";
$anjing->bersuara();
?>
