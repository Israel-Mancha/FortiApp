<?php
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];

if (isset($_POST['btnOK']) == 'OK') {
    header('Location: ../index.php');
}

include '../View/ventana_emergente.php';

?>