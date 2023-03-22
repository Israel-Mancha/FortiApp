<?php
error_reporting(0);

require '../Model/categorias.php';
$categoria = new categorias();

$culturales = $categoria ->cultural();
$lista = $categoria ->productos_disponibles($culturales);

include '../View/cultural.php';

?>
