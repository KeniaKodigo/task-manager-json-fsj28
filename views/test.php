<?php

require_once "../models/TaskModel.php";
require_once "../config/database.php";

//print_r(TaskModel::all());

//$tarea2 = new TaskModel(2,"prueba","probando....",2);
// $tarea3 = new TaskModel(4,"otra prueba","haciendo otra prueba",3);
// //echo $tarea3->save();

//TaskModel::edit(4, "Estilos al boton","agregar nuevos estilos al boton de la seccion de inventario");

// if(isset($_POST['taskById'])){
//     $id = $_POST['taskById']; //5
// echo $id;
// }


//$task = TaskModel::getById($id);

//formulario con los datos de la tarea (editar)


$pdo = Connection::getInstance()->getConnection();
print_r($pdo);