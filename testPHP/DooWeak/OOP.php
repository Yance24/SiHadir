<?php

// Kelas dasar untuk merepresentasikan kendaraan
class Vehicle
{
    protected $brand;
    protected $model;

    public function __construct($brand, $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function startEngine()
    {
        return "{$this->brand} {$this->model}'s engine is started!";
    }

    public static function honk()
    {
        return "Honk! Honk!";
    }
}

// Kelas warisan untuk mobil
class Car extends Vehicle
{
    private $numDoors;

    public function __construct($brand, $model, $numDoors)
    {
        parent::__construct($brand, $model);
        $this->numDoors = $numDoors;
    }

    public function openDoors()
    {
        return "{$this->brand} {$this->model} has {$this->numDoors} doors open.";
    }
}

// Kelas warisan untuk sepeda motor
class Motorcycle extends Vehicle
{
    public function startEngine()
    {
        return "{$this->brand} {$this->model}'s motorcycle engine is roaring!";
    }
}

// Polimorfisme dalam tindakan
function performAction(Vehicle $vehicle)
{
    echo $vehicle->startEngine() . "<br>";
}

// Contoh penggunaan
$car = new Car("Toyota", "Camry", 4);
$motorcycle = new Motorcycle("Honda", "CBR 600RR");

performAction($car);
performAction($motorcycle);

echo Vehicle::honk(); // Menggunakan metode statis
