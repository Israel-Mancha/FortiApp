<?php
error_reporting(0);
session_start();

require 'bd.php';
$obj = new BD_POO();

if (isset($_POST['btnentrar']) == 'entrar') {
    $matricula = $_POST['txtmatricula'];
    $nombre = $_POST['txtnombre'];
    $ap_pat = $_POST['txtap_pat'];
    $ap_mat = $_POST['txtap_mat'];
    $carrera = $_POST['txtcarrera'];
    $telefono = $_POST['txttelefono'];
    $contra = $_POST['txtcontra'];
    $curp = $_POST['txtcurp'];
    $cuatri = $_POST['txtcuatri'];

    // Generar una nueva sal
    $salt = bin2hex(random_bytes(22));
    // Aplicar la sal a la contraseña
    $salted = $salt . $contra;
    // Hashear la contraseña con la sal
    $hashed = hash('sha256', $salted);

    $obj->Ejecutar_Instruccion("call insertar_usuario ($matricula, '$nombre', '$ap_pat', '$ap_mat', $carrera, $telefono, '$hashed', '$curp', $cuatri)");

    //Token
    $id_usuario = $obj->Ejecutar_Instruccion("select matricula from tbl_usuario where contraseña = '$hashed'");
    $id_usua = $id_usuario [0][0];
    $token = $id_usuario [0][0].bin2hex(openssl_random_pseudo_bytes(16));
    $_SESSION['token'] = $token;
    $token_final = password_hash($token, PASSWORD_DEFAULT);

    $obj->Ejecutar_Instruccion("update tbl_usuario set token = '$token_final' where matricula = '$id_usua'");

    echo '<script>alert("Se ha registrado correctamente");</script>';
    header('Location: ventana_em.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles_reg.css">
    <script type="text/javascript" src="js/script_registro.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>FortiApp</title>
</head>
<body>
    <img class="logo_formulario"src="img/logo_default.png" alt="Logo">
    <div>
        <form action="registro.php" method="post">
            <input type="text" name="txtmatricula" id="txtmatricula" class="matricula" placeholder="Matrícula"  >
            <input type="text" name="txtnombre" id="txtnombre"class="nombre" placeholder="Nombre">
            <input type="text" name="txtap_pat" id="txtap_pat"class="ap_pat" placeholder="Apellido Paterno">
            <input type="text" name="txtap_mat" id="txtap_mat"class="ap_mat" placeholder="Apellido Materno">
            <input type="text" name="txtcarrera" id="txtcarrera"class="carrera" placeholder="Carrera">
            <input type="text" name="txttelefono" id="txttelefono"class="telefono" placeholder="Telefono">
            <input type="text" name="txtcontra" id="txtcontra"class="contrasena" placeholder="Contraseña">
            <input type="text" name="txtcurp" id="txtcurp" class="curp" placeholder="CURP">
            <input type="text" name="txtcuatri" id="txtnombre"class="cuatri" placeholder="Cuatrimestre">
            <input type="submit" class="entrar" value="ENTRAR" id="btnentrar" name="btnentrar" onclick="validar()">  
        </form>  
    </div>
</body>
</html>