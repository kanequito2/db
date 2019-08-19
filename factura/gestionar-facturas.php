<!DOCTYPE html>
<html>
    <head>
        <title>Gestionar facturas DISC-APP</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR FACTURAS</h1>
                <h2 align="center" style="color: white">Menu</h2>
            </div>

            <div class="scrollmenu">
                <a href="/index.html">Inicio</a>
                <a href="/factura/FORMS/registrar-factura-form.php">Registrar Factura</a>
                <a href="/factura/FORMS/eliminar-factura-form.php">Eliminar Factura</a>
                <a href="/admin/FORMS/buscar-factura-form.php">Buscar</a>
            </div>
        </div>
        <div>
            <?php
                include($_SERVER['DOCUMENT_ROOT']."/factura/CRUD/factura-service.php");
                $nuevo = new Factura_Service();
                $nuevo -> mostrar_factura();
            ?>
        </div>
    </body>
</html>
