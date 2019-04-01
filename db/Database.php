Auth::validate()
<?php

class Database {

  $db_servername = 'localhost';
  $db_user = 'dw1e';
  $dp_password = '13GBdelamuerte';
  $db_name = 'dw1e_calendar';

  public function __construct($db_servername, $db_user, $db_password, $db_name) {
    // Conexion con la DB
  		$this-> $connection = new mysqli($db_servername, $db_user, $db_password, $db_name);
  		if ($this->connection->connect_error) {
  			die('Fallo en la conexión con la Base de Datos' . $this->connection->connect_error);
  		}
  	}

}

?>
