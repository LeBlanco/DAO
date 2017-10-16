<?php

require_once("config.php");

//Carrega um usuário 
/*
$root = new Usuario();
$root->loadbyId(3);
echo $root;
*/

//Carrega uma lista de usuários
/*
$lista = Usuario::getList();
echo json_encode($lista);
*/

//Carrega uma lista de usuários buscando pelo login
/*
$search = Usuario::search("o");
echo json_encode($search);
*/

//Carrega um usuário usando o login e a senha
/*
$usuario = new Usuario();
$usuario->login("Vini","10504816");
echo $usuario;
*/

//Cria uma nova linha no Banco, completa com todas informação
/*
$aluno = new Usuario("aluno", "@alun0");
$aluno->insert();
echo $aluno;
*/

//Criando

$usuario = new Usuario();
$usuario->loadbyId(1);
$usuario->update("Ford", "0000");
echo $usuario;
?>