<?php
error_reporting(0);

require 'bd.php';
$obj = new BD_POO();

$productos = $obj->Ejecutar_Instruccion
    ("SELECT CONCAT(tbl_usuario.nombres, ' ',tbl_usuario.ap_pat) AS Alumno, CONCAT(tbl_carrera.nombre, ' ',tbl_usuario.cuatrimestre) AS Carrera
    FROM tbl_usuario INNER JOIN tbl_carrera 
    ON tbl_usuario.carrera = tbl_carrera.ID_carrera");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="css/scroll.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>FortiApp</title>
</head>
<body class="fondo">
    <p class="prod_uso">Productos en uso</p>
    <div class="scroll_list">
        <?php foreach($productos as $renglon) { ?>
            <button class="box">
                <img src="img/volleyball.png" alt="VolleyBall">
                <h2><?php echo $renglon[0];?><br><?php echo $renglon[1];?></h2>
                <div id="clock_wrapper">
                    <canvas id="clock" width="30" height="30"></canvas>
                    <div id="timer"></div>
                </div>
            </button>
        <?php } ?>
    </div>
    <div>
        <a class="btnvolver2" href="selecciona_cat.php">VOLVER</a>
    </div>
    <script src="js/scroll_list.js"></script>
</body>
</html>