<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- <link rel="stylesheet" href="css/scroll.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>FortiApp</title>
</head>
<body class="fondo">
    <p class="prod_uso">Productos en uso</p>
    <div class="scroll_list">
        <?php echo $lista ?>
    </div>
    <div>
        <a class="btnvolver2" href="../View/selecciona_cat.html">VOLVER</a>
    </div>
    <script src="../js/scroll_list.js"></script>
</body>
</html>