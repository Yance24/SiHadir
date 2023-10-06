<?php
class Animal
{
    protected $name;
    protected $species;

    public function __construct($name, $species)
    {
        $this->name = $name;
        $this->species = $species;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function makeSound()
    {
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        return "Meow!";
    }
}

class Dog extends Animal
{
    public function makeSound()
    {
        return "Woof!";
    }
}

$cat = new Cat("Whiskers", "Kucing");
$dog = new Dog("Rex", "Anjing");


echo $cat->getName() . " (" . $cat->getSpecies() . ") says: " . $cat->makeSound() . "<br>";
echo $dog->getName() . " (" . $dog->getSpecies() . ") says: " . $dog->makeSound() . "<br>";
