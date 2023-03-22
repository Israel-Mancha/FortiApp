<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-form.css">
    <title>Productos</title>
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
        <a href="../Controller/index.php" class="home"><img src="../img/home.svg" alt="Icono Inicio"></a>
        <div class="dropdown">
            <button class="prod"><img src="../img/products.svg" alt="Productos"></button>
            <div class="dropdown-content">
                <a href="add.php" class="add"><img src="../img/add.svg" alt="Productos"></a>
                <a href="search.php" class="search"><img src="../img/search.svg" alt="Productos"></a>
            </div>
        </div>
        <a href="pdf.php" class="pdf"><img src="../img/pdf.svg" alt="PDF"></a>
    </aside>
    <main class="main">
        <div class="main-top">
            <div>Agregar producto</div>
            <div>
                <?php echo $fecha; ?>
            </div>
        </div>
        <div class="products-status">
            <form id="frmAdd" name="frmAdd" action="add.php" method="post">
                <input class="hidden" id="txtNumEmp" name="txtNumEmp" type="text" placeholder="Id" hidden>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <div class="input-group">
                        <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label for="archivo">Imagen:</label>
                    <div class="input-group">
                        <label for="archivo" class="custom-file-upload">
                            Subir Imagen
                        </label>
                        <input type="file" id="archivo" name="archivo" accept=".jpg, .png, .pdf">
                    </div>
                    <p id="file-name" class="file-name"></p>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <div class="input-group">
                        <select class="form-control" name="categoria" id="categoria" style="padding-bottom: 5px; padding-top: 5px;">
                            <option value="" selected disabled>Selecciona</option>
                            <?php echo $datos_categoria ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cant">Cantidad:</label>
                    <div class="input-group">
                        <input class="form-control" id="cant" name="cant" type="number" value="1" min="1">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" id="btnSend" name="btnSend" class="btn btn-primary" value="Registrar">
                </div>
            </form>


        </div>
    </main>


    <script src="../js/script.js"></script>
</body>

</html>