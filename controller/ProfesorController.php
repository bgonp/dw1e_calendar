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
        if (!$_POST){
            View::profesorCreatePage(null);
        }
        else{
            $profesor = new Profesor();

            $profesor->nombre($_POST['nombre']);
            $profesor->apellidos($_POST['apellidos']);
            $profesor->email($_POST['email']);

            $profesor->store();

            header("location: /profesor");
        }
    }

    public static function deletePage() {
        if($_GET['id']){
            $profesor = new Profesor($_GET['id']);
            $profesor->remove();
        }
        header("location: /profesor");
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
        if ($_POST['id']){
            $profesor = new Profesor ($_POST['id']);

            $profesor->nombre($_POST['nombre']);
            $profesor->apellidos($_POST['apellidos']);
            $profesor->email($_POST['email']);

            $profesor->update();
        }
        else if ($_GET['id']){
            $profesor = new Profesor ($_GET['id']);
        }
        else{
            header("location: /profesor");
        }
        View::profesorEditPage();
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
