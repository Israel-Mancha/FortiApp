<?php
error_reporting(0);

    if (isset($_POST['btnentrar'])== 'entrar') {
        header('Location: ventana_em.php');
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>FortiApp</title>
</head>
<body>

    

    <img class="logo_formulario"src="img/logo_default.png" alt="Logo">
    <div>
    <form action="login.php" method="post">

      <input type="text" class="matricula" placeholder="Matrícula">  
      <input type="password" class="contrasena" placeholder="Contraseña">
      <input type="submit" class="entrar" value="ENTRAR" id="btnentrar" name="btnentrar">  

      </form>  
    </div>
    
</body>
</html>