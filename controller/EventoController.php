<?php
	
		require_once "../v0.1/Evento.php";
		require_once "../v0.1/Eventos.php";

	class EventoController
	{	
		
		static function prosesar(){
			$action = $_POST['action'];

			switch ($action) {
				case 'getEvento':
					$eventos = getEventos($_POST['fecha_evento']);
					break;
			}
		}

		/**
		* Devuelve un objeto evento a vista para que lo muestre
		*/
		private static function getEventos($fecha){
			
			$eventos = new Eventos($fecha);
			
			if($eventos::hayEventos($fecha)){
				//view::showEvent($eventos::getEvento($fecha));
			}
			else {
				//view::showNoEvent();
			}
		}

		//No estoy seguro
		//No esta implementado
		/**
		*Devuelve un objeto Evento a modelo para que lo añada
		*/
		private static function setNewEvento($fecha , $tipo , $asignatura , $observaciones){

			$evento = new Evento($fecha , $tipo , $asignatura , $observaciones);

			//modelo::setEvento($evento);

		}

		//En las clases Eventos y Evento esto no es posible
		//Se manda directamente al modelo y que lo modifique ?
		/**
		* Modifica un evento y lo devuelve a modelo para que lo cambie
		*/
		private static function modificarEvento($evento){

		}

		//En las clases Eventos y Evento esto no es posible
		//Se manda directamente al modelo y que lo quite ?
		/**
		* Manda a modelo a eliminar un Evento
		*/
		private static function deleteEvento($evento){

		}
	}

	
?>