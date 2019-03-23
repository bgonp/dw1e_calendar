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

	private static function addAsignatura( $alumno, $asignatura ){
		// AQUI TODA LA MAGIA
	}

}