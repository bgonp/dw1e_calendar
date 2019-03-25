<?php

require_once '../v0.1/Profesor.php';
require_once 'EventoController';
require_once '../v0.1/Evento.php';

class ProfesorController implements CRUDController {

    static function procesarProfesor() {

        $action = $_POST['action'];

        $nombre = $_POST['nombre_profesor'];
        $apellido = $_POST['apellido_profesor'];
        $email = $_POST['email_profesor'];

        $profesor = new Profesor($nombre, $apellido, $email);

        switch (action) {
            case 'value':
                # code...
                break;
        }
    }

    private static function añadirEvento($fecha, $tipo, $asignatura, $observaciones) {
        $new_event = new Evento($fecha, $tipo, $asignatura, $observaciones);
        //Mandar al modelo a añadir evento
        return true;
    }

    /**
     * Se creara un nuevo Profesor 
     * 
     */
    public static function create() {
        
    }

    /**
     * Modificas un  Profesor 
     */
    public static function edit() {
        
    }

    /**
     * Obtienes una lista de todos los  Profesor 
     */
    public static function get() {
        
    }

    /**
     * Obtendra un  Profesor
     */
    public static function getSingle() {
        
    }

    /**
     * Eliminara un Profesor
     */
    public static function remove() {
        
    }

}
