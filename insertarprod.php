<?php 
//error_reporting(0);
//llamar archio de conexion
require_once('conexion.php');

// traer las variables del formulario
$mar_id= $_POST['mar_id'];
$prod_nombre = $_POST['prod_nombre'];
$prod_presentacion = $_POST['prod_presentacion'];
$tipro_id = $_POST['tipro_id'];

echo $mar_id;
$conn = new conexion();
$llamarMetodo = $conn->Conectar();

$sql = "INSERT INTO producto VALUES ('', '$mar_id', '$prod_nombre', '$prod_presentacion', '$tipro_id')";

$stmt = $llamarMetodo->prepare($sql);
$stmt ->execute();

if($stmt){
	echo "datos insertados";
}
else{
	echo "no funciono";
}

?>
<p><a href="/supermercado/producto.php">Ir al formulario</a> </p>
<p><a href="/supermercado/index.php">Visualizar productos</a> </p>