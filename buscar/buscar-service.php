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


    }
?>