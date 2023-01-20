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
    <title>FortiApp</title>
</head>
<body class="fondo">
<h1 class="selecciona">¡Selecciona la categoría!</h1>
<form action="selecciona_cat.php" method="post">
    <!-- Este div es para el botón de la sección de instrumentos -->
    
    <div> 
        <a href="instrumentos.php" class="palabra_instrumentos">Instrumentos</a>
        <a href="instrumentos.php">
        <img class="btninstrumentos" src="img/jefferson-santos-fCEJGBzAkrU-unsplash.jpg" alt="foto de guitarra">    
        </a>
        
    </div>
    <!-- Este div es para el botón de la sección de deportivos -->
    <div> 
        <a href="deportivos.php" class="palabra_deportivos">Deportivos</a>
        <a href="deportivos.php">
        <img class="btndeportivos" src="img/sandro-schuh-HgwY_YQ1m0w-unsplash.jpg" alt="foto de deportes">    
        </a>
        
    </div>
    <!-- Este div es para el botón de la sección de cultural -->
    <div>
        <a href="cultural.php" class="palabra_cultural">Cultural</a>
        <a href="cultural.php">
        <img class="btncultural" src="img/jorge-aguilar-vZ9TqSm9ZsQ-unsplash.jpg" alt="foto de bandera de méxico">    
        </a>
        
    </div> 
</form>



    
</body>
</html>