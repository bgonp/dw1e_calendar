<?php

class Calendario {

	// Propiedades del objeto
	private $fecha;
	private $eventos;
	private $festivos;

	/**
	 * @author Talia
	 * @tester
	 * Inicializa las variables del objeto
	 */
	public function __construct ($fecha, $eventos, $festivos) {
		$this->fecha = $fecha;
		$this->eventos = $eventos;
		$this->festivos = $festivos;
	}

	/**
	 * @author Mayte
	 * @tester
	 * Imprime el calendario. Tantos meses como se indique como
	 * parámetro comenzando por el mes actual.
	 */
	public function printCalendar ($num_meses) {
		echo "<style>td.no-lectivo{background:#DDD;}</style>";
		for ($i = 0; $i < $num_meses; $i++) {
			$this->printMes();
		}
	}

	/**
	 * @author Talia, Mayte
	 * @tester
	 * Imprime el mes como una tabla html.
	 */
	private function printMes () {
		echo "<table>
      <tr><td colspan=\"7\">{$this->fecha->getMesNombre()} {$this->fecha->getAnyo()}</td></tr>
      <tr><tr><td>L</td><td>M</td><td>X</td><td>J</td><td>V</td><td>S</td><td>D</td></tr>";

		do {
			$this->printSemana();
		} while ($this->fecha->getDia() > 1);

		echo "</table>";

	}

	/**
	 * @author Manuel + diego
	 * @tester diego
	 * Imprime la semana como una fila de tabla html.
	 */
	private function printSemana () {
		echo '<tr>';

		if ($this->fecha->getDiaSemana() > 1)
			echo '<td colspan="' . ($this->fecha->getDiaSemana() - 1) . '"></td>';

		do {
			$this->printDia();
			$this->fecha->siguiente();
		} while ($this->fecha->getDiaSemana() > 1 && $this->fecha->getDia() > 1);

		if ($this->fecha->getDiaSemana() > 1)
			echo '<td colspan="' . (8 - $this->fecha->getDiaSemana()) . '"></td>';

		echo '</tr>';
	}

	/**
	 * @author Manuel
	 * @tester diego
	 * Imprime el día como una celda de tabla html.
	 * La celda debe tener el atributo clase "lectivo" o "no-lectivo". Además,
	 * si hay evento debe encapsular el número en un enlace a "#AAAA-MM-DD".
	 */
	private function printDia () {
		$celda = '<td class="';
		$celda .= $this->festivos->hayClase($this->fecha) ? 'lectivo' : 'no-lectivo';
		if ($this->eventos->hayEvento($this->fecha))
			$celda .= '" title="' . $this->eventos->getEvento($this->fecha)->getAsignatura()->getNombre() . '">';
		else
			$celda .= '">';

		if ($this->eventos->hayEvento($this->fecha)) {
			$celda .= '<a href="#' . $this->fecha->getFecha() . '">';
		}
		$celda .= $this->fecha->getDia();
		if ($this->eventos->hayEvento($this->fecha)) {
			$celda .= '</a>';
		}

		$celda .= '</td>';
		echo $celda;
	}

}
