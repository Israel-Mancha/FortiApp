<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>FortiApp</title>
    <script>
        function entregar(id_detalle) {
            window.location.href = "index.php?id=" + id_detalle;
    }
    </script>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <div class="logo"><img src="../img/logo.svg" alt="Logo"></div>
            <div class="title">FortiApp</div>
        </div>
        <div class="header-right">
        <div class="user"><img src="../img/user.svg" alt="Foto de Usuario"></div>
        <div class="username"><?php echo $admin; ?></div>
        </div>
    </header>
    <aside class="aside-left">
        <a href="index.php" class="home-active"><img src="../img/home.svg" alt="Icono Inicio"></a>
        <div class="dropdown">
            <button class="prod"><img src="../img/products.svg" alt="Productos"></button>
            <div class="dropdown-content">
                <a href="add.php" class="add" ><img src="../img/add.svg" alt="Productos"></a>
                <a href="search.php" class="search"><img src="../img/search.svg" alt="Productos"></a>
            </div>
        </div>
        <a href="pdf.php" class="pdf"><img src="../img/pdf.svg" alt="PDF"></a>
    </aside>
    <main class="main">
        <div class="main-top">
            <div>Productos en uso</div>
            <div><?php echo $fecha;?></div>
        </div>
        <div class="products-status">
            <div class="item-status">
            <!-- no es tan necesario, pero en caso de ponerlo sí traerlo desde la BD -->
                <span class="status-number"><?php echo $productos_usados_cont; ?></span> 
                <span class="status-type">En uso</span>
            </div>
            <div class="item-status">
                <span class="status-number"><?php echo $total_productos; ?></span>
                <span class="status-type">Total</span>
            </div>
        </div>
        <br>
        <?php if($productos_usados_cont>0){  ?>
        <table>
                <tr>
                    <th>PRODUCTO</th>
                    <th>NOMBRE</th>
                    <th>MATRÍCULA</th>
                    <th>CARRERA</th>
                    <th>TIEMPO RESTANTE</th>
                </tr>
                <?php echo $tabla; ?>
                
            </table>
            <?php } 
            else{
                echo "<h1>No hay productos en uso.</h1>";
            }
            
            ?>
    </main>
</body>
</html>