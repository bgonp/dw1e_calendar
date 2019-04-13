<?php

class Eventos {

	// Array asociativo con los eventos.
	private $eventos;

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Constructor que inicializa la variable del objeto.
	 */
	public function __construct () {
		$this->eventos = Database::getEventos();
	}

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Devuelve true si hay evento este día, si no, devuelve false.
	 * Recibe como parámetro un objeto de tipo Fecha.
	 * @return boolean
	 */
	public function hayEvento ($fecha) {
		return array_key_exists($fecha->getFecha(), $this->eventos);
	}

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Devuelve el Evento asociado a la fecha recibida.
	 * Recibe como parámetro un objeto de tipo Fecha.
	 * @return Evento
	 */
	public function getEvento ($fecha) {
		if ($this->hayEvento($fecha)) {
			return $this->eventos[$fecha->getFecha()];
		}
		return false;
	}

}
