<?php
    include($_SERVER['DOCUMENT_ROOT']."/empresa_distribuidora/CRUD/empresa-service.php");
    $nuevo = new Empresa_Service();
    $nuevo->borrar_empresa($_POST["codigo"]);
?>