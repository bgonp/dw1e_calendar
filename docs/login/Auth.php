<?php

class Auth {

  public static function validate() {
    if (!$_SESSION['logged']) {
      header("location: $login_url");
    } else {
      /*
      // AQUI VERIFICAR LOS DATOS DE LOGIN
      if (datosVerificados()) {
        $_SESSION['logged'] = true;
      } else {
        $_SESSION['error'] = 'Hubo un error';
        header("location: $login_url");
      }
      */
    }
  }

}