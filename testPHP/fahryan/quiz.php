<?php
class Player
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function move($newX, $newY)
    {
        $this->x = $newX;
        $this->y = $newY;
    }

    public function attack($musuh)
    {
        if (($this->x + 1 == $musuh->getX() && $this->y == $musuh->getY()) || ($this->x - 1 == $musuh->getX() && $this->y == $musuh->getY())) {
            return "Kena Serangan";
        } else {
            return "Tidak Kena Serangan";
        }
    }

    public function getPosition()
    {
        return "Posisi Player: x = " . $this->x . ", y = " . $this->y;
    }
}

class Musuh
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getPosition()
    {
        return "Posisi Musuh: x = " . $this->x . ", y = " . $this->y;
    }
}

// Membuat objek Player dan Musuh
$player = new Player(0, 0);
$musuh = new Musuh(1, 0);

// Bergerakkan Player
$player->move(1, 1);

// Serang Musuh dan tampilkan hasil
echo $player->getPosition() . "<br>";
echo $musuh->getPosition() . "<br>";
$result = $player->attack($musuh);
echo "Hasil Serangan: " . $result;
