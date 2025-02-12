<?php
include("../conexiondb.php");
$sql="SELECT a.first_name, a.last_name, f.title 
FROM actor a 
JOIN film_actor fa 
ON a.actor_id = fa.actor_id
JOIN film f 
ON fa.film_id = f.film_id 
WHERE a.actor_id=:actor_id;";
$stm=$conexion->prepare($sql);
$stm->bindParam(":actor_id",$_GET['actor_id']);
$stm->execute();
$datos=$stm->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($datos);
include('../envio.php');
echo $json;
?>