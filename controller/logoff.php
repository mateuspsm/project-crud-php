<?php
session_start();
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), '',
time()-42000, '/');
}
session_destroy();
header("Refresh: 1; url = http://localhost/Trabalho_final/index.php");
