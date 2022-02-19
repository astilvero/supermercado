<html>
<head>
		<title></title>
		
	</head>

	<h2>ELIMINAR PRODUCTO</h2>
<form action="#" method = "post">
<input type="text" name="documento" placeholder="digite el nombre del producto" size="40">
<input type="submit" value="eliminar">
</form>
<table width="50%"align="left">
<tr>

<td>&nbsp;</td>


</tr>
</table>
	
<?php 
//llamar archio de conexion
require_once('conexion.php');

// traer las variables del formulario
echo $Caja = $_POST['Caja'];

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();
echo $sql = "DELETE FROM producto WHERE prod_id = '$Caja' ";
$stmt = $llamarMetodo->prepare($sql);
$stmt ->execute();
echo $Caja;
if($stmt){
	echo "datos borrados";
}
else{
	echo "no funciono";
}

?>
</html>