<?php

require_once '../config/autoload.php';

class AlumnoController implements iController {

    
    public static function createPage() {
        if(!assert($_POST['nombre'])){
            View::alumnoCreatePage();
        }
        else{
            $alumno = new alumno();

            $alumno->nombre($_POST['nombre']);
            $alumno->apellido($_POST['apellido']);
            $alumno->mail($_POST['mail']);
            
            $alumno->store();

            header("location: /alumno");
        }
    }

    public static function deletePage() {
        if(isset($_GET['id'])){
            $alumno = new alumno($_GET['id']);
            $alumno->remove();
        }
        header("location: /alumno");
    }

    public static function editPage() {
        if(isset($_POST['id'])){
            $alumno = new alumno($_POST['id']);

            $alumno->nombre($_POST['nombre']);
            $alumno->apellido($_POST['apellido']);
            $alumno->email($_POST['email']);

        }
        elseif ($_GET['id']) {
            $alumno = new alumno($_GET['id']);
        }
        else{
            header("location: /alumno");
        }

        View::alumnoEditPage($alumno);
    }

    public static function listPage() {
        View::alumnoListPage(Alumno::get());
    }

}
