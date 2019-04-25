<?php

class Evento {
  private $id;
  private $fecha;
  private $comentario;
  private $id_evento;
  private $tipo;

  public function __construct ( $id = null ){
    if ( $id ){
      $evento = Database::getEvento( $id );
      $evento = $evento->fetch_assoc();
      $this->id = $evento['id'];
      $this->fecha = $evento['fecha'];
      $this->comentario = $evento['comentario'];
      $this->id_evento = $evento['$id_evento'];
      $this->tipo = $evento['tipo'];
    }
  }

  public function id ( $id = null ){
    if ( $id )
     $this ->id = $id;
   return $this->id;
  }

  public function fecha( $fecha = null ){
   if( $fecha )
     $this->fecha = $fecha;
   return $this->fecha;
 }

 public function comentario ( $comentario = null ){
   if ( $ )
     $this->comentario = $comentario;
   return $this->comentario;
 }

 public function id_evento ( $id_evento = null ){
   if ( $id_evento )
     $this->id_evento = $id_evento;
   return $this->id_evento;
 }

 public function tipo ( $tipo = null ){
   if ( $tipo )
     $this->tipo = $tipo;
   return $this->tipo;
 }

 public function store(){
   if( !$this->id ){
     $params = [
       'fecha' => $this->fecha,
       'comentario' => $this->comentario,
       'id_evento' => $this->id_evento,
       'tipo' => $this->tipo,
     ];
     Database::insertEvento( $params );
     return $this->id = Database::insertId();
   }
   return false;
 }

 public function update(){
   $params = [
     'fecha' => $this->fecha,
     'comentario' => $this->comentario,
     'id_evento' => $this->id_evento,
     'tipo' => $this->tipo,
   ];
   return Database::updateEvento( $this->id, $params );
 }

 public function remove(){
   return Database::deleteEvento( $this->id );
 }

 public static function get(){
   $eventos_db = Database::getEventoList();
   $evento_arr = [];
   while( $evento_db = $eventos_db->fetch_assoc() ){
     $evento = new Evento();
     $evento->id( $evento_db['id'] );
     $evento->fecha( $evento_db['fecha'] );
     $evento->comentario( $evento_db['comentario'] );
     $evento->id_evento( $evento_db['id_evento'] );
     $evento->tipo( $evento_db['tipo']);
     $evento_arr[] = $evento;
   }
   return $evento_arr;
 }

}
