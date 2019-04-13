<?php

class Asignatura {

	// Propiedades del objeto
	private $abreviatura;
	private $nombre;
	private $url;
	private $profesor;

	/**
	 * @author diego
	 * @tester Hector
	 * Constructor que inicializa las propiedades del objeto
	 */
	public function __construct ($abreviatura, $nombre, $url, $profesor) {
		$this->abreviatura = $abreviatura;
		$this->nombre = $nombre;
		$this->url = $url;
		$this->profesor = $profesor;
	}

	/**
	 * @author diego
	 * @tester Hector
	 * Devuelve la abreviatura de la Asignatura
	 * @return string
	 */
	public function getAbreviatura () {
		return $this->abreviatura;
	}

	/**
	 * @author diego
	 * @tester Hector
	 * Devuelve el nombre de la Asignatura
	 * @return string
	 */
	public function getNombre () {
		return $this->nombre;
	}

	/**
	 * @author diego
	 * @tester Hector
	 * Devuelve la url de la Asignatura
	 * @return string
	 */
	public function getUrl () {
		return $this->url;
	}

	/**
	 * @author diego
	 * @tester Hector
	 * Devuelve el profesor de la asignatura
	 * @return Profesor
	 */
	public function getProfesor () {
		return $this->profesor;
	}

}
