<?php
#Conexion tipo PDO
const DB = 'mysql';
const DBHOST = 'localhost'; #'172.18.233.85:3306';
const DB_CHARSET = 'utf8';

/*abstract */class Conexion{
    private static $db_usuario = 'usr_qrv';
    private static $db_pass = 'scqr!1368';
    private static $db_host = DBHOST;
    private static $db_name = 'sistemaQRV';
    private static $db_charset = DB_CHARSET;
    private $conexion;

    public function conectar(){
        try{
            $string_conexion = "mysql:host=".self::$db_host.";dbname=".self::$db_name;
            $pdo = new PDO($string_conexion, self::$db_usuario, self::$db_pass);
            $pdo->exec("SET CHARACTER SET ".self::$db_charset);
            echo "Connected successfully!"
            return $pdo;
        }catch(PDOException $e){
            exit("ERROR: Could not connect to the database $db_name". $e->getMessage());
        }
    }

    private function desconectar(){
        $this->conexion = null;
    }

    # C R U D
    // abstract protected function insertar($registro);
    // abstract protected function consultar();
    // abstract protected function actualizar($registro);
    // abstract protected function eliminar($accion, $eliminar);
}
?>
