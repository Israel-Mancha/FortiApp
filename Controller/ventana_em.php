<?php
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];

if (isset($_POST['btnOK']) == 'OK') {
    header('Location: ../View/selecciona_cat.html');
}

include '../View/ventana_em.php';
?>