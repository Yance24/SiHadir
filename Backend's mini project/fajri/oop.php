<?php
// Definisikan sebuah kelas (class) bernama 'Person'
class Person
{
    // Properti (variabel) dari kelas 'Person'
    public $nama;
    public $umur;

    // Konstruktor (constructor) untuk menginisialisasi objek
    public function __construct($nama, $umur)
    {
        $this->nama = $nama;
        $this->umur = $umur;
    }

    // Metode (fungsi) untuk menampilkan informasi tentang objek
    public function showInfo()
    {
        echo "Nama: " . $this->nama . "<br>";
        echo "Usia: " . $this->umur . " tahun<br>";
    }
}

// Membuat objek baru dari kelas 'Person'
$person1 = new Person("Fajri", 21);
$person2 = new Person("Dwik", 21);

// Memanggil metode 'showInfo' untuk menampilkan informasi objek
$person1->showInfo();
$person2->showInfo();
