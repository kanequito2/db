<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar Empresa</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR EMPRESAS</h1>
                <h2 align="center" style="color: white">Eliminar</h2>
            </div>
        
            <div class="scrollmenu">
                    <a href="/empresa_distribuidora/gestionar-empresa.php">Inicio Gestion</a>
                    <a href="/empresa_distribuidora/FORMS/registrar-empresa-form.html">Registrar empresa</a>
                    <a href="/empresa_distribuidora/FORMS/consultar-empresa-form.php">Consultar</a>
                    <a href="/empresa_distribuidora/FORMS/buscar-empresa-form.php">Buscar</a>
            </div>
            </div>
        </div>
        <div align = "center">
            <div>
                <br>
                <form method="POST" action="/empresa_distribuidora/CRUD/eliminar-empresa-id.php">
                    <table>
                    <tr><select name="codigo" required>
                            <?php
                                require $_SERVER['DOCUMENT_ROOT'] ."/conexion.php" ;
                                $conne = Conectar::conn();
                                $sql = "SELECT codigo, nombre FROM `empresa`";
                
                                $datos = mysqli_query($conne, $sql);
                
                                if(($conne -> error)){
                                   echo "Se ha producido un error al consultar la informacion de las empresas <br>";
                                   echo $conne -> errno ."=". $conne -> error ."<br>";
                                }
                                else{
                                    while ($fila =mysqli_fetch_array($datos)) {
                                    echo '<option value="'.$fila['codigo'].'">'.$fila['codigo'].' - '.$fila['nombre'].'</option>';
                                    }
                                }
                            ?>
                    </select></tr>
                    <tr><input type="submit" name="eliminar" value="Eliminar"></tr>
                    <table>
                </form>
            </div>
        </div>
        
    </body>
</html>