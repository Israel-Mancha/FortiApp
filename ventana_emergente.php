<?php
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];

if (isset($_POST['btnOK']) == 'OK') {
    header('Location: index.php');
}

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>FortiApp</title>
</head>
<body class="fondo">
    <div class="Rectangle3"></div>
    <div class="registrado">¡Ve por tu producto, <?php echo $usuario?>!
</div>
    
    <form action="ventana_emergente.php" method="post">
     <input class="Rectangle4" type="submit" id="btnOK" name="btnOK" value="OK">   
    </form>
    
    
</body>
<script>
   window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>

</html>