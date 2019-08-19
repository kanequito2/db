<!DOCTYPE html>
<html>
    <head>
        <title>Inicio DISC-APP</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">DiscApp</h1>
                <h2 align="center" style="color: white">Inicio</h2>
            </div>

            <div class="scrollmenu">
                <a href="/empresa_distribuidora/gestionar-empresa.php">Gestionar empresas</a>
                <a href="/cliente/gestionar-clientes.php">Gestionar empleados</a>
                <a href="/factura/gestionar-facturas.php">Gestionar facturas</a>
                <a href="/buscar/FORMS/buscar-form.php">Buscar</a>
            </div>
        </div>

        <div>
        <?php
        include($_SERVER['DOCUMENT_ROOT']."/buscar/buscar-service.php");
        echo $_POST['primer_nombre'];
        $nuevo = new Buscar_Service();
        $nuevo->buscar_nombre($_POST["primer_nombre"]);
        ?>
        </div>
        
    </body>
</html>