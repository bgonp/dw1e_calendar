<?php

require_once 'EventoController';

class AlumnoController {

	static function procesar(){
		$action = $_POST['action'];



		//$alumno = new Alumno( $_GET['username'] );
		if( $alumno ){
			switch( $action ){
				case 'add_asignatura':
					//$asignatura = new Asignatura( $_GET['asignatura_id'] );
					addAsignatura( $alumno, $asignatura );
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
					 sendMessage($alumno , $destinario);
					break;
				case 'nuevo_evento':
					añadirEvento($fecha , $tipo , $asignatura , $observaciones);
					break;
				case 'new_evento':
					this->añadirEvento($_POST['$fecha'] , $_POST['$tipo'] , $_POST['$asignatura'] , $_POST['$observaciones']);
					break;
			}
		} else {
			$msg = "aqui tu mensaje";
			//View::showError( $msg );
		}
		
		var_dump($_POST['username']);
	}

	//añadir evento
	private static function añadirEvento($fecha , $tipo , $asignatura , $observaciones){
			$event = new EventoController();
			$event::setNewEvento($fecha , $tipo , $asignatura , $observaciones);
	}

	//Añadir una nueva asignatura 
	private static function addAsignatura( $alumno, $asignatura ){
		// AQUI TODA LA MAGIA
	}

	//Darme de baja en una asignatura 
	private static function  bajaAsignatura( $alumno , $asignatura){
		// LA MAGIA VA AQUI
	}

	//Muestra el horario de el alumno
	private static function verHorario ($alumno) {
		// LA MAGIA VA AQUI
	}

	//Muestra las notas de el alumno 
	private static function verNotas($alumno){
		//  LA MAGIA VA AQUI
	} 

	//Enviar un msj a alguien 
	private static function sendMessage($alumno , $destinario){
		// LA MAGIA VA AQUI 
	}

	

}
