<?php

class Profesor {

	private $id;
	private $nombre;
	private $apellidos;
  private $email;

	public function __construct( $id = null ){
		if( $id ){
			$profesor = Database::getProfesor( $id );
			$profesor = $profesor->fetch_assoc();
			$this->id = $profesor['id'];
			$this->nombre = $profesor['nombre'];
			$this->apellidos = $profesor['apellidos'];
      $this->email = $profesor['email'];
		}
	}

	public function id( $id = null){
		if( $id )
			$this->id = $id;
		return $this->id;
	}

	public function nombre( $nombre = null ){
		if( $nombre )
			$this->nombre = $nombre;
		return $this->nombre;
	}

	public function apellidos( $apellidos = null ){
		if( $apellidos )
			$this->apellidos = $apellidos;
		return $this->apellidos;
	}

  public function email( $email = null ){
		if( $email )
			$this->email = $email;
		return $this->email;
	}

	public function store(){
		if( !$this->id ){
			$params = [
				'nombre' => $this->nombre,
				'apellidos' => $this->apellidos,
        'email' => $this->email,
			];
			Database::insertProfesor( $params );
			return $this->id = Database::insertId();
		}
		return false;
	}

	public function update(){
		$params = [
			'nombre' => $this->nombre,
			'apellidos' => $this->apellidos,
      'email' => $this->email,
		];
		return Database::updateProfesor( $this->id, $params );
	}

	public function remove(){
		return Database::deleteProfesor( $this->id );
	}

	public static function get(){
		$profesor_db = Database::getProfesorList();
		$profesor_arr = [];
		while( $profesor_db = $profesor_db->fetch_assoc() ){
			$profesor = new Profesor();
			$profesor->id( $profesor_db['id'] );
			$profesor->nombre( $profesor_db['nombre'] );
			$profesor->apellidos( $profesor_db['apellidos'] );
      $profesor->email( $profesor_db['email'] );
			$profesor_arr[] = $profesor;
		}
		return $profesor_arr;
	}

}
