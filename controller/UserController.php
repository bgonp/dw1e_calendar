<?php

require_once __DIR__.'/../config/autoload.php';

class UserController implements iController {

  public static function listPage() {
    $users = User::get();
    View::userListPage($users);
  }

  public static function editPage() {
    if (isset($_POST['id'])) {
      $user = new User($_POST['id']);
      $user->pass(password_hash($_POST['pass'], PASSWORD_DEFAULT));
      $user->mail($_POST['mail']);
      $user->update();
    } else if (isset($_GET['id'])) {
      $user = new User($_GET['id']);
    } else {
      header('Location: /user/');
    }
    View::userEditPage($user);
  }

  public static function createPage() {
    if (isset($_POST['pass'])) {
      $user = new User();
      $user->pass(password_hash($_POST['pass'], PASSWORD_DEFAULT));
      $user->mail($_POST['mail']);
      $user->store();
      header('Location: /user/');
    } else {
      View::userCreatePage();
    }
  }

  public static function deletePage() {
    if (isset($_GET['id'])) {
      $user = new User($_GET['id']);
      $user->remove();
    }
    header('Location: /user/');
  }

}