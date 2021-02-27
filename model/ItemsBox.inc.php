<?php

include_once "./Conexion.inc.php";
$object = new Conexion();
$connection = $object->conectar();

$label = (isset($_POST[''])) ? $_POST[''] : '';

$SQL_SELECT_V_ITEM_X_BOX = "SELECT * FROM V_ITEM_x_BOX";
// return $execution = $connection->query($SQL_SELECT_V_ITEM_X_BOX)->fetchAll(PDO::FETCH_ASSOC);
$result = $connection->prepare($SQL_SELECT_V_ITEM_X_BOX);
// $result->execute();
print json_encode($execution, JSON_UNESCAPED_UNICODE);
$connection = null;
?>