<html>
<head>
		<title></title>
	
	</head>

	<h2>Modificar cliente</h2>
	
<?php 
//llamar archio de conexion
require_once('conexion.php');

// traer las variables del formulario
$documento = $_POST['documento'];
$conn = new Conexion();
$llamarMetodo = $conn->Conectar();
$sql = "UPDATE producto SET mar_id = '$mar_id', prod_nombre = '$prod_nombre', prod_presentacion = '$prod_presentacion', tipro_id = '$tipro_id', WHERE mar_id = '$mar_id'";
$stmt = $llamarMetodo->prepare($sql);
$stmt ->execute();
echo $documento;
if($stmt){
	echo "datos borrados";
}
else{
	echo "no funciono";
}

?>
</html>
$date_mail = $_POST['date_mail'];
$date_usuario = $_POST['date_usuario'];
$date_clave = $_POST['date_clave'];
$date_estrato = $_POST['date_estrato'];
$ciudad_id = $_POST['ciudad_id'];
$rol = $_POST['rol'];
