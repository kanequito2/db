<?php
    require $_SERVER['DOCUMENT_ROOT'] ."\conexion.php" ;
    class Factura_Service{
        public function insertar_factura ($id, $fecha, $valor, $codigo_empresa, $empleado_cedula){
                $conne = Conectar::conn();
                if ($codigo_empresa == '' && $empleado_cedula <> '') {
                    $sql = "INSERT INTO factura(id, fecha, valor, empleado_cedula)  VALUES ('$id', '$fecha', '$valor', '$empleado_cedula')";
                    if(!mysqli_query($conne, $sql)){
                        echo "Se ha producido un error al registrar la factura 1 <br>";
                        echo $conne -> errno ."=". $conne -> error ."<br>";
                        echo "<button onClick='history.back()'>Regresar</button>";
                    }
                    else{
                        echo    "<script type='text/javascript'>
                                    alert('La factura ha sido registrado correctamente');
                                    window.history.go(-1);
                                </script>";
                    }
                }
                else if ($empleado_cedula == '' && $codigo_empresa <> '') {
                    $sql = "INSERT INTO factura(id, fecha, valor, codigo_empresa)  VALUES ('$id', '$fecha', '$valor', '$codigo_empresa')";
                    if(!mysqli_query($conne, $sql)){
                        echo "Se ha producido un error al registrar la factura 2 <br>";
                        echo $conne -> errno ."=". $conne -> error ."<br>";
                        echo "<button onClick='history.back()'>Regresar</button>";
                    }
                    else{
                        echo    "<script type='text/javascript'>
                                    alert('La factura ha sido registrado correctamente');
                                    window.history.go(-1);
                                </script>";
                    }
                }
                else if ($empleado_cedula == '' && $codigo_empresa == '') {
                    $sql = "INSERT INTO factura(id, fecha, valor)  VALUES ('$id', '$fecha', '$valor')";
                    if(!mysqli_query($conne, $sql)){
                        echo "Se ha producido un error al registrar la factura 3 <br>";
                        echo $conne -> errno ."=". $conne -> error ."<br>";
                        echo "<button onClick='history.back()'>Regresar</button>";
                    }
                    else{
                        echo    "<script type='text/javascript'>
                                    alert('La factura ha sido registrado correctamente');
                                    window.history.go(-1);
                                </script>";
                    }
                }
                else{
                    echo "No puede ingresar un empleado y una empresa simultaneamente. <br>";
                    echo "<button onClick='history.back()'>Regresar</button>";
                }
                
                

        }

        public function mostrar_factura(){
            $conne = Conectar::conn();
            $sql = "SELECT id, fecha, valor, codigo_empresa, empleado_cedula FROM `factura`";

            $datos = mysqli_query($conne, $sql);

            if(($conne -> error)){
                echo "Se ha producido un error al consultar la informacion de las facturas <br>";
                echo $conne -> errno ."=". $conne -> error ."<br>";
            }
            else{
                echo "<table>";
                    echo "<tr>";
                        echo "<td><b>Id</b></td>";
                        echo "<td><b>Fecha</b></td>";
                        echo "<td><b>Valor</b></td>";
                        echo "<td><b>Código Empresa</b></td>";
                        echo "<td><b>Cedula del cliente</b></td>";
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

        public function borrar_factura ($id){
            $conne = Conectar::conn();
            $sql = "DELETE  
                      FROM factura 
                     WHERE factura.id = $id";
                if(!mysqli_query($conne, $sql)){
                    echo "Se ha producido un error al eliminar la factura <br>";
                    echo $conne -> errno ."=". $conne -> error ."<br>";
                    echo "<button onClick='history.back()'>Regresar</button>";
                }
                else{
                    echo    "<script type='text/javascript'>
                                alert('La factura ha sido borrado correctamente');
                                window.history.go(-1);
                            </script>";
                }
        }
    }
?>