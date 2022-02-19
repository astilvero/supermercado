<?php 
//error_reporting(0);
//llamar archio de conexion
require_once('conexion.php');

// traer las variables del formulario
$tipro_nombre = $_POST['tipro_nombre'];

echo $tipro_nombre;
//echo $date_usuario;
//metodo
$conn = new conexion();
$llamarMetodo = $conn->Conectar();

$sql = "INSERT INTO tipo_producto VALUES ('', '$tipro_nombre')";

$stmt = $llamarMetodo->prepare($sql);
$stmt ->execute();

if($stmt){
	echo "datos insertados";
}
else{
	echo "no funciono";
}

?>
<p><a href="/supermercado/tipoprod.php">Ir al formulario</a> </p>