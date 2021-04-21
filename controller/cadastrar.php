<?php
require '../conexao/conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$nome = $_POST['nome'];

if (empty($login) && empty($senha) && empty($email) && empty($login)) {
  echo "Campos em branco.";
  header("Refresh: 4; url = http://localhost/Trabalho_final/form/cadastro.php");
} else {

  $string = "/^[\da-z]([\w\-.]*[\w+])*@([\da-z][\w\-]*[\da-z]\.)+[a-z]{2,9}$/i";
  if (valida_email($string, $email) == 0) {
    echo 'Email: ' . $email . ' é inválido!';
    header("Refresh: 4; url = http://localhost/Trabalho_final/form/cadastro.php");
  } else {
    $salt = '$%1350$***meusite' . $login;
    $senha_hash = md5($salt . $senha);

    $ps = $pdo->prepare('SELECT * FROM usuario WHERE login = ? or email = ? or nome_completo = ?');
    $ps->execute([$login, $email, $nome]);

    if ($linha = $ps->fetch()) {
      echo 'Usuario já existente!';
      header("Refresh: 4; url = http://localhost/Trabalho_final/form/cadastro.php");
    } else {
      $ps = $pdo->prepare('INSERT INTO usuario (`login`, senha, email, nome_completo) VALUES (?,?,?,?);');
      if ($ps->execute([$login, $senha_hash, $email, $nome])) {
        echo "Cadastro realizado com sucesso!";
        header("Location: http://localhost/Trabalho_final/form/login.php");
      } else {
        echo "Cadastro não realizado!";
        header("Refresh: 4; url = http://localhost/Trabalho_final/form/cadastro.php");
      }
    }
  }
}

function valida_email($string, $email)
{
  return preg_match($string, $email);
}

