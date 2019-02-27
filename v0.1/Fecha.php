<?php

class Fecha {

	// Variables necesarias para la gestión de la fecha.
	private $dia;
	private $dia_semana;
	private $mes;
	private $anyo;
	const FIN_SEMANA = 7;

	/**
	 * @author diego
	 * @tester H
	 * Constructor de la clase. Recibe el día, el mes y el año como enteros.
	 */
	public function __construct ($dia, $mes, $anyo) {
		$this->setFecha($dia, $mes, $anyo);
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve el número de día.
	 * @return int
	 */
	public function getDia () {
		return $this->dia;
	}

	/**
	 * @author Manuel
	 * @tester H
	 * Devuelve el día de la semana en números del 1 al 7 (de lunes a domingo respectivamente).
	 * @return int
	 */
	public function getDiaSemana () {
		return $this->dia_semana;
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve el número de mes.
	 * @return int
	 */
	public function getMes () {
		return $this->mes;
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve el número de año.
	 * @return int
	 */
	public function getAnyo () {
		return $this->anyo;
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve el nombre del mes.
	 * @return string
	 */
	public function getMesNombre () {
		switch ($this->mes) {
			case 1:
				return "enero";
			case 2:
				return "febrero";
			case 3:
				return "marzo";
			case 4:
				return "abril";
			case 5:
				return "mayo";
			case 6:
				return "junio";
			case 7:
				return "julio";
			case 8:
				return "agosto";
			case 9:
				return "septiembre";
			case 10:
				return "octubre";
			case 11:
				return "noviembre";
			case 12:
				return "diciembre";
		}
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve el nombre del día de la semana en versión abreviada (3 letras).
	 * @return string
	 */
	public function getDiaSemanaAbreviado () {
		switch ($this->dia_semana) {
			case 1:
				return "lun";
			case 2:
				return "mar";
			case 3:
				return "mié";
			case 4:
				return "jue";
			case 5:
				return "vie";
			case 6:
				return "sáb";
			case 7:
				return "dom";
		}
	}

	/**
	 * @author DavidH FIN
	 * @tester H
	 * Devuelve un string con la fecha en formato YYYY-MM-DD
	 * @return string
	 */
	public function getFecha () {
		return sprintf('%04d-%02d-%02d', $this->getAnyo(), $this->getMes(), $this->getDia());
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve un string con la fecha en formato DOW DD/MM/YYYY
	 * @return string
	 */
	public function getFechaLegible () {
		return "{$this->getDiaSemanaAbreviado()}, {$this->getDia()}/{$this->getMes()}/{$this->getAnyo()}";
	}

	/**
	 * @author DavidH FIN
	 * @tester H
	 * Actualiza las variables de objeto al día siguiente.
	 */
	public function siguiente () {
		if ($this->finAnyo()) {
			$this->setFecha(1, 1, $this->getAnyo() + 1);
		} elseif ($this->finMes()) {
			$this->setFecha(1, $this->getMes() + 1, $this->getAnyo());
		} else {
			$this->setFecha($this->getDia() + 1, $this->getMes(), $this->getAnyo());
		}
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve true si es el último día de la semana.
	 * @return boolean
	 */
	public function finSemana () {
		return $this->dia_semana >= self::FIN_SEMANA;
	}

	/**
	 * @author diego
	 * @tester H
	 * Devuelve true si es el último día del mes.
	 * @return boolean
	 */
	public function finMes () {
		return $this->getDia() >= self::maxDiasMes($this->getMes(), $this->getAnyo());
	}

	/**
	 * @author Borja
	 * @tester H
	 * Devuelve true si es el último día del año.
	 * @return boolean
	 */
	public function finAnyo () {
		return $this->mes >= 12 && $this->finMes();
	}

	/**
	 * @author DavidH FIN
	 * @tester : H
	 * Fija los atributos de dia, mes y año.
	 * Además calcula y fija el día de la semana.
	 * @return boolean false si hay error en la fecha
	 */
	public function setFecha ($dia, $mes, $anyo) {
		if (!self::esValida($dia, $mes, $anyo)) {
			return false;
		}
		$this->dia = $dia;
		$this->mes = $mes;
		$this->anyo = $anyo;
		$this->dia_semana = date('N', strtotime($this->getFecha()));
		return true;
	}

	/**
	 * @author DavidH FIN
	 * @tester H
	 * Comprueba si una fecha es válida recibiendo el día, mes y anyo.
	 * @return boolean true si la fecha es correcta o false si no
	 */
	public static function esValida ($dia, $mes, $anyo) {
		return $anyo >= 0 && $anyo <= 9999 &&
			$mes >= 1 && $mes <= 12 &&
			$dia >= 1 && $dia <= self::maxDiasMes($mes, $anyo);
	}

	/**
	 * @author DavidH FIN
	 * @tester H
	 * Calcula si un año es bisiesto
	 * @return boolean true si es bisiesto o false si no
	 */
	public static function bisiesto ($anyo) {
		return (($anyo % 400 == 0) || (($anyo % 4 == 0) && ($anyo % 100 != 0)));
	}

	/**
	 * @author Manuel FIN
	 * @tester DavidH
	 * Calcula el número de días que tiene como máximo un mes de un determinado año.
	 * @return int número de días que contiene un mes
	 */
	private static function maxDiasMes ($mes, $anyo) {
		switch ($mes) {
			case  4:
			case  6:
			case  9:
			case 11: // en caso de que mes sea abril (4), junio (6), septiembre (9), noviembre (11)
				return 30;
			case  2: // en caso de que sea febrero (2)
				return self::bisiesto($anyo) ? 29 : 28;
			default: // en el resto de casos
				return 31;
		}
	}

}
