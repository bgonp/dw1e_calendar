<?php

class Evento {

	// Variables con las propiedades del evento
	private $fecha;
	private $asignatura;
	private $tipo;
	private $observaciones;

	/**
	 * @author Gero
	 * @tester H
	 * Constructor que inicializa las variables.
	 * Recibe $fecha como objeto de tipo Fecha.
	 */
	public function __construct ($fecha, $tipo, $asignatura, $observaciones) {
		$this->fecha = $fecha;
		$this->tipo = $tipo;
		$this->asignatura = $asignatura;
		$this->observaciones = $observaciones;
	}

	/**
	 * @author Borja
	 * @tester H
	 * Devuelve la fecha del evento como un objeto tipo Fecha.
	 * @return Fecha
	 */
	public function getFecha () {
		return $this->fecha;
	}

	/**
	 * @author Gero
	 * @tester H
	 * Devuelve el tipo de evento como un string.
	 * Puede ser "Examen", "Entrega" u "Otro".
	 * @return string
	 */
	public function getTipo () {
		return $this->tipo;
	}

	/**
	 * @author Gero
	 * @tester H
	 * Devuelve la asignatura asociada al evento o false si no hay asignatura.
	 * @return mixed (boolean o Asignatura)
	 */
	public function getAsignatura () {
		if (empty($this->asignatura)) {
			return false;
		}
		return $this->asignatura;
	}

	/**
	 * @author Gero
	 * @tester H
	 * Devuelve las observaciones del evento.
	 * @return string
	 */
	public function getObservaciones () {
		return $this->observaciones;
	}

}
