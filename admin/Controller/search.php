<?php
require '../Model/fecha.php';
require '../Model/CRUD_productos.php';

$obj = new crud();

$fecha = fecha_actual();
$admin = $obj->admin();
@$nombre = $_POST['busqueda'];
$result = $obj->buscar($nombre);
$tabla = $obj->tabla_productos($result);
if(isset($_GET['id_mod'])) {
    // Obtener el ID del producto de la URL
    $id_producto = $_GET['id_mod'];
  
    // Buscar el producto de la tabla de productos
    $update = $obj->buscar_mod($id_producto);
  }

if (isset($_POST['btnUpdate'])) {
  @$ID = $_POST['txtNumEmp'];
  @$nombre = $_POST['nombre'];
  @$categoria = $_POST['categoria'];
  @$cant = $_POST['cant'];
  @$img = $_POST['archivo'];
  $obj->actualizar($nombre,$img,$categoria,$cant,$ID);
}
@$datos_categoria = $obj->listados();

/*echo "<script>window.location.href = 'update.php?id='".$modificar[0][0]."',nombre='".$modificar[0][1]."',categoria='".$modificar[0][2]."',cantidad='".$modificar[0][3]."</script>";*/
include '../View/search.php';

?>