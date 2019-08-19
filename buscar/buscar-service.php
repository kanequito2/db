<?php
    require $_SERVER['DOCUMENT_ROOT'] ."\db-project\conexion.php" ;
    class Buscar_Service{
        public function consultar_trabajadores($cedula_jefe){
            $conne = Conectar::conn();
            $sql = "SELECT a.cedula cedula, a.nombre nombre, a.fecha_nacimiento fecha_nacimiento, a.tipo_de_sangre tipo_de_sangre, a.eps eps
                      FROM estandar a, administrador b
                     WHERE a.cedula_jefe = b.cedula
                       AND b.cedula = $cedula_jefe";
            $datos = mysqli_query($conne, $sql);

            if(($conne -> error)){
                echo "Se ha producido un error al obtener la informacion de los trabajadores <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                echo "<link rel='stylesheet' type='text/css' href='style.css'>";
                echo "<table>";
                    echo "<tr>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Cedula</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Nombre</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Fecha de nacimiento</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Tipo de sangre</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>EPS</b></td>";
                    echo "</tr>";
                while ($fila =mysqli_fetch_array($datos)){
                    echo "<tr>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila ["cedula"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila ["nombre"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila ["fecha_nacimiento"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila ["tipo_de_sangre"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila ["eps"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        public function consultar_trabajador($cedula_trabajador){
            $conne = Conectar::conn();
            $sql = "SELECT cedula, nombre, eps
                      FROM estandar
                     WHERE cedula = $cedula_trabajador";
            $datos = mysqli_query($conne, $sql);

            if(($conne -> error)){
                echo "Se ha producido un error al obtener la información del trabajador<br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                $fila =mysqli_fetch_array($datos);
                echo "<link rel='stylesheet' type='text/css' href='style.css'>";
                echo "<h3 align = 'center'>Trabajador</h3>";
                echo "<table>";
                    echo "<tr>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Cedula</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Nombre</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>EPS</b></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>".$fila['cedula']."</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>".$fila['nombre']."</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>".$fila['eps']."</b></td>";
                    echo "</tr>";
                echo "</table> <br>";
                
                $eps = $fila['eps'];
                $sql2 = "SELECT a.cedula cedula, a.nombre nombre, a.fecha_nacimiento fecha_nacimiento, a.tipo_de_sangre tipo_de_sangre, a.eps eps, a.codigo_acceso codigo_acceso 
                           FROM `administrador` a,  `estandar` b
                          WHERE b.eps = '$eps'
                            AND a.cedula = b.cedula_jefe
                       GROUP BY a.cedula, a.nombre, a.fecha_nacimiento, a.tipo_de_sangre, a.eps, a.codigo_acceso";
                $datos2 = mysqli_query($conne, $sql2);
                if(($conne -> error)){
                    echo "Se ha producido un error al obtener la información del trabajador<br>";
                    echo $conne -> errno ."=". $conne -> error ."<br>";
                }else{
                echo "<link rel='stylesheet' type='text/css' href='style.css'>";
                echo "<h3 align = 'center'>Administradores</h3>";
                echo "<table>";
                    echo "<tr>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Cedula</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Nombre</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Fecha de nacimiento</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Tipo de sangre</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>EPS</b></td>";
                        echo "<td align='center' style = 'border: black 1px solid'><b>Código de acceso</b></td>";
                    echo "</tr>";
                while ($fila2 =mysqli_fetch_array($datos2)){
                    echo "<tr>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila2 ["cedula"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila2 ["nombre"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila2 ["fecha_nacimiento"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila2 ["tipo_de_sangre"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila2 ["eps"]."</td>";
                        echo "<td align='center' style = 'border: black 1px solid'>".$fila2 ["codigo_acceso"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            }
        }


    }
?>