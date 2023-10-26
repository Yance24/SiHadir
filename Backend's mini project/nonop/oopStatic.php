<?php
class manusia {
    // Properti statis
    public static $counter = 0;

    // Properti non-statis
    public $name;

    // Constructor
    public function __construct($name) {
        $this->name = $name;
        // Increment counter setiap kali objek dibuat
        self::$counter++;
    }

    // Metode non-statis
    public function sayHello() {
        echo "Hello, nama saya {$this->name}.<br>";
    }

    // Metode statis
    public static function getTotalCount() {
        return self::$counter;
    }
}

// Membuat beberapa objek dari kelas Person
$manusia1 = new manusia("Nopi");
$manusia2 = new manusia("Asop");
$manusia3 = new manusia("Dwek");

// Memanggil metode non-statis pada objek
$manusia1->sayHello();
$manusia2->sayHello();
$manusia3->sayHello();

// Memanggil metode statis
$totalCount = manusia::getTotalCount();
echo "Total objek manusia yang telah dibuat: $totalCount";
?>
