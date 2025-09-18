<?php
    require 'controller/LoginController.php';
    session_start();
    
    if(!isset($_SESSION['id_employee'])){
        echo "Acceso denegado";

    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido Administrador</h1>
    <p>Hola! este espacio es para llevar de las tareas asignadas a los empleados</p>
    <p>Gusto de volverte a ver, <?php echo $_SESSION['name_employee']; ?></p>
    <a href="./views/listTasks.php">Informacion de los empleados</a>

    <form action="" method="post">
        <button type="submit" name="logout">Cerrar Sesión</button>
    </form>
    <?php 
        if(isset($_POST['logout'])){
            LoginController::logout();
        }
    ?>
</body>
</html>

<?php } ?>