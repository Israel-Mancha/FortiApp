<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "forti_app");

// Verificar si se recibió el ID del producto
if(isset($_GET['id'])) {
  // Obtener el ID del producto de la URL
  $id_producto = $_GET['id'];

  // Eliminar el producto de la tabla de productos
  mysqli_query($conexion, "SELECT * FROM tbl_productos WHERE ID_producto = '$id_producto'");

  // Redirigir al usuario a la página principal de productos
  header("Location: search.php");
} else {
  // Si no se recibió el ID del producto, mostrar un mensaje de error
  echo "Error: No se recibió el ID del producto.";
}
?>
