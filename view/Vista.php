<?php

class Vista {

	public static function profesorCreatePage($titulo = null){
		Vista::profesorEditPage($titulo);
	}

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

	private static function profesorListElement( $profesor ){
		$html = file_get_contents(__DIR__."/templates/profesorListElement.html");
		$replace = [
			'{{ID}}'		=> $profesor->id(),
			'{{NOMBRE}}'	=> $profesor->nombre(),
			'{{APELLIDOS}}'		=> $profesor->apellidos(),
			'{{EMAIL}}' => $profesor->email(),
		];
		return strtr( $html, $replace );
	}

	private static function profesorEditPage($titulo=null, $profesores=null){
		if ($profesores) {
			Vista::profesorListPage($profesores);
		} else {
			echo View::frame( $titulo, file_get_contents(__DIR__."/templates/profesorCreate.html") );
		}	
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
