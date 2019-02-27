<?php

class Festivos {

	// Array asociativo con los festivos.
	private $festivos;

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Constructor que inicializa la variable del objeto.
	 */
	public function __construct () {
		$this->initFestivos();
	}

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Inicializa $festivos usando el method getFestivos de la clase Database.
	 */
	private function initFestivos () {
		$this->festivos = Database::getFestivos();
	}

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Devuelve true si hay clase y false si no hay clase.
	 * No hay clase en sábado ni domingo ni si es festivo.
	 * Recibe un objeto Fecha.
	 * @return boolean
	 */
	public function hayClase ($fecha) {
		return
			!array_key_exists($fecha->getFecha(), $this->festivos)
			&& $fecha->getDiaSemana() != 6
			&& $fecha->getDiaSemana() != 7;
	}

	/**
	 * @author Gero, Manuel FIN
	 * @tester
	 * Devuelve la descripción del festivo.
	 * Recibe un objeto Fecha.
	 * @return string
	 */
	public function getDescripcion ($fecha) {
		if (array_key_exists($fecha->getFecha(), $this->festivos)) {
			return $this->festivos[$fecha->getFecha()];
		}
		return false;
	}

}
