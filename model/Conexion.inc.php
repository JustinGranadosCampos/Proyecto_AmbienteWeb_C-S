<?php
class Conexion
{
    private $db_usuario = 'root';
    private $db_pass = '';
    private $db_host = 'localhost';
    private $db_name = 'sistemaQRV';
    private $conexion;

    public function conectar()
    {
        try {
            $string_conexion = "mysql:host=".$this->db_host.";dbname=".$this->db_name;
            $this->conexion = new PDO($string_conexion, $this->db_usuario, $this->db_pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            die("Connection Error: ". $e->getMessage());
        }
    }

    public function desconectar()
    {
        $this->conexion = null;
    }

    public function reportError($code, $msg, $file, $line)
    {
        $codigopesito = 1234;
        $sql = "call InsertErrorLog(?, ?, ?, ?, ?)";
        $gsent = $this->conectar()->prepare($sql);
        $gsent->bindParam(1, $codigopesito, PDO::PARAM_INT);
        $gsent->bindParam(2, $code, PDO::PARAM_STR);
        $gsent->bindParam(3, $msg, PDO::PARAM_STR);
        $gsent->bindParam(4, $file, PDO::PARAM_STR);
        $gsent->bindParam(5, $line, PDO::PARAM_INT);
        $gsent->execute();
    }
}
