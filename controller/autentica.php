<?php 
session_start();
if(!isset($_SESSION['login'])){
    require('../form/login.php'); 
    exit;
}
?>