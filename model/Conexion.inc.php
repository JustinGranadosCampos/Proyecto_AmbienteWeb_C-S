<?php
### This is a PDO Connection Class ###
class Conexion
{
    private $db_usuario = 'root';
    private $db_pass = '';
    private $db_host = 'localhost';
    private $db_name = 'qrv_system';
    private $conexion;

    public function conectar()
    {
        try {
            $string_conexion = "mysql:host=".$this->db_host.";dbname=".$this->db_name;
            $pdo = new PDO($string_conexion, $this->db_usuario, $this->db_pass);
            // echo "Connected successfully!";
            return $pdo;
        } catch (PDOException $e) {
            exit("ERROR: Could not connect to the database $this->db_name ". $e->getMessage());
        }
    }

    private function desconectar()
    {
        $this->conexion = null;
    }
}
