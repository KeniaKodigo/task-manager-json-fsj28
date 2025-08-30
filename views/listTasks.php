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
        require_once "../controller/ManagerController.php";
        $data_tasks = ManagerController::getTask(); //[] (bucle)
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
                            <button class="btn btn-warning">Editar</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>