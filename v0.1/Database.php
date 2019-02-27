<?php

class Database {

	// Arrays asociativos con los festivos y los eventos
	public static $festivos;
	public static $eventos;

	/**
	 * @author Borja
	 * @tester
	 * Inicializa los eventos y los festivos desde base de datos
	 */
	public static function init () {
		$connection = new mysqli("localhost", "dw1e", "13GBdelamuerte", "dw1e");
		if ($connection->connect_error)
			die("ERROR al conectarse a la base de datos: " . $connection->connect_error);
		$sql = "SELECT
				fechas.id,
				fechas.fecha,
				fechas.tipo,
				fechas.descripcion,
				asignaturas.abreviatura,
				asignaturas.nombre AS asignatura,
				profesores.nombre AS nombre,
				profesores.apellidos AS apellidos,
				profesores.email AS email
				FROM fechas
				LEFT JOIN asignaturas ON fechas.asignatura_id = asignaturas.id
				LEFT JOIN profesores ON asignaturas.profesor_id = profesores.id
				ORDER BY fechas.fecha ASC;";
		$fechas_db = $connection->query($sql);
		self::$festivos = [];
		self::$eventos = [];
		while ($fecha = $fechas_db->fetch_assoc()) {
			if ($fecha['tipo'] == 'Festivo')
				self::addFestivo($fecha['fecha'], $fecha['descripcion']);
			else
				self::addEvento($fecha['fecha'], $fecha);
		}
		$connection->close();
	}

	/**
	 * @author Borja
	 * @tester
	 * Devuelve los festivos
	 * @return Array asociativo con las fechas de los festivos: 'AAAA-MM-DD' => 'Descripción'
	 */
	public static function getFestivos () {
		return self::$festivos;
	}

	/**
	 * @author Borja
	 * @tester
	 * Devuelve los eventos
	 * @return Array asociativo con las fechas de los eventos: 'AAAA-MM-DD' => Evento
	 */
	public static function getEventos () {
		return self::$eventos;
	}

	/**
	 * @author Borja
	 * @tester
	 * Añade un festivo al array de festivos
	 */
	private static function addFestivo ($fecha, $descripcion) {
		self::$festivos[$fecha] = $descripcion;
	}

	/**
	 * @author Borja
	 * @tester
	 * Añade un evento al array de eventos
	 */
	private static function addEvento ($fecha_s, $evento) {
		$fecha = explode('-', $fecha_s);
		$fecha = new Fecha(
			$fecha[2],
			$fecha[1],
			$fecha[0]
		);
		$profesor = new Profesor(
			$evento['nombre'],
			$evento['apellidos'],
			$evento['email']
		);
		$asignatura = new Asignatura(
			$evento['abreviatura'],
			$evento['asignatura'],
			'http://google.es/',
			$profesor
		);
		$evento = new Evento(
			$fecha,
			$evento['tipo'],
			$asignatura,
			$evento['descripcion']
		);
		self::$eventos[$fecha_s] = $evento;
	}

}
