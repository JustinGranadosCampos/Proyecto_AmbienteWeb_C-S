<?php
### This is a PDO Connection Class ###
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
            exit("ERROR: Could not connect to the database $this->db_name ". $e->getMessage());
        }
    }

    public function consulta($consulta, $datos){
        //statement query, setea parametors, retorna resultado
    }

    public function insertar($consulta, $datos){
        //statement query, setea parametors, retorna resultado
    }

    public function actualizar($consulta, $datos){

    }

    public function borrar($consulta, $datos){

    }

    public function desconectar()
    {
        $this->conexion = null;
    }

    public function reportError($code, $msg, $file, $line){
        // $arreglo = array(
        //     'code' => $code
        //     , 'msg' => $msg
        //     , 'file' => $file
        //     , 'line' => $line
        // );
        echo '<script>console.log("llegue bitches")</script>';
            $sql = "call InsertErrorLog(?, ?, ?, ?, ?)";
            $gsent = $this->conectar()->prepare($sql);
            $gsent->bindParam(1, 1234, PDO::PARAM_INT);
            $gsent->bindParam(2, $code, PDO::PARAM_STR);
            $gsent->bindParam(3, $msg, PDO::PARAM_STR);
            $gsent->bindParam(4, $file, PDO::PARAM_STR);
            $gsent->bindParam(5, $line, PDO::PARAM_INT);
            
            $gsent->execute();

        // echo '<pre>'; print_r($arreglo); echo '</pre><hr>';
        // 'INSERT INTO cagada_seguida (codigo, mensaje, archivo, linea, fecha') VALUES ($code, $file, $line, $line, NOW())
    }
}
