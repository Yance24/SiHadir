<?php
class Calculator
{
    private $num1;
    private $num2;
    public $result;

    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add()
    {
        return $this->num1 + $this->num2;
    }

    public function subtract()
    {
        return $this->num1 - $this->num2;
    }

    public function multiply()
    {
        return $this->num1 * $this->num2;
    }

    public function divide()
    {
        if ($this->num2 != 0) {
            return $this->num1 / $this->num2;
        } else {
            return "Cannot divide by zero";
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    $calculator = new Calculator($num1, $num2);

    switch ($operation) {
        case "addition":
            $result = $calculator->add();
            break;
        case "subtraction":
            $result = $calculator->subtract();
            break;
        case "multiplication":
            $result = $calculator->multiply();
            break;
        case "division":
            $result = $calculator->divide();
            break;
        default:
            $result = "Invalid operation";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Calculator</title>
</head>

<body>
    <h1>Simple Calculator</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" required><br>

        <label for="operation">Operation:</label>
        <select name="operation">
            <option value="addition">Addition (+)</option>
            <option value="subtraction">Subtraction (-)</option>
            <option value="multiplication">Multiplication (*)</option>
            <option value="division">Division (/)</option>
        </select><br>

        <label for="num2">Number 2:</label>
        <input type="number" name="num2" required><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($result !== "") {
        echo "<h2>Result:</h2>";
        echo "<p>$num1 " . ucwords($operation) . " $num2 = $result</p>";
    }
    ?>
</body>

</html>