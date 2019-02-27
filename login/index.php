<?php

$usuario = $_POST['usuario'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
$_POST['clave'] = '';