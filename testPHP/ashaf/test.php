<?php
class person
{
    public $x;
    public $y;
    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    function pindah($newcorx, $newcony)
    {
        return $this->x = $newcorx;
        return $this->y = $newcony;
    }
    function check(person $player)
    {
        if ($this->x == $player->x && $this->y == $player->y) {
            echo "kena";
        } else echo "tidak kena";
    }
}
function check(person $p, person $m)
{
    if ($p->x == $m->x && $p->y == $m->y) {
        echo "menyerang <br>";
    } else echo "tidak menyerang <br>";
}

$player = new person(10, 10);
$musuh = new person(10, 10);
check($player, $musuh);

$player->pindah(12, 13);
check($player, $musuh);

$player->pindah(1, 10);
$player->check($musuh);
