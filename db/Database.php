<?php

require_once __DIR__."/../config/autoload.php";

class Database {

	private static $connection;

	public static function getProfesorList(){
		$file = 'selectProfesorList.sql';
		return self::query( $file );
	}

	public static function getAlumnoList(){
		$file = 'selectAlumnoList.sql';
		return self::query( $file );
	}

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

	public static function insertId(){
		return self::$connection->insert_id;
	}

	private static function query( $file, $replace = [] ){
		if( !self::$connection )
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$query = file_get_contents(__DIR__."/sql/$file");
		$query = strtr($query, $replace);
		$result = self::$connection->query($query);
		return $result;
	}

}
