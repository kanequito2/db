<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar Clientes</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR EMPLEADOS</h1>
                <h2 align="center" style="color: white">Eliminar</h2>
            </div>
        
            <div class="scrollmenu">
                    <a href="/cliente/gestionar-clientes.php">Inicio Gestion</a>
                    <a href="/trabajador/FORMS/registrar-cliente-form.php">Registrar empleado</a>
                    <a href="/buscar/FORMS/buscar-form.php">Buscar</a>
            </div>
            </div>
        </div>
        <div align = "center">
            <div>
                <br>
                <form method="POST" action="/cliente/CRUD/eliminar-cliente-id.php">
                    <table>
                    <tr><select name="cedula" required>
                            <?php
                                require $_SERVER['DOCUMENT_ROOT'] ."\conexion.php" ;
                                $conne = Conectar::conn();
                                $sql = "SELECT cedula, primer_nombre, salario FROM `empleado`";
                
                                $datos = mysqli_query($conne, $sql);
                
                                if(($conne -> error)){
                                   echo "Se ha producido un error al consultar la informacion de los clientes <br>";
                                   echo $conne -> errno ."=". $conne -> error ."<br>";
                                }
                                else{
                                    while ($fila =mysqli_fetch_array($datos)) {
                                    echo '<option value="'.$fila['cedula'].'">'.$fila['cedula'].' - '.$fila['primer_nombre'].'</option>';
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