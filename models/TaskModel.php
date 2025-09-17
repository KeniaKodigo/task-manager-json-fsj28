<?php

# modelo que se va encargar de consultar los datos del json de tareas

// guardar tarea, listar todas las tareas, editar tarea (JSON)

class TaskModel{
    public $id_task;
    public $title;
    public $description;
    public $date;
    public $status;
    public $id_employee;

    public function __construct($title, $description, $id_empleyoee)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = date('Y-m-d');
        $this->status = 'Pendiente';
        $this->id_employee = $id_empleyoee;
    }

    //metodo para obtener todas las tareas del json
    public static function all(){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->query("SELECT tasks.id, tasks.title, tasks.description, tasks.status, tasks.id_employee, employees.name as employee FROM tasks JOIN employees ON tasks.id_employee = employees.id");
        //ejecutando la consulta
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result;
    }

    //metodo para guardar una tarea
    public function save(){

        $pdo = Connection::getInstance()->getConnection();
        //preparar la consulta
        $query = $pdo->prepare("INSERT INTO tasks (title, description, date_task, status, id_employee) VALUES (?, ?, ?, ?, ?)");
        //pasamos como argumento los valores de los atributos de la clase
        $result = $query->execute(["$this->title", "$this->description", "$this->date", "$this->status", $this->id_employee]);

        // $query = $pdo->prepare("INSERT INTO tasks (title, description, date_task, status, id_employee) VALUES (:campo1, :campo2, :campo3, :campo4, :campo5)");
        // $query->bindParam(":campo1", "$this->title");
        // $query->bindParam(":campo2", "$this->description");
        // $query->bindParam(":campo3", "$this->date");
        // $query->bindParam(":campo4", "$this->status");
        // $query->bindParam(":campo5", $this->id_employee); 
        // $result = $query->execute();

        return $result;
    }

    public static function edit($id_task, $title, $description){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
        $result = $query->execute(["$title", "$description", $id_task]);
        return $result;
    }
}
