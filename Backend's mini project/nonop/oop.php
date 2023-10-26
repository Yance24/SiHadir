<?php
// Definisikan sebuah kelas sederhana bernama 'Person'
class Person {
    // Properti atau atribut kelas 'Person'
    public $name;
    public $age;

    // Konstruktor kelas 'Person' untuk menginisialisasi objek
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Metode atau fungsi kelas 'Person' untuk menampilkan informasi
    public function displayInfo() {
        echo "Nama: " . $this->name . "<br>";
        echo "Usia: " . $this->age . " tahun<br>";
    }

    public function editnama($nama,$umur) {
        $this->name = $nama;
        $this->age = $umur;
    }
}

// Membuat objek dari kelas 'Person' (instansiasi)
$person1 = new Person("Novia", 20);
$person2 = new Person("Asop", 25);


// Memanggil metode 'displayInfo' untuk menampilkan informasi objek
echo "Informasi Person 1:<br>";
$person1->displayInfo();

echo "<br>Informasi Person 2:<br>";
$person2->displayInfo();

//memanggil metode 'editnama' untuk menampilkan informasi objek
echo "<br>Informasi Person 1:<br>";
$person1->editnama("dwi", 20);
$person1->displayInfo();

?>
