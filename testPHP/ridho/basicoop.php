<?php

// Definisikan kelas Person
class Person {
    // Properti atau atribut
    public $name;
    public $age;

    // Konstruktor untuk menginisialisasi objek
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Metode untuk menampilkan informasi
    public function displayInfo() {
        echo "Nama: " . $this->name . "<br>";
        echo "Usia: " . $this->age . " tahun<br>";
    }

    public function editumur($umur) {
        $this->age = $umur;
    }
}


// Membuat objek dari kelas Person
$person1 = new Person("Ridho", 20);
$person2 = new Person("Dwik", 20);
$person3 = new Person("Rio", 20);

// Memanggil metode untuk menampilkan informasi
echo "Informasi Orang 1:<br>";
// Memanggil fungsi edit umur
$person1->displayInfo();

echo "<br>Informasi Orang 2:<br>";
$person2->displayInfo();

echo "<br>Informasi Orang 3:<br>";
$person3->displayInfo();

echo "<br>Informasi Orang 1:<br>";
$person1->editumur(35);
$person1->displayInfo();

echo "<br>Informasi Orang 2:<br>";
$person2->displayInfo();

echo "<br>Informasi Orang 3:<br>";
$person3->displayInfo();

?>
