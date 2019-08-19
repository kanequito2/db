<!DOCTYPE html>
<html>
    <head>
        <title>Buscar</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR TRABAJADORES</h1>
                <h2 align="center" style="color: white">Buscar</h2>
            </div>
        
            <div class="scrollmenu">
                <a href="/db-project/trabajador/gestionar-trabaj.php">Inicio Gestion</a>
            </div>
            </div>
        </div>
        <div align = "center">
            <div>
            <br>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                            <input type="number" name="cedula" required>
                            <br>
                            <input type="submit" name="trabajadores" value="Trabajadores por Jefe">
                            <input type="submit" name="trabajador" value="Administradores por EPS de trabajador">
                        
                </form>
                <br>
                <?php
                    include($_SERVER['DOCUMENT_ROOT']."/db-project/buscar/buscar-service.php");
                    $nuevo = new Buscar_Service();
                    if (isset($_POST['trabajadores'])){
                        $nuevo->consultar_trabajadores($_POST["cedula"]);
                    }
                    elseif (isset($_POST['trabajador'])){
                        $nuevo->consultar_trabajador($_POST["cedula"]);
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>