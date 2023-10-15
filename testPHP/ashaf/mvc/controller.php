<?php
class Controller
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function addTask($task)
    {
        $this->model->addTask($task);
    }
}
