<?php
class Calculator
{
    public static function add($num1, $num2)
    {
        return $num1 + $num2;
    }

    public static function subtract($num1, $num2)
    {
        return $num1 - $num2;
    }

    public static function multiply($num1, $num2)
    {
        return $num1 * $num2;
    }

    public static function divide($num1, $num2)
    {
        if ($num2 == 0) {
            return "Error: Division by zero";
        } else {
            return $num1 / $num2;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    $result = "";

    switch ($operation) {
        case "add":
            $result = Calculator::add($num1, $num2);
            break;
        case "subtract":
            $result = Calculator::subtract($num1, $num2);
            break;
        case "multiply":
            $result = Calculator::multiply($num1, $num2);
            break;
        case "divide":
            $result = Calculator::divide($num1, $num2);
            break;
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
    <form method="POST" action="">
        <input type="text" name="num1" placeholder="Enter number 1" required>
        <input type="text" name="num2" placeholder="Enter number 2" required>
        <select name="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>
        <input type="submit" value="Calculate">
    </form>
    <?php
    if (isset($result)) {
        echo "Result: $result";
    }
    ?>
</body>

</html>