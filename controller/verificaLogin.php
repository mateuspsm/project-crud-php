<?php
require '../conexao/conexao.php';
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$salt = '$%1350$***meusite'.$login; 
$senha_hash = md5($salt . $senha);
$ps = $pdo->prepare('SELECT * FROM usuario WHERE login = ? AND senha = ?');
$ps->execute( [ $login, $senha_hash ] );
if($linha = $ps->fetch()){
  echo "Usuario autenticado!";
  $_SESSION['login'] = $linha['login'];
  $_SESSION['nome'] = $linha['nome_completo'];
  $_SESSION['email'] = $linha['email'];
  header("Refresh: 4; url = http://localhost/Trabalho_final/administrativo.php");
}else{
  echo "Usuario não autenticado!";
  header("Refresh: 4; url = http://localhost/Trabalho_final/form/login.php");
}