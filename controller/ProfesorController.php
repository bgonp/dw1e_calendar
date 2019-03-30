<?php

require_once '../config/autoload.php';

class ProfesorController implements iController {

    public static function createPage() {
        
    }

    public static function deletePage() {
        
    }

    public static function editPage() {
        
    }

    /*
    * Muestra la página de información de un profesor.
    * 
    * Recibe el id del profesor mediante $_POST o $_GET, y lo guarda en $id.
    * Llama al método ProfesorPage() de View, pasándole $id como parámetro.
    */
    public static function getSingle() {
        if( $_POST['id'] )
            $id = $_POST['id'];
        else if( $_GET['id'] )
            $id = $_GET['id'];

        View::ProfesorPage($id);
    }

    /*
    * Muestra una lista con todos los profesores registrados.
    * 
    * Guarda en $list un array de objetos Profesor, que devuelve el modelo.
    * Llama al método printList de View, suponiendo que comprobará qué objetos
    hay en el array y mostrará columnas de info en función de eso.
    * Si para View es más cómodo tener un método por cada objeto
    ( printProfesorList(), printAlumnoList(), etc. ), siempre se puede cambiar.
    */
    public static function listPage() {
        $list = Profesor::get();
        View::printList($list);
    }

}
