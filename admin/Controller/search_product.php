<?php
// Conectarse a la base de datos
require '../Model/CRUD_productos.php';

$obj = new crud();

// Verificar si se recibió el ID del producto
if(isset($_GET['id_mod'])) {
  // Obtener el ID del producto de la URL
  $id_producto = $_GET['id_mod'];

  // Buscar el producto de la tabla de productos
  $update = $obj->buscar_mod($id_producto);

  //echo json_encode($update[0][0].$update[0][1].$update[0][2].$update[0][3]);

  // Redirigir al usuario a la página principal de productos
  //header("Location: search.php?id_mod=");
} else {
  // Si no se recibió el ID del producto, mostrar un mensaje de error
  echo "Error: No se recibió el ID del producto.";
}
?>
