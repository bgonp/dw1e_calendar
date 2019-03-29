<?php

require_once '../config/autoload.php';

class EventoController implements CRUDController {

    static function prosesar() {
        $action = $_POST['action'];


        switch ($action) {
            case 'getEvento':
                $eventos = getEventos($_POST['fecha_evento']);
                break;
            case 'new_evento':
                añadirEvento($_POST['$fecha'], $_POST['$tipo'], $_POST['$asignatura'], $_POST['$observaciones']);
                break;
        }
    }

    /**
     * Se creara un nuevo evento 
     * 
     */
    public static function create() {
        
    }

    /**
     * Modificas un  evento 
     */
    public static function edit() {
        
    }

    /**
     * Obtienes una lista de todos los  evento 
     */
    public static function get() {
        
    }

    /**
     * Obtendra un  evento
     */
    public static function getSingle() {
        
    }

    /**
     * Eliminara un alumno
     */
    public static function remove() {
        
    }

}

?>