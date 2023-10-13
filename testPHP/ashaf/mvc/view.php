<?php
class View
{
    public static function renderTasks($tasks)
    {
        echo '<ul>';
        foreach ($tasks as $task) {
            echo '<li>' . $task . '</li>';
        }
        echo '</ul>';
    }
}
