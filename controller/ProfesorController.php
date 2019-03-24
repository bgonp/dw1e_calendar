<?php 

	require_once '../v0.1/Profesor.php';
	require_once 'EventoController';

	class ProfesorController
	{
		
		static function procesarProfesor(){

			$action = $_POST['action'];

			$nombre = $_POST['nombre_profesor'],
			$apellido = $_POST['apellido_profesor'],
			$email = $_POST['email_profesor'],

			$profesor = new Profesor($nombre , $apellido , $email);

			switch (action) {
				case 'value':
					# code...
					break;
			}

		}

		private static function añadirEvento($fecha , $tipo , $asignatura , $observaciones){
			$new_event = 
		}

		private static function 

	}
	
?>