<?php
    require $_SERVER['DOCUMENT_ROOT'] ."\conexion.php" ;
    class Buscar_Service{

        public function buscar_nombre($primer_nombre){
            $conne = Conectar::conn();
            $sql = "SELECT * FROM factura
                    JOIN (SELECT cedula FROM empleado e
                    WHERE e.primer_nombre ='$primer_nombre') f
                    ON f.cedula = factura.empleado_cedula";
            $datos = mysqli_query($conne,$sql);
            if(($conne -> error)){
                echo "Se ha producido un error al obtener la informacion de los facturas <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                echo "<table>";
                    echo "<tr>";
                        echo "<td><b>Id</b></td>";
                        echo "<td><b>Fecha</b></td>";
                        echo "<td><b>Valor</b></td>";
                        echo "<td><b>Código Empresa</b></td>";
                        echo "<td><b>Cedula del empleado</b></td>";
                    echo "</tr>";
                while ($fila =mysqli_fetch_array($datos)){
                    echo "<tr>";
                        echo "<td>".$fila ["id"]."</td>";
                        echo "<td>".$fila ["fecha"]."</td>";
                        echo "<td>".$fila ["valor"]."</td>";
                        echo "<td>".$fila ["codigo_empresa"]."</td>";
                        echo "<td>".$fila ["empleado_cedula"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        
        public function buscar_nit($codigo,$fecha){
            $conne = Conectar::conn();
            $sql = "SELECT * FROM factura WHERE factura.fecha >= '$fecha' AND factura.codigo_empresa = $codigo";
            $datos = mysqli_query($conne, $sql);
            if(($conne -> error)){
                echo "Se ha producido un error al obtener la informacion de los facturas <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                echo "<table>";
                    echo "<tr>";
                        echo "<td><b>Id</b></td>";
                        echo "<td><b>Fecha</b></td>";
                        echo "<td><b>Valor</b></td>";
                        echo "<td><b>Código Empresa</b></td>";
                        echo "<td><b>Cedula del empleado</b></td>";
                    echo "</tr>";
                while($fila =mysqli_fetch_array($datos)){
                    echo "<tr>";
                        echo "<td>".$fila ["id"]."</td>";
                        echo "<td>".$fila ["fecha"]."</td>";
                        echo "<td>".$fila ["valor"]."</td>";
                        echo "<td>".$fila ["codigo_empresa"]."</td>";
                        echo "<td>".$fila ["empleado_cedula"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        public function consulta($consulta){
            $conne = Conectar::conn();
            if($consulta == 0){
            $sql = "SELECT * FROM factura WHERE factura.empleado_cedula is NULL and factura.codigo_empresa is NULL";
            $datos = mysqli_query($conne, $sql);
            if(($conne -> error)){
                echo "Se ha producido un error al obtener la informacion de los facturas <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                echo "<table>";
                    echo "<tr>";
                        echo "<td><b>Id</b></td>";
                        echo "<td><b>Fecha</b></td>";
                        echo "<td><b>Valor</b></td>";
                        echo "<td><b>Código Empresa</b></td>";
                        echo "<td><b>Cedula del empleado</b></td>";
                    echo "</tr>";
                while($fila =mysqli_fetch_array($datos)){
                    echo "<tr>";
                        echo "<td>".$fila ["id"]."</td>";
                        echo "<td>".$fila ["fecha"]."</td>";
                        echo "<td>".$fila ["valor"]."</td>";
                        echo "<td>".$fila ["codigo_empresa"]."</td>";
                        echo "<td>".$fila ["empleado_cedula"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            }
            elseif($consulta == 1){
            $sql = "SELECT max(f.conteo) AS c
            FROM (SELECT count(empleado_cedula) AS conteo FROM factura
            WHERE (empleado_cedula IS NOT NULL) GROUP BY empleado_cedula) f";
            $datos = mysqli_query($conne, $sql);
            if(($conne -> error)){
                echo "Se ha producido un error al obtener la informacion de los facturas <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                if($fila =mysqli_fetch_array($datos)){
                    $maximum = $fila['c'];
                }
                $sql = "SELECT f.empleado_cedula FROM 
                (SELECT empleado_cedula, count(empleado_cedula) as conteo FROM factura
                GROUP BY empleado_cedula) f
                WHERE f.conteo = $maximum";
                $resconteo = mysqli_query($conne, $sql);
                echo "<table>";
                echo "<tr>";
                    echo "<td><b>Cedula</b></td>";
                    echo "<td><b>Nombre</b></td>";
                echo "</tr>";
                while($fila =mysqli_fetch_array($resconteo)){
                    $cedul = $fila['empleado_cedula'];
                    $sql = "SELECT * FROM empleado
                    WHERE cedula = $cedul";
                    $res = mysqli_query($conne,$sql);
                    if($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row ["cedula"]."</td>";
                        echo "<td>".$row ["primer_nombre"]."</td>";
                        echo "</tr>";
                    }
                }
            }
            }
            elseif($consulta == 2){
                $sql = "SELECT codigo_empresa, sum(valor) as suma
                FROM factura
                WHERE (codigo_empresa is not NULL)
                GROUP BY codigo_empresa";
                $datos = mysqli_query($conne, $sql);
                echo "<table>";
                echo "<tr>";
                    echo "<td><b>NIT</b></td>";
                    echo "<td><b>Nombre</b></td>";
                echo "</tr>";
                while($fila =mysqli_fetch_array($datos)){
                    if($fila['suma']<=5000){
                        $cod = $fila['codigo_empresa'];
                        $sql = "SELECT * FROM empresa WHERE codigo = $cod";
                        $res = mysqli_query($conne, $sql);
                        if($row=mysqli_fetch_array($res)){
                            echo "<tr>";
                            echo "<td>".$row ["codigo"]."</td>";
                            echo "<td>".$row ["nombre"]."</td>";
                            echo "</tr>";
                        }
                    }
                }
                
            }
            else{
                echo 'error de opcion de consulta.';
                echo "<button onClick='history.back()'>Regresar</button>";
            }
        }


    }
?>