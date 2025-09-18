<?php

require_once "models/EmployeeModel.php";
require_once "config/database.php";

class LoginController{

    public static function login($email, $password){
        //verificar si el usuario y la contraseña son correctos
        $employee = EmployeeModel::findByEmailAndPassword($email, $password);

        //si el empleado existe creamos la sesion y validamos el rol
        if($employee){

            $role = $employee['id_role'];
            //crear sessiones
            $_SESSION['name_employee'] = $employee['name'];
            $_SESSION['id_employee'] = $employee['id'];

            if($role == 1){
                //redireccionar a la vista de administrador
                header("Location: admin.php");
            }else{
                //redireccionar a la vista de empleado
                header("Location: employee.php");
            }
        }else{
            echo "Correo o contraseña incorrectos";
        }
    }

    //eliminar la sesion
    public static function logout(){
        //continuar la sesion
        session_start();

        //eliminar los datos de sesion
        session_destroy();

        //eliminar las variables de sesion
        session_unset();

        header("Location: index.php");
    }
}