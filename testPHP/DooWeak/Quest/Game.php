<?php
class Player
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function gerak($dx, $dy)
    {
        $this->x += $dx;
        $this->y += $dy;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function serangMusuh(Musuh $musuh)
    {
        $playerX = $this->getX();
        $playerY = $this->getY();
        $musuhX = $musuh->getX();
        $musuhY = $musuh->getY();

        $jarak = sqrt(pow($playerX - $musuhX, 2) + pow($playerY - $musuhY, 2));

        if ($jarak <= 2) {
            echo "Serangan player mengenai musuh!\n";
            // Implementasi logika penyerangan di sini.
        } else {
            echo "Serangan player tidak mengenai musuh.\n";
        }
    }
}

class Musuh
{
    private $x;
    private $y;

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
}

// Contoh penggunaan kelas Player dan Musuh:
$player = new Player(0, 0);
$musuh = new Musuh(0, 8);

// Player bergerak
$player->gerak(0, 10);
echo "Posisi player: ({$player->getX()}, {$player->getY()})\n";
echo "Posisi musuh: ({$musuh->getX()}, {$musuh->getY()})\n";

// Player menyerang musuh
$player->serangMusuh($musuh);
