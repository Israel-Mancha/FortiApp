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

    <div class="titulo">¬°Selecciona!</div>
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
            
            <div class="Rectangle17">
              <a class="ver_todo" id="ver_todo" href="prod_usados.php">VER TODO</a>  
            </div>
            <div class="Rectangle_conf" style="display:none">
              <a class="confirmar" id="confirmar" href="#">CONFIRMAR</a>  
            </div>
        </div>
        
         
        <a class="btnvolver" href="selecciona_cat.php">VOLVER</a>
        
    
    
</body>
<script>
        $(document).on('click', '.card', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }
            else{
             $('.card').removeClass('active');
            $(this).addClass('active','');
            }
            let cards = $('.card.active').length; 
            if(cards > 0){
                $('#confirmar').parent().show();
                $('#ver_todo').parent().hide();
            }
            else{
                $('#confirmar').parent().hide();
                $('#ver_todo').parent().show();
            }
            console.log(cards);
        });
        // $(document).on('click', '.card', function(){
            
        // }
        $.ajax({
            type: "post",
            url: "insertar.php",
            data: "id=1",
            success: function (response) {
                
            }
        });
        
        /*const confirmar = document.querySelector('.ver_todo');
        function(confirmar){
            texto.style.color = "blue";
        }*/
</script>
</html>