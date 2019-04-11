<?php

require_once __DIR__ . "/../config/autoload.php";

class View {

	public static function profesorCreatePage(){
		$html = file_get_contents(__DIR__."/templates/profesorCreatePage.html");
		echo self::frame( "Crear profesor", $html);
	}

	public static function profesorListPage( $profesores ){
		$html = file_get_contents(__DIR__."/templates/profesorList.html");
		$replace = [
			'{{PROFESORES}}' => '',
		];
		foreach( $profesores as $profesor ){
			$replace['{{PROFESORES}}'] .= self::profesorListElement( $profesor );
		}
		echo self::frame( 'Lista de profesores', strtr( $html, $replace ) );
	}

	private static function profesorListElement( $profesor ){
		$html = file_get_contents(__DIR__."/templates/profesorListElement.html");
		$replace = [
			'{{ID}}'			=> $profesor->id(),
			'{{NOMBRE}}'		=> $profesor->nombre(),
			'{{APELLIDOS}}'		=> $profesor->apellidos(),
			'{{EMAIL}}' 		=> $profesor->email(),
		];
		return strtr( $html, $replace );
	}

	public static function profesorEditPage( $profesor ){
		$html = file_get_contents(__DIR__."/templates/profesorEditPage.html");
		$replace = [
			'{{ID}}'			=> $profesor->id(),
			'{{NOMBRE}}'		=> $profesor->nombre(),
			'{{APELLIDOS}}'		=> $profesor->apellidos(),
			'{{EMAIL}}' 		=> $profesor->email(),
		];
		echo self::frame("Editar profesor", strtr( $html, $replace ));
	}

	private static function frame( $titulo, $contenido ){
		$html = file_get_contents(__DIR__."/templates/frame.html");
		$replace = [
			'{{TITULO}}' => $titulo,
			'{{CONTENIDO}}' => $contenido,
		];
		return strtr( $html, $replace );
	}

}
