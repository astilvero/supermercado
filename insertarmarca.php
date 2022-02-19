<?php 
//error_reporting(0);
//llamar archio de conexion
require_once('conexion.php');

// traer las variables del formulario
$mar_nombre = $_POST['mar_nombre'];

echo $mar_nombre;
//echo $date_usuario;
//metodo
$conn = new conexion();
$llamarMetodo = $conn->Conectar();

$sql = "INSERT INTO marca VALUES ('', '$mar_nombre')";

$stmt = $llamarMetodo->prepare($sql);
$stmt ->execute();

if($stmt){
	echo "datos insertados";
}
else{
	echo "no funciono";
}

?>
<p><a href="/supermercado/formulario.php">Ir al Formulario</a> </p>