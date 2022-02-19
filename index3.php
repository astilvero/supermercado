<?php
	include("conexion.php");
	$nombre=$_POST['Caja'];
	//echo $nombre;
	$con = new conexion();
	$con ->conectar();
				$query = "SELECT * FROM tabla WHERE estu_id='$nombre'" ;
		$resultado = mysql_query($query);

		while ($fila = mysql_fetch_array($resultado)){

			echo "$fila[estu_id]";
			echo "$fila[estu_nombres]";
			echo "$fila[estu_apellidos]";
			echo "$fila[estu_edad]";
			echo "$fila[estu_saldo]";
			}
 ?>

<p><a href="index.php">volver ..</a></p>
