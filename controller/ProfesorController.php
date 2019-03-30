<?php

require_once '../config/autoload.php';

class ProfesorController implements iController {

    /*
    * Guarda un nuevo profesor.
    * 
    * Primero, crea un objeto Profesor vacío.
    * Después, llama a View para mostrar la página en la que el usuario
    introducirá los datos del nuevo profesor.
    * Con la info guardada en un array, asigna cada campo a una propiedad del
    objeto Profesor.
    * Una vez almacenada toda la información en el objeto, se llama al método
    para guardarlo en la base de datos.
    */
    public static function createPage() {
        $profesor = new Profesor();

        $params = View::profesorCreatePage();

        $profesor->nombre = $params['nombre'];
        $profesor->apellidos = $params['apellidos'];
        $profesor->email = $params['email'];
        $profesor->num_asignaturas['num_asignaturas'];

        $profesor->store();

    }

    public static function deletePage() {
        
    }

    public static function editPage() {
        
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
        View::profesorListPage($list);
    }

}
