<?php
error_reporting(0);
session_start();

require 'bd.php';
$obj = new BD_POO();

if (isset($_POST['btnentrar']) == 'entrar') {
    $user = $_POST['txtmatricula'];
    $password = $_POST['txtcontra'];

    $salt = $obj->Ejecutar_Instruccion("select contraseña from tbl_usuario where matricula = '$user'");
    $user_salt = $salt [0][0];
    /*$user_salted = $user_salt . $password;
    $user_hashed = hash('sha256', $user_salted);*/

    $contra = $_SESSION['contra'];
    echo $user_salt;
    echo '<br>';
    echo $contra;

    if ($user_salt == $contra) {
        # code...
        $usuario = $obj->Ejecutar_Instruccion("Select *from tbl_usuario where matricula='$user' and contraseña='$user_salt'");

        if ($usuario[0][0]>0) {
            //Verifica que el usuario exista
            $_SESSION['usuario'] = $usuario[0][1];
            header('Location: ventana_em.php');
        }/*else {
        # code...
        echo '<script>alert("Usuario no encontrado");</script>';
        }*/
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
        <form action="login_examen.php" method="post">
            <input type="text" name="txtmatricula" id="txtmatricula" onkeyup="matricula(this);" class="matricula" placeholder="Matrícula"  >  
            <input type="text" name="txtcontra" id="txtcontra" class="contrasena" placeholder="Contraseña">
            <input type="submit" class="entrar" value="ENTRAR" id="btnentrar" name="btnentrar" onclick="validar()">  
        </form>  
    </div>
</body>
</html>