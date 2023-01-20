<?php
error_reporting(0);
session_start();

require 'bd.php';
$obj = new BD_POO();

if (isset($_POST['btnentrar']) == 'entrar') {
    $user = $_POST['txtmatricula'];
    $password = $_POST['txtcontra'];
    $usuario = $obj->Ejecutar_Instruccion("Select *from tbl_usuario where matricula='$user' and curp='$password'");
    if ($usuario[0][0]>0) {
        //Verifica que el usuario exista
        $_SESSION['usuario'] = $usuario[0][0];
        header('Location: ventana_em.php');
    }else{
        //Si el usuario NO existe
        echo '<script>alert("Usuario no encontrado");</script>';
    }
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
    <script type="text/javascript" src="js/script_login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>FortiApp</title>
</head>
<body>

    <img class="logo_formulario"src="img/logo_default.png" alt="Logo">
    <div>
    <form action="login.php" method="post">

      <input type="text" name="txtmatricula" id="txtmatricula" onkeyup="matricula(this);" class="matricula" placeholder="Matrícula"  >  
      <input type="text" name="txtcontra" id="txtcontra" onkeypress="return check(event)" onkeyup="mayus(this);" class="contrasena" placeholder="Contraseña">
      
      <input type="submit" class="entrar" value="ENTRAR" id="btnentrar" name="btnentrar">  

      </form>  
    </div>
    
</body>
</html>