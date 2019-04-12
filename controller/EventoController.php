<?php

require_once '../config/autoload.php';

class EventoController implements iController {

   
    public static function createPage() {
        if(!isset($_POST['fecha'])){
            View::eventoCreatePage();
        }else{
            $evento = new Evento($_POST['fecha']),$_POST['tipo']),$_POST['asignatura']),$_POST['observaciones']));
            header("location /evento");
        }
    }

    public static function deletePage() {
        if($_GET['fecha']){
            $evento = new evento($_GET['fecha']);
            $evento->remove();
        }
        header("location : /evento");
    }

    public static function editPage() {
        if(isse($_POST['fecha'])){
            $evento = new Evento($_POST['fecha']),$_POST['tipo']),$_POST['asignatura']),$_POST['observaciones']));
            $evento->update();
        }
        else if($_GET['fecha'])){
            $evento = new Evento($_POST['fecha']));
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