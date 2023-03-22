<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery.js"></script>
    <title>FortiApp</title>
</head>
<body class="fondo">
    <div class="titulo">¡Selecciona!</div>
        <section class='FlexContainer'>
            <?php echo $lista ?>
        </section> 
        <div>
            <div class="Rectangle17">
                <a class="ver_todo" id="ver_todo" href="prod_usados.php">VER TODO</a>  
            </div>
            <div class="Rectangle_conf" style="display:none">
                <a class="confirmar" id="confirmar" href="#">CONFIRMAR</a>
            </div>
            <a class="btnvolver" href="../View/selecciona_cat.html">VOLVER</a> 
        </div>
</body>
<script src="../js/confirmar_producto.js"></script>
</html>