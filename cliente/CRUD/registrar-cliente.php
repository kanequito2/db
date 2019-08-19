<?php
    include($_SERVER['DOCUMENT_ROOT']."/cliente/CRUD/cliente-service.php");
    $nuevo = new Cliente_Service();
    $nuevo->insertar_Cliente($_POST["cedula"],$_POST["nombre"],$_POST["salario"]);
?>