<?php
session_start();
//unset($_SESSION['nomedasessão]) , fosse excluir só uma exclusiva
session_destroy();
header('Location: index.php');
?>

