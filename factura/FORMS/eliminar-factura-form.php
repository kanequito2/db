<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar Factura</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR FACUTRAS</h1>
                <h2 align="center" style="color: white">Eliminar</h2>
            </div>
        
            <div class="scrollmenu">
                    <a href="/factura/gestionar-facturas.php">Inicio Gestion</a>
                    <a href="/factura/FORMS/registrar-factura-form.php">Registrar factura</a>
                    <a href="/buscar/FORMS/buscar-form.php">Buscar</a>
            </div>
            </div>
        </div>
        <div align = "center">
            <div>
                <br>
                <form method="POST" action="/factura/CRUD/eliminar-factura-id.php">
                    <table>
                    <tr><select name="id" required>
                            <?php
                                require $_SERVER['DOCUMENT_ROOT'] ."\conexion.php" ;
                                $conne = Conectar::conn();
                                $sql = "SELECT id, fecha, valor, empleado_cedula, codigo_empresa FROM `factura`";
                
                                $datos = mysqli_query($conne, $sql);
                
                                if(($conne -> error)){
                                   echo "Se ha producido un error al consultar la informacion de las facturas <br>";
                                   echo $conne -> errno ."=". $conne -> error ."<br>";
                                }
                                else{
                                    while ($fila =mysqli_fetch_array($datos)) {
                                    echo '<option value="'.$fila['id'].'">'.$fila['id'].' - '.$fila['fecha'].'</option>';
                                    }
                                }
                            ?>
                    </select></tr>
                    <tr><input type="submit" name="eliminar" value="Eliminar"></tr>
                    </table>
                </form>
            </div>
        </div>
        
    </body>
</html>