<?php

class Alumno {
  private $id;
  private $nombre;
  private $apellidos;
  private $email;
  private $user_id;

  public function __construct ( $id = null ){
    if ( $id ){
      $alumno = Database::getAlumno( $id );
      $alumno = $alumno->fetch_assoc();
      $this->id = $alumno['id'];
      $this->nombre = $alumno['nombre'];
      $this->apellidos = $alumno['apellidos'];
      $this->email = $alumno['email'];
      $this->user_id = $alumno['user_id'];
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

  public function user_id ( $user_id = null ){
    if ( $user_id )
      $this->user_id = $user_id;
    return $this->user_id;
  }

  public function store(){
		if( !$this->id ){
			$params = [
				'nombre' => $this->nombre,
				'apellidos' => $this->apellidos,
        'email' => $this->email,
        'user_id' => $this->user_id,
			];
			Database::insertAlumno( $params );
			return $this->id = Database::insertId();
		}
		return false;
	}

  public function update(){
		$params = [
			'nombre' => $this->nombre,
			'apellidos' => $this->apellidos,
      'email' => $this->email,
      'user_id' => $this->user_id,
		];
		return Database::updateAlumno( $this->id, $params );
	}

  public function remove(){
    return Database::deleteAlumno( $this->id );
  }

  public static function get(){
    $alumnos_db = Database::getAlumnoList();
    $alumno_arr = [];
    while( $alumno_db = $alumnos_db->fetch_assoc() ){
      $alumno = new Alumno();
      $alumno->id( $alumno_db['id'] );
      $alumno->nombre( $alumno_db['nombre'] );
      $alumno->apellidos( $alumno_db['apellidos'] );
      $alumno->email( $alumno_db['email'] );
      $alumno->user_id( $alumno_db['user_id']);
      $alumno_arr[] = $alumno;
    }
    return $alumno_arr;
  }



}
