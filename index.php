<?php

require_once('config.php');

$usuario = new Usuario;

// $usuario->loadById(27);

// echo $usuario;

// $lista = Usuario::getList();

// echo (json_encode($lista));

//Carrega uma lista de usuarios buscando pelo login;

// $search = Usuario::search("nd");

// echo json_encode($search);


//Carrega um usuario com login e senha

$usuario->login("andrezin", "10215");

echo $usuario;
