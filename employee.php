<?php 
    require 'controller/LoginController.php';
    require 'controller/EmployeeController.php';
    session_start();

    if(!isset($_SESSION['id_employee'])){
        echo "Acceso denegado";

    }else{
        $data_tasks = EmployeeController::getTasksByEmployee();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a la plataforma</h1>
    <p>Gusto de volverte a ver, <?php echo $_SESSION['name_employee']; ?></p>

    <h2>Tareas Asignadas</h2>
    <table>
        <thead>
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Estado</th>
            </thead>
            <tbody>
                <?php 
                    foreach($data_tasks as $task){
                ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </thead>
    </table>

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