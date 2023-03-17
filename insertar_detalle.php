<?php
session_start();

date_default_timezone_set("America/Mexico_City");

$matricula =  $_SESSION['matricula'];
$usuario = $_SESSION['usuario'];

$mifecha = date('Y-m-d H:i:s');
require 'bd.php';

$obj = new BD_POO();

$consulta = $obj->Ejecutar_Instruccion("select id_usuario from tbl_detalle where activo = 1 and id_usuario = $matricula");

if(!empty($consulta)){
    $salida = array('status' =>'error');
}
else{
   $obj->Ejecutar_Instruccion("INSERT INTO tbl_detalle (id_producto, id_usuario, fecha_reserva, activo) VALUES (".$_POST['id'].", ".$matricula.", '".$mifecha."', 1)"); 
   $salida = array('status' =>'success');
}
 echo json_encode($salida);
?>