<?php
include("conexiondb.php");
$sql="select actor_id,first_name,last_name from actor";
$result=$conexion->query($sql);
$datos=$result->fetchAll(PDO::FETCH_ASSOC);

$json=json_encode($datos);



header('Content-Type: application/json');
echo $json;








?>