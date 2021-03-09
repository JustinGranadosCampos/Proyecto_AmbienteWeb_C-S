<?php
// class Usuario extends Persona{
//     private wwid;
//     private idRol;
//     private static SQL_INSERTAR_USUARIO = "INSERT INTO USUARIO VALUES()";
//     private static SQL_MOSTRAR_USUARIO = "SELECT * FROM USUARIO WHERE IDUSUARIO =";
//     private static SQL_ACTUALIZAR_USUARIO = "INSERT INTO USUARIO VALUES()";
//     private static SQL_ELIMINAR_USUARIO = "INSERT INTO USUARIO VALUES()";

//     public function  __construct($nombre, $apellido1, $apellido2, $wwid, $idRol){
//         parent::__construct($nombre, $apellido1, $apellido2);
//         $this->wwid = $wwid;
//         $this->idRol = $idRol;
//     }

//     public function setWwid($wwid){
//         $this->wwid = $wwid;
//     }

//     public function setIdRol($idRol){
//         $this->idRol = $idRol;
//     }

//     public function getWwid(){
//         return $this->wwid;
//     }

//     public function getIdRol(){
//         return $this->idRol;
//     }

//     protected function insertar($registro){
//         #REVISAR ESTO
//         $conexion = parent::conectar();
//         try{

//         }catch(Exception $e){
//             exit("ERROR: ".$e->getMessage());
//         }
//     }

//     protected function consultar(){
//         $conexion = parent::conectar();
//     }

//     protected function actualizar($registro){
//         $conexion = parent::conectar();
//     }

//     protected function eliminar($accion, $eliminar){
//         $conexion = parent::conectar();
//     }
// }
?>