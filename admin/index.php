<?php

    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
?>

<?php
    require 'database/bd.php';

    $obj = new BD_PDO();

    $result = $obj->Ejecutar_Instruccion("select nombres, apellidoP from tbl_admin LIMIT 1");
    /* var_dump($result); */

    $select_prod = $obj->Ejecutar_Instruccion("select nombre from tbl_productos where ID_producto = 9");

    $select_cat = $obj->Ejecutar_Instruccion("select nombre from tbl_categoria where ID_categoria = 2");

    $select_user = $obj->Ejecutar_Instruccion("select nombres, ap_pat from tbl_usuario where matricula = 21005320");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>FortiApp</title>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <div class="logo"><img src="img/logo.svg" alt="Logo"></div>
            <div class="title">FortiApp</div>
        </div>
        <div class="header-right">
        <div class="user"><img src="img/user.svg" alt="Foto de Usuario"></div>
        <div class="username"><?php echo $result[0]['nombres'] . ' ' . $result[0]['apellidoP']; ?></div>
        </div>
    </header>
    <aside class="aside-left">
        <a href="index.php" class="home-active"><img src="img/home.svg" alt="Icono Inicio"></a>
        <div class="dropdown">
            <button class="prod"><img src="img/products.svg" alt="Productos"></button>
            <div class="dropdown-content">
                <a href="actions/add.php" class="add" ><img src="img/add.svg" alt="Productos"></a>
                <a href="actions/search.php" class="search"><img src="img/search.svg" alt="Productos"></a>
            </div>
        </div>
        <a href="actions/pdf.php" class="pdf"><img src="img/pdf.svg" alt="PDF"></a>
    </aside>
    <main class="main">
        <div class="main-top">
            <div>Productos en uso</div>
            <div><?php echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');?></div>
        </div>
        <div class="products-status">
            <div class="item-status">
            <!-- no es tan necesario, pero en caso de ponerlo sí traerlo desde la BD -->
                <span class="status-number">6</span> 
                <span class="status-type">En uso</span>
            </div>
            <div class="item-status">
                <span class="status-number">18</span>
                <span class="status-type">En desuso</span>
            </div>
            <div class="item-status">
                <span class="status-number">24</span>
                <span class="status-type">Total</span>
            </div>
        </div>
        <div class="main-content">
            <?php
                $date = date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
                for ($i=0; $i<6; $i++) {
            ?>
                <div class="box">
                    <span class="fecha"><?php echo $date;?></span><br>
                    <span class="prod-name"><?php echo $select_prod[0]['nombre']; ?></span>
                    <span class="prod-cat"><?php echo $select_cat[0]['nombre']; ?></span><br>
                    <?php if ($i === 0) { ?>
                        <div class="progress-bar"><div class="progress"></div></div><br>
                        <span class="in-poss">En uso por: <?php echo $select_user[0]['nombres'] . ' ' . $select_user[0]['ap_pat']; ?></span>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </main>
    

<script src="main.js"></script>
</body>
</html>