<?php

try { 
    $pdo = new PDO( 'mysql:host=localhost;dbname=meubanco;charset=utf8;port=33065', 'root', '');
} catch(PDOException $e){
      echo "Erro: ", $e->getMessage();
}