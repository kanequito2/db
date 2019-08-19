<!DOCTYPE html>
<html>
    <head>
        <title>Registro empleado</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">GESTIONAR EMPLEADOS</h1>
                <h2 align="center" style="color: white">Registrar</h2>
            </div>
        
            <div class="scrollmenu">
                    <a href="/cliente/gestionar-clientes.php">Inicio Gestion</a>
                    <a href="/cliente/FORMS/eliminar-cliente-form.php">Eliminar empleado</a>
                    <a href="/admin/FORMS/buscar-admin-form.php">Buscar</a>
            </div>
            </div>
        </div>
        <div align = "center">
            <div>
                <br>
                <form method="POST" action="/cliente/CRUD/registrar-cliente.php">
                    <table>
                    <tr>
                        <th align="left">Cedula:<br></th>
                        <th><input type="number" name="cedula" required><br></th>
                    </tr>
                    <tr>
                         <th align="left">Nombre:<br></th>
                         <th><input type="text" name="nombre" required></th>
                    </tr>
                    <tr>
                         <th align="left">Salario:<br></th>
                         <th><input type="number" name="salario" required></th>
                    </tr>
                    
                    <tr>
                        <th colspan=2><input align = "center" type="submit" value="Registrar"></th>
                    </tr>
                    
                    </table>
                </form>
            </div>
        </div>
        
    </body>
</html>