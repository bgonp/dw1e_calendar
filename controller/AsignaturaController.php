<?php

require_once "../evento/Evento.php";
require_once "../evento/Eventos.php";
require_once "../alumno/Alumno.php";
require_once "../asignatura/Asignatura.php";
require_once "../profesor/profesor.php";

class AsignaturaController implements CRUDController {

    static function procesar() {
        $action = $_POST['action'];

        switch ($action) {
            case 'enrollAlumno':
                enrollAlumno($_POST['alumno'], $_POST['asignatura']);
                break;
            case 'getEventos':
                $eventos = getEventos($_POST['asignatura']);
                break;
            case 'getProfesor':
                $profesor = getProfesor($_POST['asignatura']);
                break;
            case 'getAlumnos':
                $alumnos = getAlumnos($_POST['asignatura']);
                break;
        }
    }

    private static function enrollAlumno($alumno, $asignatura) {
        if (!$Alumno::exists($alumno) || !$Asignatura::exists($asignatura)) {
            view::showEnrollUnavailable();
        } else {
            Asignatura::addAlumno($asignatura, $alumno);
            view::showEnrollSuccess();
        }
    }

    private static function getEventos($asignatura) {
        if ($eventos::hayEventos($asignatura)) {
            view::showEvent($eventos::getEvento($asignatura));
        } else {
            view::showNoEvent();
        }
    }

    private static function getProfesor($asignatura) {
        view::showProfesor($Asignatura::getProfesor($asignatura)->getInfo());
    }

    private static function getAlumnos($asignatura) {
        view::showAlumnos($Asignatura::getAlumnos($asignatura));
    }

    /**
     * Se creara una nueva asignatura ?
     */
    public static function create() {
        
    }

    /**
     * Modificas una asignatura
     */
    public static function edit() {
        
    }

    /**
     * Obtienes una lista de todas las asignaturas
     */
    public static function get() {
        
    }

    /**
     * Obtendra una asignatura por su id
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