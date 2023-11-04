<?php
// Kelas dasar (parent class)
class Hewan {
    public static $jenis = "Hewan";

    public static function deskripsi() {
        return "Ini adalah sejenis " . self::$jenis;
    }

    public function suara() {
        return "Bunyi hewan umum";
    }
}

// Kelas turunan (child class) 1
class Kucing extends Hewan {

    public function __construct($jenis) {
        self::$jenis = $jenis;
    }

    public static function deskripsi() {
        return "Ini adalah sejenis " . self::$jenis;
    }

    public function suara() {
        return "Meow!";
    }
}

// Kelas turunan (child class) 2
class Anjing extends Hewan {
    public static $jenis = "Anjing";

    public static function deskripsi() {
        return "Ini adalah sejenis " . self::$jenis;
    }

    public function suara() {
        return "Woof!";
    }
}

// Instantiasi objek
$kucing = new Kucing("kucing");
$anjing = new Anjing();

// Memanggil metode deskripsi() dengan menggunakan properti statis
echo Hewan::deskripsi() . "<br>";
echo Kucing::deskripsi() . "<br>";
echo Anjing::deskripsi() . "<br>";

// Memanggil metode suara() dengan polimorfisme
echo $kucing->suara() . "<br>";
echo $anjing->suara() . "<br>";
?>
