<?php
class hp
{
    public $name;
    public $ram;
    public $ssd;
    public $total;

    public function __construct($name, $ram, $ssd)
    {
        $this->name = $name;
        $this->ram = $ram;
        $this->ssd = $ssd;
    }
    public function adds()
    {
        $this->total = $this->ram + $this->ssd;
        return $this->total;
    }
    public function spek()
    {
        return "<br>merek hp." . $this->name . "<br>";
    }
    public function seteditmehtod($name)
    {
        $this->name = $name;
    }
    public function geteditmehtod()
    {
        return $this->name;
    }
}

$xiaomi = new hp("dfdfddfg", 8, 128);
echo $xiaomi->adds();
echo $xiaomi->spek();
$xiaomi->seteditmehtod("opo");
echo $xiaomi->name;
