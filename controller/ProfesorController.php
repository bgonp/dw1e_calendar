<?php

require_once '../config/autoload.php';

class ProfesorController implements iController {

    /*
    * Guarda un nuevo profesor.
    * 
    * Primero, llama a View para mostrar el formulario vacío, en el que el
    usuario introducirá los datos del nuevo profesor.
    * Después, crea un objeto Profesor, y guarda en sus propiedades la
    información pasada mediante $_POST.
    * Llama al método store() del modelo, para guardar los datos del profesor,
    y para terminar muestra la lista de todos los profesores guardados.
    */
    public static function createPage() {
        $params=null;
        View::profesorCreatePage($params);

        $profesor = new Profesor();

        $profesor->nombre = $_POST['nombre'];
        $profesor->apellidos = $_POST['apellidos'];
        $profesor->email = $_POST['email'];
        $profesor->num_asignaturas = $_POST['num_asignaturas'];

        $profesor->store();

        self::listPage();
    }

    public static function deletePage() {
        if($_POST['id']){
            $profesor = new Profesor($_POST['id']);
            $profesor->remove();
            self::listPage();
        }
    }

    /*
    * Edita un profesor ya guardado en la base de datos.
    * 
    * Comprueba si hay datos ya pasados. Si no los hay, llama a View para mostrar
    un formulario en que introducirlos. Después vuelve a llamar a editPage().
    * Cuando sí hay datos, crea un objeto Profesor y guarda en él la nueva información.
    * Llama al método update() de Profesor y después vuelve a la lista completa de
    todos los profesores.
    */
    public static function editPage() {
        if (!$_POST['id']){
            View::profesorEditPage(null);
            self::editPage();
        }
        else {
            $profesor = new Profesor ($_POST['id']);

            $profesor->nombre = $_POST['nombre'];
            $profesor->apellidos = $_POST['apellidos'];
            $profesor->email = $_POST['email'];
            $profesor->num_asignaturas = $_POST['num_asignaturas'];

            $profesor->update();

            self::listPage();
        }
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
