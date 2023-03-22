<?php

session_start();
$id_usuario = $_SESSION['usuario'];
error_reporting(0);

require '../Model/categorias.php';
$categoria = new categorias();

$instrumentos = $categoria ->instrumentos();
$lista = $categoria ->productos_disponibles($instrumentos);
//$usados = $obj ->Ejecutar_Instruccion("SELECT id_usuario FROM tbl_detalle where activo = 1");

include '../View/instrumentos.php';

?>