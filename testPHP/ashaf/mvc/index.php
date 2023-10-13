<?php
require_once('model.php');
require_once('view.php');
require_once('controller.php');

$model = new Model();
$controller = new Controller($model);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["task"])) {
    $task = $_POST["task"];
    $controller->addTask($task);
}

$tasks = $model->getTasks();
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Masukan:</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="task" placeholder="Enter a task" required>
        <button type="submit">Add Task</button>
    </form>

    <?php View::renderTasks($tasks); ?>
</body>

</html>