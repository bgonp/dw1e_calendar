<?php

class UserController implements iController {

  public static function listPage() {
    $users = User::get();
    View::userListPage($users);
  }

  public static function editPage() {
    // no tengo claro si aquí hay que editar directamente las propiedades o dentro de la página
    if ($_POST['id']) {
      $user = new User($_POST['id']);
      $user->pass($_POST['pass']);
      $user->mail($_POST['mail']);
      View::userEditPage($user);
    } else if ($_GET['id']) {
      $user = new User($_GET['id']);
      $user->pass($_GET['pass']);
      $user->mail($_GET['mail']);
      View::userEditPage($user);
    } else {
      header('Location: /user/');
    }
  }

  public static function createPage() {
    if ($_POST) {
      $user = new User();
      $user->id($_POST['id']);
      $user->pass(password_hash($_POST['pass'], PASSWORD_DEFAULT)); // cuándo password_hash()?
      $user->mail($_POST['mail']);
      $user->store();
      header('Location: /user/');
    } else {
      View::userCreatePage();
    }
  }

  public static function deletePage() {
    if ($_GET['id']) {
      $user = new User($_GET['id']);
      $user->remove();
    }
    header('Location: /user/');
  }

}