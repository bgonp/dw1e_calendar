<?php

class Alumno {
  private $id;
  private $nombre;
  private $apellidos;
  private $email;
  private $user_id; // solo un numero
  private $user; // el objeto user
  private $asignaturas; // array de objetos asignaturas

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

  public function id( $id = null ){
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

  public function user( $user = null ){
    if( $user ){
      $this->user_id = $user->id();
      $this->user = $user;
    }
    if( !$this->user_id )
      return false;
    if( !$this->user )
      $this->user = new User( $this->user_id );
    return $this->user;
  }

  public function asignaturas(){
    $where = [
      'alumno_id' => $this->id,
    ];
    return Asigatura::get( $where );
  }

  public function store(){
		if( !$this->id ){
      if( !$this->user_id && $this->user ){
        $this->user->store();
        $this->user_id = $this->user->id();
      }
			$params = [
				'nombre' => $this->nombre,
				'apellidos' => $this->apellidos,
        'email' => $this->email,
        'user_id' => $this->user_id ?: 0,
			];
			Database::insertAlumno( $params );
			return $this->id = Database::insertId();
		}
		return false;
	}

  public function update(){
    if( $this->id ){
      if( !$this->user_id && $this->user ){
        $this->user->store();
        $this->user_id = $this->user->id();
      }
      $params = [
        'nombre' => $this->nombre,
        'apellidos' => $this->apellidos,
        'email' => $this->email,
        'user_id' => $this->user_id,
      ];
      return Database::updateAlumno( $this->id, $params );
    }
	}

  public function remove(){
    return Database::deleteAlumno( $this->id );
  }

  public static function get(){
    $alumnos_db = Database::getAlumnoList();
    $alumno_arr = [];
    while( $alumnos_db && $alumno_db = $alumnos_db->fetch_assoc() ){
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
