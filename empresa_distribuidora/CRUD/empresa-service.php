<?php
    require $_SERVER['DOCUMENT_ROOT'] ."\conexion.php" ;
    class Empresa_Service{
        public function insertar_empresa ($codigo, $nombre,$gerente){
                $conne = Conectar::conn();
                $sql = "INSERT INTO empresa VALUES ('$codigo', '$nombre', '$gerente')";
                if(!mysqli_query($conne, $sql)){
                    echo "Se ha producido un error al registrar la empresa <br>";
                    echo $conne -> errno ."=". $conne -> error ."<br>";
                    echo "<button onClick='history.back()'>Regresar</button>";
                }
                else{
                    echo    "<script type='text/javascript'>
                                alert('La empresa ha sido registrado correctamente');
                                window.history.go(-1);
                            </script>";
                }

        }

        public function mostrar_empresa(){
            $conne = Conectar::conn();
            $sql = "SELECT codigo, nombre, gerente FROM `empresa`";

            $datos = mysqli_query($conne, $sql);

            if(($conne -> error)){
                echo "Se ha producido un error al consultar la informacion de las empresas. <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                echo "<table>";
                    echo "<tr>";
                        echo "<td><b>Código</b></td>";
                        echo "<td><b>Nombre</b></td>";
                        echo "<td><b>Gerente</b></td>";
                    echo "</tr>";
                while ($fila =mysqli_fetch_array($datos)){
                    echo "<tr>";
                        echo "<td>".$fila ["codigo"]."</td>";
                        echo "<td>".$fila ["nombre"]."</td>";
                        echo "<td>".$fila ["gerente"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        public function borrar_empresa ($codigo){
            $conne = Conectar::conn();
            $sql = "DELETE  
                      FROM empresa 
                     WHERE empresa.codigo = $codigo";
                if(!mysqli_query($conne, $sql)){
                    echo "Se ha producido un error al borrar la empresa <br>";
                    echo $conne -> errno ."=". $conne -> error ."<br>";
                    echo "<button onClick='history.back()'>Regresar</button>";
                }
                else{
                    echo    "<script type='text/javascript'>
                                alert('La empresa ha sido borrada correctamente');
                                window.history.go(-1);
                            </script>";
                }
        }
    }
?>