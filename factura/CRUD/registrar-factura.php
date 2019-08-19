<?php
    include($_SERVER['DOCUMENT_ROOT']."/factura/CRUD/factura-service.php");
    $nuevo = new Factura_Service();
    $nuevo->insertar_factura($_POST["id"],$_POST["fecha"],$_POST["valor"], $_POST["codigo_empresa"], $_POST["empleado_cedula"]);
    echo  $_POST["empleado_cedula"] ==  '';
?>