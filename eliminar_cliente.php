<html>
<head>
		<title></title>
		<style type="text/css">
			body {
	background-color: #004F82;
	margin: 12;
  padding: 10px;
}
h2{
text-align:left;color:#FCFCFD;
}
			* {
				margin:0px;
				padding:1px;
			}
			
			#header {
				margin:0;
				width:200px;
				font-family:Arial, Helvetica, sans-serif;
			}
						
		</style>
	</head>
	
<?php 
//llamar archio de conexion
require_once('conexion.php');

// traer las variables del formulario
$documento = $_POST['ndocumento'];

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();
$sql = "DELETE FROM clientes WHERE documento = '$documento' ";
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