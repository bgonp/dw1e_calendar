<?php

class Profesor {

	// Propiedades del objeto
	private $nombre;
	private $apellidos;
	private $email;

	/**
	 * @author Mayte
	 * @tester H
	 * Constructor que inicializa las propiedades del objeto
	 */
	public function __construct ($nombre, $apellidos, $email) {
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->email = $email;
	}

	/**
	 * @author Mayte
	 * @tester H
	 * Devuelve el nombre del profesor
	 * @return string
	 */
	public function getNombre () {
		return $this->nombre;
	}

	/**
	 * @author Mayte
	 * @tester H
	 * Devuelve los apellidos del profesor
	 * @return string
	 */
	public function getApellidos () {
		return $this->apellidos;
	}

	/**
	 * @author Mayte
	 * @tester H
	 * Devuelve el nombre y los apellidos del profesor
	 * @return string
	 */
	public function getNombreCompleto () {
		return $this->getNombre() . " " . $this->getApellidos();
	}

	/**
	 * @author Mayte
	 * @tester H
	 * Devuelve el email del profesor
	 * @return string
	 */
	public function getEmail () {
		return $this->email;
	}

}
