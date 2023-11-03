<?php
class Character {
    public $name;
    public $x;
    public $y;

    public function __construct($name, $x, $y) {
        $this->name = $name;
        $this->x = $x;
        $this->y = $y;
    }

    public function move($dx, $dy) {
        $this->x += $dx;
        $this->y += $dy;
    }

    public function getPosition() {
        return "Posisi {$this->name}: ({$this->x}, {$this->y})";
    }
}

// Objek Player
$player = new Character("Pemain", 3, 0);

// Objek Musuh
$enemy = new Character("Musuh", 4, 0);

// Menggerakkan Pemain
$player->move(2, 0);

// Menggerakkan Musuh
$enemy->move(0, 0);

// Menampilkan posisi Pemain dan Musuh
echo $player->getPosition() . "\n";
echo $enemy->getPosition() . "\n";

// Cek apakah Player berada di sebelah Musuh
if (abs($player->x - $enemy->x) + abs($player->y - $enemy->y) == 1) {
    echo "Kena!\n";
} else {
    echo "Tidak Kena!\n";
}


?>
