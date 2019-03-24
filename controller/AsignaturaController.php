<?php
	
	require_once "../evento/Evento.php";
	require_once "../evento/Eventos.php";
	require_once "../alumno/Alumno.php";
	require_once "../asignatura/Asignatura.php";
	require_once "../profesor/profesor.php";

	class AsignaturaController{
		static function procesar(){
			$action = $_POST['action'];

			switch($action){
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

		private static function enrollAlumno($alumno, $asignatura){
			if (!$Alumno::exists($alumno) || !$Asignatura::exists($asignatura)){
				view::showEnrollUnavailable();
			}
			else{
				Asignatura::addAlumno($asignatura, $alumno);
				view::showEnrollSuccess();
			}
		}

		private static function getEventos($asignatura){
			if($eventos::hayEventos($asignatura)){
				view::showEvent($eventos::getEvento($asignatura));
			}
			else {
				view::showNoEvent();
			}
		}

		private static function getProfesor($asignatura){
			view::showProfesor($Asignatura::getProfesor($asignatura)->getInfo());
		}

		private static function getAlumnos($){
			view::showAlumnos($Asignatura::getAlumnos($asignatura));
		}

	}
?>