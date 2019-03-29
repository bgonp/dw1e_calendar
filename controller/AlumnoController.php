<?php

require_once '../config/autoload.php';

class AlumnoController implements CRUDController {

    static function procesar() {
        $action = $_POST['action'];



        //$alumno = new Alumno( $_GET['username'] );
        if ($alumno) {
            switch ($action) {
                case 'add_asignatura':
                    //$asignatura = new Asignatura( $_GET['asignatura_id'] );
                    addAsignatura($alumno, $asignatura);
                    break;
                case 'baja_asignatura':
                    baja_asignatura($alumno, $asignatura);
                    break;
                case 'verHorario':
                    verHorario($alumno);
                    break;
                case 'verNotas':
                    verHorario($alumno);
                    break;
                case 'sendMessage':
                    sendMessage($alumno, $destinario);
                    break;
                case 'new_evento':
                    añadirEvento($_POST['$fecha'], $_POST['$tipo'], $_POST['$asignatura'], $_POST['$observaciones']);
                    break;
            }
        } else {
            $msg = "aqui tu mensaje";
            //View::showError( $msg );
        }

        var_dump($_POST['username']);
    }

    //añadir evento
    private static function añadirEvento($fecha, $tipo, $asignatura, $observaciones) {
        $event = new EventoController();
        $event::setNewEvento($fecha, $tipo, $asignatura, $observaciones);
    }

    //Darse de alta en una nueva asignatura 
    private static function altaAsignatura($alumno, $asignatura) {
        // AQUI TODA LA MAGIA
    }

    //Darme de baja en una asignatura 
    private static function bajaAsignatura($alumno, $asignatura) {
        // LA MAGIA VA AQUI
    }

    //Muestra el horario de el alumno
    private static function verHorario($alumno) {
        // LA MAGIA VA AQUI
    }

    //Muestra las notas de el alumno 
    private static function verNotas($alumno) {
        //  LA MAGIA VA AQUI
    }

    //Enviar un msj a alguien 
    private static function sendMessage($alumno, $destinario) {
        // LA MAGIA VA AQUI 
    }

    /**
     * Se creara un nuevo alumno ?
     * No le veo logica pero bueh
     */
    public static function create() {
        
    }

    /**
     * Modificas un alumno
     */
    public static function edit() {
        
    }

    /**
     * Obtienes una lista de todos los Alumnos
     */
    public static function get() {
        
    }

    /**
     * Obtendra un alumno por su id
     */
    public static function getSingle() {
        
    }

    /**
     * Eliminara un alumno
     */
    public static function remove() {
        
    }

}
