<!DOCTYPE html>
<html>
    <head>
        <title>Consulta Administrador</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR ADMINISTRADORES</h1>
                <h2 align="center" style="color: white">Consultar</h2>
            </div>
        
            <div class="scrollmenu">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <a href="/admin/gestionar-admin.php">Inicio Gestion</a>
                    <a><input type="submit" name="noasistente" value="Administradores sin asistente"></a>
                    <a><input type="submit" name="nrosupervisado" value="Número de empleados supervisados por administrador"></a>
                    <a><input type="submit" name="mismaeps" value="Administradores con empleados en la misma eps"></a>
                </form>
            </div>
            </div>
        </div>
        <div align = "center">
            <div>
            <br>
                <?php
                    include($_SERVER['DOCUMENT_ROOT']."/admin/CRUD/admin-service.php");
                    $nuevo = new Admin_Service();
                    if (isset($_POST['noasistente'])){                        
                        $nuevo -> consultar_admin_sinasistente();
                    }
                    elseif (isset($_POST['nrosupervisado'])){
                        $nuevo -> consultar_admin_nrosupervisado();
                    }
                    elseif (isset($_POST['mismaeps'])){
                        $nuevo -> consultar_admin_mismaeps();
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>