<?php
error_reporting(0);

if (isset($_POST['btnOK']) == 'OK') {
    header('Location: selecciona_cat.php');
}

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
        <button class="box"><img src="img/volleyball.png" alt="VolleyBall"><h2>Miguel Tienda<br>TIADSM 5B</h2><div id="clock_wrapper"><canvas id="clock" width="30" height="30"></canvas><div id="timer"></div></div></button>
        <button class="box"><img src="img/balon-fut.png" alt="Futbol"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
        <button class="box"><img src="img/baloncesto.png" alt="Baloncesto"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
        <button class="box"><img src="img/ajedrez.png" alt="Ajedrez"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
        <button class="box"><img src="img/guitar.png" alt="Guitarra"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
        <button class="box"><img src="img/saxofon.png" alt="Saxofon"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
        <button class="box"><img src="img/acordeon.png" alt="Acordeon"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
        <button class="box"><img src="img/casaca.png" alt="Casaca"><h2>Miguel Tienda<br>TIADSM 5B</h2></button>
    </div>
    <div>
    <a class="btnvolver2" href="selecciona_cat.php">VOLVER</a>
    </div>
    <script src="js/scroll_list.js"></script>
</body>
</html>