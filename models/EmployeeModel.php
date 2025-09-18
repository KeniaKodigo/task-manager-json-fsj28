<?php

class EmployeeModel{
    
    //obtener los empleados
    public static function all(){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->query("SELECT id, name FROM employees");
        //ejecutando la consulta
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result;
    }

    //metodo para verificar correo y contraseña
    public static function findByEmailAndPassword($email, $password){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("SELECT id, name, email, id_role FROM employees WHERE email = ? AND password = ?");
        $query->execute([$email, $password]);
        $result = $query->fetch(PDO::FETCH_ASSOC); //[] -> te va mandar un registro
        return $result;
    }

    //metodo para mostrar las tareas por empleados
    public static function findTasksByEmployee(){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("SELECT * FROM tasks WHERE id_employee = ?");
        $query->execute([$_SESSION['id_employee']]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[] -> te va mandar un registro
        return $result;
    }
}