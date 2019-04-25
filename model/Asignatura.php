 <?php

 class Asignatura {
   private $id;
   private $nombre;
   private $abrev;
   private $id_profesor;
   private $url;

   public function __construct ( $id = null ){
     if ( $id ){
       $asignatura = Database::getAsignatura( $id );
       $asignatura = $asignatura->fetch_assoc();
       $this->id = $asignatura['id'];
       $this->nombre = $asignatura['nombre'];
       $this->abrev = $asignatura['abrev'];
       $this->id_profesor = $asignatura['$id_profesor'];
       $this->url = $asignatura['url'];
     }
   }

   public function id ( $id = null ){
     if ( $id )
      $this ->id = $id;
    return $this->id;
   }

   public function nombre( $nombre = null ){
 		if( $nombre )
 			$this->nombre = $nombre;
 		return $this->nombre;
 	}

  public function abrev ( $abrev = null ){
    if ( $ )
      $this->abrev = $abrev;
    return $this->abrev;
  }

  public function id_profesor ( $id_profesor = null ){
    if ( $id_profesor )
      $this->id_profesor = $id_profesor;
    return $this->id_profesor;
  }

  public function url ( $url = null ){
    if ( $url )
      $this->url = $url;
    return $this->url;
  }

  public function store(){
		if( !$this->id ){
			$params = [
				'nombre' => $this->nombre,
				'abrev' => $this->abrev,
        'id_profesor' => $this->id_profesor,
        'url' => $this->url,
			];
			Database::insertAsignatura( $params );
			return $this->id = Database::insertId();
		}
		return false;
	}

  public function update(){
		$params = [
      'nombre' => $this->nombre,
      'abrev' => $this->abrev,
      'id_profesor' => $this->id_profesor,
      'url' => $this->url,
		];
		return Database::updateAsignatura( $this->id, $params );
	}

  public function remove(){
    return Database::deleteAsignatura( $this->id );
  }

  public static function get(){
    $asignaturas_db = Database::getAsignaturaList();
    $asignatura_arr = [];
    while( $asignatura_db = $asignaturas_db->fetch_assoc() ){
      $asignatura = new Asignatura();
      $asignatura->id( $asignatura_db['id'] );
      $asignatura->nombre( $asignatura_db['nombre'] );
      $asignatura->abrev( $asignatura_db['abrev'] );
      $asignatura->id_profesor( $asignatura_db['id_profesor'] );
      $asignatura->url( $asignatura_db['url']);
      $asignatura_arr[] = $asignatura;
    }
    return $asignatura_arr;
  }

 }
