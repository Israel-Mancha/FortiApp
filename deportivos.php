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

    <div class="titulo">¡Selecciona!</div>
    <section class='FlexContainer'>
         
            <div class="card">
                <img src="img/volleyball.png" alt="volleyball">
                <p>Volleybal</p>
            </div>
            <div>
                <img src="img/baloncesto.png" alt="basketball">
                <p>Basketball</p>
            </div>
            <div>
                <img src="img/balon-fut.png" alt="futbol">
                <p>Futbol</p>
            </div>
            <div>
                <img src="img/ajedrez.png" alt="ajedrez">
                <p>Ajedrez</p>
            </div>
            <div>
                <img src="img/casaca.png" alt="casaca">
                <p>Casacas</p>
            </div>
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

        var cards = document.getElementsByClassName('card')[0];
        console.log(cards);
        cards.addEventListener('click', function (e) {
            e.target.classList.toggle('selected','');
        });
</script>
</html>