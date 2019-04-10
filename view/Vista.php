<?php

class Vista {

	public static function profesorListPage( $profesores ){
		$html = file_get_contents(__DIR__."/templates/profesorList.html");
		$replace = [
			'{{PROFESORES}}' => '',
		];
		foreach( $profesores as $profesor ){
			$replace['{{PROFESORES}}'] .= self::profesorListElement( $profesor );
		}
		echo View::frame( 'Lista de profesores', strtr( $html, $replace ) );
	}

	private static function profesorListElement( $caja ){
		$html = file_get_contents(__DIR__."/templates/profesorListElement.html");
		$replace = [
			'{{ID}}'		=> $profesor->id(),
			'{{NOMBRE}}'	=> $profesor->nombre(),
			'{{APELLIDOS}}'		=> $profesor->apellidos(),
			'{{EMAIL}}' => $profesor->email(),
		];
		return strtr( $html, $replace );
	}

}
