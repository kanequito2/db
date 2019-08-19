<!DOCTYPE html>
<html>
    <head>
        <title>BUSQUEDA DISC-APP</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">DiscApp</h1>
                <h2 align="center" style="color: white">BUSQUEDA</h2>
            </div>

            <div class="scrollmenu">
                <a href="/empresa_distribuidora/gestionar-empresa.php">Gestionar empresas</a>
                <a href="/cliente/gestionar-clientes.php">Gestionar empleados</a>
                <a href="/factura/gestionar-facturas.php">Gestionar facturas</a>
                <a href="/buscar/FORMS/buscar-form.php">Buscar</a>
            </div>
        </div>

        <div align = "center">
            <div>
                <br>
                <form method="POST" action="/buscar/CRUD/buscar-nombre.php">
                    <table>
                    <tr>Facturas por primer nombre.<br>
                        <select name="primer_nombre" required>
                            <?php
                                require $_SERVER['DOCUMENT_ROOT'] ."\conexion.php" ;
                                $conne = Conectar::conn();
                                $sql = "SELECT DISTINCT primer_nombre FROM `empleado`";
                
                                $datos = mysqli_query($conne, $sql);
                
                                if(($conne -> error)){
                                   echo "Se ha producido un error al consultar la informacion de las facturas <br>";
                                   echo $conne -> errno ."=". $conne -> error ."<br>";
                                }
                                else{
                                    while ($fila =mysqli_fetch_array($datos)) {
                                    echo '<option value="'.$fila['primer_nombre'].'">'.$fila['primer_nombre'].'</option>';
                                    }
                                }
                            ?>
                    </select></tr>
                    <tr><input type="submit" name="buscar" value="Buscar"></tr>
                    </table>
                </form>
            </div>
        </div>
        
    </body>
</html>