<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles-form.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!--Datatable plugin CSS file -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
    <!--jQuery library file -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--Datatable plugin JS library file -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Productos</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }
    </style>
    <script>
    function eliminar(id_producto) {
        if (confirm("¿Está seguro de que desea eliminar este producto?")) {
            window.location.href = "delete.php?id=" + id_producto;
        }
    }

    function modificar(id_producto) {
        window.location.href = 'search.php?id_mod=' + id_producto;

    }
    $(document).ready(function () {
        $('table.stripe').DataTable({
            language: {
                search: "Buscar: ",
                infoEmpty: "No hay productos registrados",
                info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                lengthMenu: "Agrupar en _MENU_ registros",
                zeroRecords: "No se encontraron datos con tu busqueda",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Ultimo"
                }
            }
        });
    });
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
            <div>Buscar producto</div>
            <div><?php echo $fecha; ?></div>
        </div>
        <div class="products-status-1">
            <?php if (isset($_GET['id_mod'])) { ?>
            <form id="frmAdd" name="frmAdd" action="search.php" method="post">
                <input class="hidden" id="txtNumEmp" name="txtNumEmp" type="text" placeholder="Id"
                    value="<?php echo @$update[0][0]; ?>" hidden>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <div class="input-group">
                        <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"
                            value="<?php echo @$update[0][1]; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="archivo">Imagen:</label>
                    <div class="input-group">
                        <label for="archivo" class="custom-file-upload">
                            Subir Imagen
                        </label>
                        <input type="file" id="archivo" name="archivo" accept=".jpg, .png, .pdf"
                            value="<?php echo @$update[0][2]; ?>">
                    </div>
                    <p id="file-name" class="file-name"></p>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <div class="input-group">
                        <select class="form-control" name="categoria" id="categoria"
                            style="padding-bottom: 5px; padding-top: 5px;">
                            <option value="" selected disabled>Selecciona</option>
                            <?php echo $datos_categoria ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cant">Cantidad:</label>
                    <div class="input-group">
                        <input class="form-control" id="cant" name="cant" type="number"
                            value="<?php echo @$update[0][4]; ?>" min="1">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" id="btnUpdate" name="btnUpdate" class="btn btn-primary" value="Registrar">
                </div>
            </form>
            <?php  } ?>
            <!-- <form action="search.php" class="frm-search" method="post">
                <label class="label-search" for="busqueda">Buscar:</label>
                <div>
                    <input class="form-control" type="text" name="busqueda" id="busqueda">
                </div>
                <input class="btn-search" type="submit" value="Buscar">
            </form> -->
            <h1>Resultados de búsqueda</h1>
            <table class="stripe">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody><?php echo $tabla; ?></tbody>
                
            </table>
        </div>
        <br>


    </main>

</body>

</html>