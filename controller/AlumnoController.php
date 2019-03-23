<?php

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
			}
		} else {
			$msg = "aqui tu mensaje";
			//View::showError( $msg );
		}
		var_dump($_POST['username']);
	}

	//Añadir una nueva asignatura 
	private static function addAsignatura( $alumno, $asignatura ){
		// AQUI TODA LA MAGIA
	}

	//Darme de baja en una asignatura 
	private static function void bajaAsignatura( $alumno , $asignatura){
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