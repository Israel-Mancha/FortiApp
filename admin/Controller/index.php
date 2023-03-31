<?php
    error_reporting(0);
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    require '../Model/fecha.php';
    require '../Model/tabla_reserva.php';
    $obj = new index();
    $fecha = fecha_actual();
    $productos_usados_cont = $obj->productos_usados_cont();
    $productos_usados = $obj->productos_usados();
    $total_productos = $obj->total_productos();
    $admin = $obj->admin();
    $result_tabla = $obj->tabla_detalle();
    $tabla = $obj->tabla_reserva($result_tabla);
    if(isset($_GET['id'])) {
        $id_producto = $_GET['id'];
        $obj->entregar_producto($id_producto);
        header("Location: index.php");
      }
    include '../View/index.php';
?>