<?php
session_start();

date_default_timezone_set("America/Mexico_City");

$matricula =  $_SESSION['matricula'];

$mifecha = date('Y-m-d H:i:s');
require 'bd.php';

$obj = new BD_POO();

$obj->Ejecutar_Instruccion("INSERT INTO tbl_detalle (id_producto, id_usuario, fecha_reserva) VALUES (".$_POST['id'].", ".$matricula.", '".$mifecha."')");


?>