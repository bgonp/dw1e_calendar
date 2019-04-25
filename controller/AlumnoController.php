<?php

require_once __DIR__.'/../config/autoload.php';

class AlumnoController implements iController {

    
    public static function createPage() {
        if(!isset($_POST['nombre'])){
            View::alumnoCreatePage();
        }
        else{
            $alumno = new Alumno();

            $alumno->nombre($_POST['nombre']);
            $alumno->apellidos($_POST['apellidos']);
            $alumno->email($_POST['email']);
            
            $alumno->store();

            header("location: /alumno");
        }
    }

    public static function deletePage() {
        if(isset($_GET['id'])){
            $alumno = new Alumno($_GET['id']);
            $alumno->remove();
        }
        header("location: /alumno");
    }

    public static function editPage() {
        if(isset($_POST['id'])){
            $alumno = new Alumno($_POST['id']);

            $alumno->nombre($_POST['nombre']);
            $alumno->apellidos($_POST['apellidos']);
            $alumno->email($_POST['email']);

            $alumno->update();
        }
        elseif ($_GET['id']) {
            $alumno = new Alumno($_GET['id']);
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
