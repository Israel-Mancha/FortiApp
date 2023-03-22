<?php
error_reporting(0);

require '../Model/categorias.php';
$categoria = new categorias();

$deportivos = $categoria ->deportivos();
$lista = $categoria ->productos_disponibles($deportivos);

include '../View/deportivos.php';

?>