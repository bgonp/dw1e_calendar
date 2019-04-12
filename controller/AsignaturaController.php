<?php

require_once '../config/autoload.php';

class AsignaturaController implements iController {
   
    public static function createPage() {
        if(isset($_POST['abreviatura'])){
            View::AsignaturaCreatePage();
        }
        else{
            $asignatura = new Asignatura($_POST['abreviatura'],$_POST['nombre'],$_POST['url'], $_POST['profesor']);
            $asignatura->store();
            header("location : /asignatura");
        }
    }

    public static function deletePage() {
        if($_GET['abreviatura']){
            $asignatura = new asignatura($_GET['abreviatura']);
            $asignatura->remove();
        }
        header("location : /asignatura");
    }

    public static function editPage() {
        if(isset($_POST['abreviatura'])){
            $asignatura = new Asignatura($_POST['abreviatura'],$_POST['nombre'],$_POST['url'], $_POST['profesor']);
            $asignatura->update();
        }
        else if($_GET['abreviatura'])){
            $asignatura = new asignatura($_GET['abreviatura']);
        }
        else{
            header("location :/asignatura");
        }
        View::asignaturaEditPage();
    }

    public static function listPage() {
        $listAsignaturas = Asignatura::get();
        View::asignaturaListPage($listAsignaturas);
    }

}

?>