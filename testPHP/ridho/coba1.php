<?php

// Definisikan kelas Person
class Person {
    // Properti atau atribut
    public $x;
    public $y;

    // Konstruktor untuk menginisialisasi objek
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    // Metode untuk menampilkan informasi
    public function displayInfo() {
        echo "player: " . $this->x . "<br>";
        echo "attack: " . $this->y . " nice<br>";
    }

    public function editplayer($player) {
        $this->y = $player;
    }
}


// Membuat objek dari kelas Person
$player1 = new Person("Ridho", 1000);
$player2 = new Person("Dwik", 20000);
$player3 = new Person("Rio", 3000);

// Memanggil metode untuk menampilkan informasi
echo "Informasi player 1:<br>";
// Memanggil fungsi edit umur
$player1->displayInfo();

echo "<br>Informasi player 2:<br>";
$player2->displayInfo();

echo "<br>Informasi player 3:<br>";
$player3->displayInfo();

echo "<br>Informasi player 1:<br>";
$player1->editplayer(35);
$player1->displayInfo();

echo "<br>Informasi player 2:<br>";
$player2->displayInfo();

echo "<br>Informasi player 3:<br>";
$player3->displayInfo();

?>
