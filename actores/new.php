<?php
if(isset($_POST["name"]) && $_POST["lastname"]){

include("../conexiondb.php");
$sql="insert into actor(first_name,last_name) values(:first_name,:last_name)";
$stm=$conexion->prepare($sql);
$stm->bindParam(":first_name", $_POST['name']);
$stm->bindParam(":last_name", $_POST['lastname']);
$stm->execute();
$actor_id=$conexion->lastInsertId();
$datos=[
    'actor_id'=>$actor_id,
    'first_name'=>$_POST['name'],
    'last_name'=>$_POST['lastname']
];
$json=json_encode($datos);
// Establece la cabecera para indicar que la respuesta es JSON

}
else{
    $response=[
    'status' => '200',
    'message'=> 'No se han recibido los datos necesarios'
    ];
    $json=json_encode($response);
}
include('../envio.php');
echo $json;
?>