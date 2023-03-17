<?php
date_default_timezone_set("America/Matamoros");
$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

require '../database/bd.php';

$obj = new BD_PDO();

$result = $obj->Ejecutar_Instruccion("select nombres, apellidoP from tbl_admin LIMIT 1");

if(isset($_GET['id_mod'])) {
    // Obtener el ID del producto de la URL
    $id_producto = $_GET['id_mod'];
  
    // Buscar el producto de la tabla de productos
    $update = $obj->Ejecutar_Instruccion("SELECT * FROM tbl_productos WHERE ID_producto = '$id_producto'");
  }

/*echo "<script>window.location.href = 'update.php?id='".$modificar[0][0]."',nombre='".$modificar[0][1]."',categoria='".$modificar[0][2]."',cantidad='".$modificar[0][3]."</script>";*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Productos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <script>
        function eliminar(id_producto) {
            if (confirm("¿Está seguro de que desea eliminar este producto?")) {
                window.location.href = "delete.php?id=" + id_producto;
            }
        }

        function modificar(id_producto) {
             window.location.href = 'search.php?id_mod=' + id_producto;
            
        }
    </script>

</head>

<body>
    <header class="header">
        <div class="header-left">
            <div class="logo"><img src="../img/logo.svg" alt="Logo"></div>
            <div class="title">FortiApp</div>
        </div>
        <div class="header-right">
            <div class="user"><img src="../img/user.svg" alt="Foto de Usuario"></div>
            <div class="username"><?php echo $result[0]['nombres'] . ' ' . $result[0]['apellidoP']; ?></div>
        </div>
    </header>
    <aside class="aside-left">
        <a href="../index.php" class="home"><img src="../img/home.svg" alt="Icono Inicio"></a>
        <div class="dropdown">
            <button class="prod"><img src="../img/products.svg" alt="Productos"></button>
            <div class="dropdown-content">
                <a href="add.php" class="add"><img src="../img/add.svg" alt="Productos"></a>
                <a href="search.php" class="search"><img src="../img/search.svg" alt="Productos"></a>
            </div>
        </div>
        <a href="pdf.php" class="pdf"><img src="../img/pdf.svg" alt="PDF"></a>
    </aside>
    <main class="main">
        <div class="main-top">
            <div>Buscar producto</div>
            <div><?php echo $diassemana[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y'); ?></div>
        </div>
        <div class="products-status-1">
            <form action="search.php" class="frm-search" method="post">
                <label class="label-search" for="busqueda">Buscar:</label>
                <div>
                  <input class="form-control" type="text" name="busqueda" id="busqueda">  
                </div>
                <input class="btn-search" type="submit" value="Buscar">
            </form>
            <h1>Resultados de búsqueda</h1>
            <?php
            // Recuperar el nombre enviado por el formulario
            @$nombre = $_POST['busqueda'];

            // Realizar la conexión a la base de datos y la consulta
            $conn = mysqli_connect('localhost', 'root', '', 'forti_app');
            $sql = "SELECT * FROM tbl_productos WHERE nombre LIKE '%$nombre%'";
            $resultado = mysqli_query($conn, $sql);

            // Mostrar los resultados en una tabla
            if (mysqli_num_rows($resultado) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Cantidad</th><th>Acción</th></tr>";
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    if ($fila['ID_cat'] == 1) {
                        $fila['ID_cat'] = 'Instrumento';
                        /* echo "Instrumento"; */
                    } else if ($fila['ID_cat'] == 2) {
                        $fila['ID_cat'] = 'Deportivo';
                        /* echo "Deportivo"; */
                    } else if ($fila['ID_cat'] == 3) {
                        $fila['ID_cat'] = 'Cultural';
                        /* echo "Cultural"; */
                    }

                    echo "<tr>";
                    echo "<td>" . $fila['ID_producto'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['ID_cat'] . "</td>";
                    echo "<td>" . $fila['cantidad'] . "</td>";
                    // echo "<td>" . $fila['estado'] . "</td>";
                    echo "<td>";
                    echo "<button onclick='eliminar(" . $fila['ID_producto'] . ")'>Eliminar</button>";
                    echo "<button onclick='modificar(" . $fila['ID_producto'] . ")'>Modificar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            ?>
        </div>
        <br>

        <?php if (isset($_GET['id_mod'])) { ?>
        <form id="frmAdd" name="frmAdd" action="search.php" method="post">
                <input class="hidden" id="txtNumEmp" name="txtNumEmp" type="text" placeholder="Id" hidden>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <div class="input-group">
                        <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label for="archivo">Imagen:</label>
                    <div class="input-group">
                        <label for="archivo" class="custom-file-upload">
                            Subir Imagen
                        </label>
                        <input type="file" id="archivo" name="archivo" accept=".jpg, .png, .pdf">
                    </div>
                    <p id="file-name" class="file-name"></p>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <div class="input-group">
                        <select class="form-control" name="categoria" id="categoria" style="padding-bottom: 5px; padding-top: 5px;">
                            <option value="" selected disabled>Selecciona</option>
                            <option value="2">Deportivo</option>
                            <option value="3">Cultural</option>
                            <option value="1">Instrumentos</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cant">Cantidad:</label>
                    <div class="input-group">
                        <input class="form-control" id="cant" name="cant" type="number" value="1" min="1">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" id="btnSend" name="btnSend" class="btn btn-primary" value="Registrar">
                </div>
            </form>
            <?php  } ?>
    </main>

</body>

</html>