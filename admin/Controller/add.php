<?php
require '../Model/fecha.php';
require '../Model/CRUD_productos.php';

$obj = new crud();

$fecha = fecha_actual();
$admin = $obj->admin();


if (isset($_POST['btnSend'])) {
    # code...
    @$nombre = $_POST['nombre'];
    @$categoria = $_POST['categoria'];
    @$cant = $_POST['cant'];
    @$img = $_POST['archivo'];

    $obj->insertar_producto($nombre,$img,$categoria,$cant); 
}

@$datos_categoria = $obj->listados();

include '../View/add.php';

?>