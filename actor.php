<?php
include("conexiondb.php");
$sql="select actor_id,first_name,last_name from actor where actor_id=:actor_id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":actor_id",$_GET['actor_id']);
$stm->execute();
$datos=$stm->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($datos);
// Establece la cabecera para indicar que la respuesta es JSON
header('Content-Type: application/json');
echo $json;
?>