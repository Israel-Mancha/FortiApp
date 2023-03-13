<?php

$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

?>

<?php
require 'bd.php';

$obj = new BD_PDO();

$result = $obj->Ejecutar_Instruccion("select nombres, apellidoP from tbl_admin LIMIT 1");
/* var_dump($result); */

$select_prod = $obj->Ejecutar_Instruccion("select nombre from tbl_productos where ID_producto = 9");

$select_cat = $obj->Ejecutar_Instruccion("select nombre from tbl_categoria where ID_categoria = 2");

$select_user = $obj->Ejecutar_Instruccion("select nombres, ap_pat from tbl_usuario where matricula = 21005320");

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
        <div class="products-status">
            <h1>Buscar en la base de datos</h1>
            <form action="search.php" method="post">
                <label for="busqueda">Buscar:</label>
                <input type="text" name="busqueda" id="busqueda">
                <input type="submit" value="Buscar">
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
                echo "<tr><th>ID</th><th>Nombre</th><th>Categoria</th><th>Cantidad</th><th>Estado</th></tr>";
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
                    echo "<td>" . $fila['estado'] . "</td>";
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
    </main>


    <script src="../js/main.js"></script>
</body>

</html>