
<?php
    //LOS ENCABEZADOS (header de PHP) de preferencia se deben de colocar antes del HTML
    require_once "../controller/ManagerController.php";
    $data_tasks = ManagerController::getTask(); //[] (bucle)
    //editando la tarea
    if(isset($_POST['id_task'],  $_POST['title'], $_POST['description'])){

        $id = $_POST['id_task'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        ManagerController::editTask($id, $title, $description);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Lista Tareas</title>
</head>
<body>
    <?php
        //print_r($data_tasks);
    ?>
    <main class="container">
        <h1>Lista de Tareas</h1>

        <a href="./createTask.php" class="btn btn-primary my-4">Crear Tarea</a>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Estado</th>
                <th>Codigo Empleado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
            <!-- Iterando el arreglo de tareas -->
                <?php foreach($data_tasks as $task){ ?>
                    <tr>
                        <td><?php echo $task['id_task']; ?></td>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task['status']; ?></td>
                        <td><?php echo $task['id_employee']; ?></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $task['id_task']; ?>">Editar</button>
                            <button class="btn btn-danger">Cambiar Estado</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalEditar<?php echo $task['id_task']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizando Tarea</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <!-- input oculto para obtener el id de la tarea -->
                                    <input type="hidden" name="id_task" value="<?php echo $task['id_task']; ?>">
                                    <label for="">Titulo</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $task['title']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Descripcion</label>
                                    <input type="text" class="form-control" name="description" value="<?php echo $task['description']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>