<!DOCTYPE html>
<html>
    <head>
        <title>CONSULTA DISC-APP</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="titulo">
            <div>
                <br>
                <h1 align="center" style="color: white">DiscApp</h1>
                <h2 align="center" style="color: white">CONSULTA</h2>
            </div>

            <div class="scrollmenu">
                <a href="/index.html">Inicio</a>
                <a href="/empresa_distribuidora/gestionar-empresa.php">Gestionar empresas</a>
                <a href="/cliente/gestionar-clientes.php">Gestionar empleados</a>
                <a href="/factura/gestionar-facturas.php">Gestionar facturas</a>
                <a href="/buscar/FORMS/buscar-form.php">Buscar</a>
                <a href="/buscar/FORMS/consulta-form.php">Consultar</a>
            </div>
        </div>
        
        <br>
        <h2 align='center'>CONSULTAS</h2>
        <br>

        <form method = "POST" action="/buscar/CRUD/consulta.php">
        <table>
            <br><tr><input type ="radio" name="consulta" value=0 checked>Facturas sin empleado ni empresa asociado.</tr><br>
            <tr><input type ="radio" name="consulta" value=1>Empledo con mayor numero de facturas.</tr><br>
            <tr><input type ="radio" name="consulta" value=2>NIT con monto total menor o igual a 5000.</tr><br>
            <tr><input type ="submit" name="submit"></tr><br>
        </table>
    </form>

    </body>
</html>