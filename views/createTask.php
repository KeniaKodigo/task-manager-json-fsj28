<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Registro de Tareas</title>
</head>
<body>
    <?php
        require_once "../controller/ManagerController.php";
        $data_employees = ManagerController::getEmployees(); //[]
        //print_r($data_employees);

        // -> el name = representa lo que php va extraer de cada entrada de dato
    ?>
    <main class="container">
        <h1 class="my-4">Crear Tarea</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="">Id Tarea</label>
                <input type="number" class="form-control" name="id_task">
            </div>
            <div class="mb-3">
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="">Descripcion</label>
                <input type="text" class="form-control" name="description">
            </div>

            <div class="mb-3">
                <label for="">Asignar Empleado</label>
                <select name="" id="" class="form-control" name="id_employee">
                    <?php foreach($data_employees as $employee) { ?>
                        <option value="<?php echo $employee['id_employee'] ?>"><?php echo $employee['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Crear Tarea">
        </form>
    </main>

    <?php
        $title = $_POST['title'];
    ?>
</body>
</html>