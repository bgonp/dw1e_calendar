<?php

require_once __DIR__.'/../config/autoload.php';

class AsignaturaController implements iController {
   
    public static function createPage() {
        if(!isset($_POST['abreviatura'])){
            View::AsignaturaCreatePage();
        }
        else{
            $asignatura = new Asignatura($_POST['abreviatura'],$_POST['nombre'],$_POST['url'], $_POST['profesor']);
            $asignatura->store();
            header("location : /asignatura");
        }
    }

    public static function deletePage() {
        if($_GET['id']){
            $asignatura = new asignatura($_GET['id']);
            $asignatura->remove();
        }
        header("location : /asignatura");
    }

    public static function editPage() {
        if(isset($_POST['id'])){
            $asignatura = new Asignatura($_POST['id']);
            $asignatura->abreviatura($_POST['abreviatura']);
            $asignatura->nombre($_POST['nombre']);
            $asignatura->url($_POST['url']);
            $asignatura->profesor($_POST['profesor']);
            $asignatura->update();
        }
        else if($_GET['id']){
            $asignatura = new asignatura($_GET['id']);
        }
        else{
            header("location :/asignatura");
        }
        View::asignaturaEditPage($asignatura);
    }

    public static function listPage() {
        $listAsignaturas = Asignatura::get();
        View::asignaturaListPage($listAsignaturas);
    }

}

?>