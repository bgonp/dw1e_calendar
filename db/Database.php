<?php

require_once __DIR__."/../config/autoload.php";

class Database {

	private static $connection;

	// Metodos getList Profesor, Alumno, Asignatura y Evento

	public static function getProfesorList(){
		$file = 'selectProfesorList.sql';
		return self::query( $file );
	}

	public static function getAlumnoList(){
		$file = 'selectAlumnoList.sql';
		return self::query( $file );
	}

	public static function getAsignaturaList(){
		$file = 'selectAsignaturaList.sql';
		return self::query( $file );
	}

	public static function getEventoList(){
		$file = 'selectEventoList.sql';
		return self::query( $file );
	}

	// Metodos get Profesor, Alumno, Asignatura y Evento

	public static function getProfesor( $id ){
		$file = 'selectProfesor.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function getAlumno( $id ){
		$file = 'selectAlumno.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function getAsignatura( $id ){
		$file = 'selectAsignatura.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function getEvento( $id ){
		$file = 'selectEvento.sql';
		$replace = [
			'{{ID}}' => $id,
		];
	}

	// Metodos insert Profesor, Alumno, Asignatura y Evento

	public static function insertProfesor( $params ){
		$file = 'insertProfesor.sql';
		$replace = [
			'{{NOMBRE}}'	=> $params['nombre'],
			'{{APELLIDOS}}'		=> $params['apellidos'],
			'{{EMAIL}}'		=> $params['email'],
		];
		return self::query( $file, $replace );
	}

	public static function insertAlumno( $params ){
		$file = 'insertAlumno.sql';
		$replace = [
      '{{NOMBRE}}'	=> $params['nombre'],
			'{{APELLIDOS}}'		=> $params['apellidos'],
      '{{EMAIL}}'		=> $params['email'],
			'{{USER_ID}}' => $params['user_id'],
		];
		return self::query( $file, $replace );
	}

	public static function insertAsignatura ( $params ){
		$file = 'insertAsignatura.sql';
		$replace = [
      '{{NOMBRE}}'	=> $params['nombre'],
			'{{ABREV}}'		=> $params['abrev'],
      '{{ID_PROFESOR}}'		=> $params['id_profesor'],
			'{{URL}}' => $params['url'],
		];
		return self::query( $file, $replace );
	}

	public static function insertEvento( $params ){
		$file = 'insertEvento.sql';
		$replace = [
      '{{FECHA}}'	=> $params['fecha'],
			'{{COMENTARIO}}'		=> $params['comentario'],
      '{{ID_EVENTO}}'		=> $params['id_evento'],
			'{{TIPO}}' => $params['tipo'],
		];
		return self::query( $file, $replace );
	}

	// Metodo insertId

	public static function insertId(){
		return self::$connection->insert_id;
	}

	// Metodos delete Profesor, Alumno, Asignatura y Evento

	public static function deleteProfesor( $id ){
		$file = 'deleteProfesor.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function deleteAlumno ( $id ){
		$file = 'deleteAlumno.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function deleteAsignatura ( $id ){
		$file = 'deleteAsignatura.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function deleteEvento( $id ){
		$file = 'deleteEvento.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );

	}

	// Metodos update Profesor, Alumno, Asignatura y Evento

	public static function updateProfesor( $id, $params ){
		$file = 'updateProfesor.sql';
		$replace = [
			'{{ID}}'		=> $id,
			'{{NOMBRE}}'	=> $params['nombre'],
			'{{APELLIDOS}}'		=> $params['apellidos'],
			'{{EMAIL}}'		=> $params['email'],
		];
		return self::query( $file, $replace );
	}

	public static function updateAlumno( $id, $params ){
		$file = 'updateAlumno.sql';
		$replace = [
			'{{ID}}'		=> $id,
			'{{NOMBRE}}'	=> $params['nombre'],
			'{{APELLIDOS}}'		=> $params['apellidos'],
			'{{EMAIL}}'		=> $params['email'],
			'{{USER_ID}}' => $params['user_id'],
		];
		return self::query( $file, $replace );
	}

	public static function updateAsignatura( $id, $params ){
		$file = 'updateAsignatura.sql';
		$replace = [
      '{{NOMBRE}}'	=> $params['nombre'],
			'{{ABREV}}'		=> $params['abrev'],
      '{{ID_PROFESOR}}'		=> $params['id_profesor'],
			'{{URL}}' => $params['url'],
		];
		return self::query( $file, $replace );
	}

	public static function updateEvento( $id, $params ){
		$file = 'updateEvento.sql';
		$replace = [
      '{{FECHA}}'	=> $params['fecha'],
			'{{COMENTARIO}}'		=> $params['comentario'],
      '{{ID_EVENTO}}'		=> $params['id_evento'],
			'{{TIPO}}' => $params['tipo'],
		];
		return self::query( $file, $replace );
	}

	// Métodos para User.php

	public static function getUserList(){
		$file = 'selectUserList.sql';
		return self::query($file);
	}

	public static function getUser($id){
		$file = 'selectUser.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query( $file, $replace );
	}

	public static function deleteUser($id){
		$file = 'deleteUser.sql';
		$replace = [
			'{{ID}}' => $id,
		];
		return self::query($file, $replace);
	}

	public static function updateUser( $id, $params ){
		$file = 'updateUser.sql';
		$replace = [
			'{{ID}}'    => $id,
			'{{PASS}}' => $params['pass'],
			'{{MAIL}}'    => $params['mail'],
		];
		return self::query( $file, $replace );
	}

	public static function insertUser( $params ){
		$file = 'insertUser.sql';
		$replace = [
			'{{PASS}}' => $params['pass'],
			'{{MAIL}}'    => $params['mail'],
		];
		return self::query( $file, $replace );
	}

	//

	private static function query( $file, $replace = [] ){
		if( !self::$connection )
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$query = file_get_contents(__DIR__."/sql/$file");
		$query = strtr($query, $replace);
		$result = self::$connection->query($query);
		return $result;
	}

}
