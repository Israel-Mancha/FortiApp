<?php
error_reporting(0);

require '../Model/productos.php';
$productos = new productos();

$buscar = $productos->productos_usados();
$lista = $productos->lista_prod_usados($buscar);

include '../View/prod_usados.php';

?>