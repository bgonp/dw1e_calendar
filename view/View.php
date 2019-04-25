<?php

require_once __DIR__ . "/../config/autoload.php";

class View {

	//Vista profesores
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

	public static function profesorListElement( $profesor ){
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

	//Vista Usuarios
	public static function userCreatePage() {
		$html = file_get_contents(__DIR__ . "/templates/userCreatePage.html");
		echo self::frame("Crear usuario", $html);
	}

	public static function userListPage($users) {
		$html = file_get_contents(__DIR__ . "/templates/userList.html");
		$replace = "";
		foreach($users as $user) {
			$replace .= self::userListElement($user);
		}
		echo self::frame("Lista de usuarios", strtr($html, [ '{{USERS}}' => $replace ]));
	}

	public static function userListElement($user) {
		$html = file_get_contents(__DIR__ . "/templates/userListElement.html");
		$replace = [
			'{{ID}}' => $user->id(),
			'{{USER}}' => $user->id(), // revisar
			'{{MAIL}}' => $user->mail(),
		];
		return strtr($html, $replace);
	}

	public static function userEditPage($user) {
		$html = file_get_contents(__DIR__ . "/templates/userEditPage.html");
		$replace = [
			'{{ID}}' => $user->id(),
			'{{USER}}' => $user->id(), // revisar
			'{{MAIL}}' => $user->mail(),
		];
		echo self::frame("Editar usuario", strtr($html, $replace));
	}


	//Vista Eventos
	public static function eventoCreatePage(){
		$html = file_get_contents(__DIR__."/templates/eventoCreatePage.html");
		echo self::frame( "Crear Evento", $html);
	}

	public static function eventoListPage( $eventos ){
		$html = file_get_contents(__DIR__."/templates/eventoList.html");
		$replace = [
			'{{EVENTOS}}' => '',
		];
		foreach( $eventos as $evento ){
			$replace['{{EVENTOS}}'] .= self::eventoListElement( $evento );
		}
		echo self::frame( 'Lista de eventos', strtr( $html, $replace ) );
	}

	public static function eventoListElement( $evento ){
		$html = file_get_contents(__DIR__."/templates/eventoListElement.html");
		$replace = [
			'{{TIPO}}'			=> $evento->tipo(),
			'{{FECHA}}'			=> $evento->fecha(),
			'{{COMENTARIO}}'	=> $evento->observaciones()
		];
		return strtr( $html, $replace );
	}


	public static function eventoEditPage( $evento ){
		$html = file_get_contents(__DIR__."/templates/eventoEditPage.html");
		$replace = [
			'{{ID}}'			=> $evento->id(),
			'{{TIPO}}'			=> $evento->tipo(),
			'{{FECHA}}'			=> $evento->fecha(),
			'{{COMENTARIO}}'	=> $evento->observaciones()
		];
		echo self::frame("Editar evento", strtr( $html, $replace ));
	}

	//Vista Alumnos
	public static function alumnoCreatePage(){
		$html = file_get_contents(__DIR__."/templates/alumnoCreatePage.html");
		echo self::frame( "Crear Alumno", $html);
	}

	public static function alumnoListPage( $alumnos ){
		$html = file_get_contents(__DIR__."/templates/alumnoList.html");
		$replace = [
			'{{ALUMNOS}}' => '',
		];
		foreach( $alumnos as $alumno ){
			$replace['{{ALUMNOS}}'] .= self::alumnoListElement( $alumno );
		}
		echo self::frame( 'Lista de alumnos', strtr( $html, $replace ) );
	}

	public static function alumnoListElement( $alumno ){
		$html = file_get_contents(__DIR__."/templates/alumnoListElement.html");
		$replace = [
			'{{NOMBRE}}'			=> $alumno->nombre(),
			'{{APELLIDOS}}'			=> $alumno->apellidos(),
			'{{EMAIL}}'				=> $alumno->email()
		];
		return strtr( $html, $replace );
	}

	public static function eventoEditPage( $alumno ){
		$html = file_get_contents(__DIR__."/templates/alumnoEditPage.html");
		$replace = [
			'{{ID}}'			=> $alumno->id(),
			'{{NOMBRE}}'		=> $alumno->nombre(),
			'{{APELLIDOS}}'		=> $alumno->apellidos(),
			'{{EMAIL}}'			=> $alumno->email(),
		];
		echo self::frame("Editar evento", strtr( $html, $replace ));
	}

		//Frame general
	public static function frame( $titulo, $contenido ){
		$html = file_get_contents(__DIR__."/templates/frame.html");
		$replace = [
			'{{TITULO}}' => $titulo,
			'{{CONTENIDO}}' => $contenido,
		];
		return strtr( $html, $replace );
	}
}
