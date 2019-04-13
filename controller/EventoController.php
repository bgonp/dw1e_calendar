<?php

require_once __DIR__.'/../config/autoload.php';

class EventoController implements iController {

   
    public static function createPage() {
        if(!isset($_POST['fecha'])){
            View::eventoCreatePage();
        }else{
            $evento = new Evento($_POST['fecha'],$_POST['tipo'],$_POST['asignatura'],$_POST['observaciones']);
            $evento->store();
            header("location /evento");
        }
    }

    public static function deletePage() {
        if($_GET['id']){
            $evento = new evento($_GET['id']);
            $evento->remove();
        }
        header("location : /evento");
    }

    public static function editPage() {
        if(isse($_POST['id'])){
            $evento = new Evento($_POST['id']);

            $evento->fecha($_POST['fecha']);
            $evento->tipo($_POST['tipo']);
            $evento->asignatura($_POST['asignatura']);
            $evento->observaciones($_POST['observaciones']);

            $evento->update();
        }
        else if($_GET['id']){
            $evento = new Evento($_POST['id']);
        }
        else{
            header("location /evento");
        }
        View::eventoEditPage($evento);
    }

    public static function listPage() {
        View::eventoListPage(Evento::get());
    }

}

?>