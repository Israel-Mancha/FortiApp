<?php
error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <title>FortiApp</title>
</head>
<body class="fondo">

    <div class="titulo">¡Selecciona!</div>
    <section class='FlexContainer'>
         
            <div class="card">
                <img src="img/vestuario.png" alt="vestuario">
                <p>Vestuario</p>
            </div>
            <div class="card">
                <img src="img/zapato.png" alt="zapato">
                <p>Zapatos</p>
            </div>
            <div class="card">
                <img src="img/escolta.png" alt="escolta">
                <p>Escolta</p>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </section>
    
    <div>
        <a class="ver_todo" href="prod_usados.php">VER TODO</a>
         <div class="Rectangle17"></div>
        <a class="btnvolver" href="selecciona_cat.php">VOLVER</a>
    </div>
        
    
    
</body>
<script>
        $(document).on('click', '.card', function(){
            
            $('.card').removeClass('active');
            $(this).addClass('active','');
        });
        
</script>
</html>