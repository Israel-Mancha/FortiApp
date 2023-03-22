<?php
error_reporting(0);
session_start();

require '../Model/bd.php';
$obj = new BD_PDO();

if (isset($_POST['btnentrar']) == 'entrar') {
    $user = $_POST['txtmatricula'];
    $password = $_POST['txtcontra'];
    $usuario = $obj->Ejecutar_Instruccion("Select *from tbl_usuario where matricula='$user' and curp='$password'");
    if ($usuario[0][0]>0) {
        //Verifica que el usuario exista
        $_SESSION['usuario'] = $usuario[0][1];
        $_SESSION['matricula'] = $usuario[0][0];
        header('Location: ventana_em.php');
    }
}
include '../View/login.html';
?>