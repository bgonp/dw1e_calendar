<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once "Fecha.php";
require_once "Profesor.php";
require_once "Asignatura.php";
require_once "Evento.php";
require_once "Eventos.php";
require_once "Festivos.php";
require_once "Database.php";
require_once "Calendario.php";

echo "No hay errores de sintaxis<hr>";

Database::init();

$fecha = new Fecha(1, 1, 2019);
$eventos = new Eventos();
$festivos = new Festivos();
$calendario = new Calendario($fecha, $eventos, $festivos);

$calendario->printCalendar(6);

echo "<hr>No hay errores en tiempo de ejecución";
