<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
?>

<?php

    date_default_timezone_set("America/Matamoros");
    
    require 'database/bd.php';

    $obj = new BD_PDO();

    //Cuenta todos los productos que están en uso
    $productos_usados_cont = $obj->Ejecutar_Instruccion("select count(*) total from tbl_detalle where activo = 1");

    //Trae todos los productos
    $productos_usados = $obj->Ejecutar_Instruccion("select * from tbl_detalle where activo = 1");

    //Cuenta todos los productos
    $total_productos = $obj->Ejecutar_Instruccion("select count(*) total from tbl_productos");


    $result = $obj->Ejecutar_Instruccion("select nombres, apellidoP from tbl_admin LIMIT 1");
    /* var_dump($result); */

    $result_tabla = $obj->Ejecutar_Instruccion("SELECT tbl_productos.nombre, nombres, matricula,tbl_carrera.nombre from tbl_productos INNER JOIN tbl_detalle ON tbl_productos.ID_producto=tbl_detalle.id_producto INNER JOIN tbl_usuario ON tbl_detalle.id_usuario=tbl_usuario.matricula INNER JOIN tbl_carrera ON tbl_usuario.carrera=tbl_carrera.ID_carrera");

    
        
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
                <span class="status-number"><?php echo $productos_usados_cont[0][0]; ?></span> 
                <span class="status-type">En uso</span>
            </div>
            <!-- <div class="item-status">
                <span class="status-number">18</span>
                <span class="status-type">En desuso</span>
            </div> -->
            <div class="item-status">
                <span class="status-number"><?php echo $total_productos[0][0] ?></span>
                <span class="status-type">Total</span>
            </div>
        </div>
        <!-- <div class="main-content">
            <?php
                $date = date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
                
                for ($i=1; $i<=$productos_usados_cont[0][0]; $i++) {
            ?>
                <div class="box">
                    <span class="fecha"><?php echo $date;?></span><br>
                    <span class="prod-name"><?php echo $select_prod[0]['nombre']; ?></span>
                    <span class="prod-cat"><?php echo $select_cat[0]['nombre']; ?></span><br>
                    <?php if ($i === 1) { ?>
                        <div class="progress-bar"><div class="progress"></div></div><br>
                        <span class="in-poss">En uso por: <?php echo $select_user[0]['nombres'] . ' ' . $select_user[0]['ap_pat']; ?></span>
                    <?php } ?>
                </div>
            <?php } ?>
        </div> -->
        <br>
        <table border="1">
                <tr>
                    <th>PRODUCTO</th>
                    <th>NOMBRE</th>
                    <th>MATRÍCULA</th>
                    <th>CARRERA</th>
                    <th>TIEMPO RESTANTE</th>
                </tr>
                <?php
                foreach($result_tabla as $productos){ ?>
                <tr>
                    <th><?php echo $productos[0]?></th>
                    <th><?php echo $productos[1]?></th>
                    <th><?php echo $productos[2]?></th>
                    <th><?php echo $productos[3]?></th>
                    <th></th>
                </tr>
                <?php } ?>
                
            </table>

    </main>
    
    
    

    
    

<script src="js/main.js"></script>
</body>
</html>