<?php

require_once __DIR__ . "/../models/TaskModel.php";

interface ICRUDTask{
    public static function getTask();
    public static function createTask(TaskModel $task);
    public static function editTask($id_task, $title, $description);
}