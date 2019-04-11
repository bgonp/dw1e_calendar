<?php

require_once __DIR__."/../config/autoload.php";

class Database {

	private static $connection;

	public static function getProfesorList(){
		$file = 'selectProfesorList.sql';
		return self::query( $file );
	}

	public static function getProfesor( $id ){
		$file = 'selectProfesor.sql';
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
		return self::query($file, $replace);
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

	public static function insertProfesor( $params ){
		$file = 'insertProfesor.sql';
		$replace = [
			'{{NOMBRE}}'	=> $params['nombre'],
			'{{APELLIDOS}}'		=> $params['apellidos'],
			'{{EMAIL}}'		=> $params['email'],
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
