<?php
class Conectar{
    private static $conexion;
    private static function crearconn() : mysqli{
        $host     = "localhost";    //Servidor
        $user     = "root";         //Usuario
        $password = "";             //Contraseña
        $db_name  = "base_datos_1"; //Nombre de la bd
    
        //Se establece la conexión con la base de datos
        
        $conexion = new mysqli($host, $user, $password, $db_name);

        //Se verifica la conexión
        if (mysqli_connect_errno()){
            echo "
            <script>
               alert('Error al conectar con la base de datos: '.$conexion->connect_error.');
               window.history.go(-1);
            </script>
            ";
            return null;
        }else{
            return $conexion;
        }
    }
    //Si ya existe la conexion la devuelve de lo contrario la crea
    public static function conn() : mysqli{
        if (is_null(self::$conexion)){
            self::$conexion = Conectar::crearconn();
            echo "
            <script>
               console.log(1);
            </script>
            ";
            return self::$conexion;
        } 
        else if (mysqli_ping(self::$conexion)) {
            return self::$conexion;
        }
        else{
            self::$conexion = Conectar::crearconn();
            return self::$conexion;
        }
    }
}
?>