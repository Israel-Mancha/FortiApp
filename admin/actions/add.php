<?php

$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

?>

<?php
require '../database/bd.php';

date_default_timezone_set("America/Mexico_City");

$obj = new BD_PDO();

$result = $obj->Ejecutar_Instruccion("select nombres, apellidoP from tbl_admin LIMIT 1");
/* var_dump($result); */

$select_prod = $obj->Ejecutar_Instruccion("select nombre from tbl_productos where ID_producto = 9");

$select_cat = $obj->Ejecutar_Instruccion("select nombre from tbl_categoria where ID_categoria = 2");

$select_user = $obj->Ejecutar_Instruccion("select nombres, ap_pat from tbl_usuario where matricula = 21005320");

/* @$nombre = $_POST['nombre'];
@$categoria = $_POST['categoria'];
@$cant = $_POST['cant'];
@$img = $_POST['archivo'];

$obj->Ejecutar_Instruccion("insert into tbl_productos (nombre, img, ID_cat, cantidad, estado) values('$nombre','$img','$categoria','$cant','1')"); */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-form.css">
    <title>Productos</title>
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
            <div>Agregar producto</div>
            <div>
                <?php echo $diassemana[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y'); ?>
            </div>
        </div>
        <div class="products-status">
            <form id="frmAdd" name="frmAdd" action="add.php" method="post">
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


        </div>
    </main>


    <script src="../js/script.js"></script>
</body>

</html>