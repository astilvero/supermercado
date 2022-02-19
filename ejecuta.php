<?php 
 
	include("conexion.php");

/* verificamos si selecciono eliminar */
	if ($_POST['radio']=='elim'){ 
	//sentencia sql para eliminar
		$sql = "DELETE FROM producto WHERE prod_id='".$_POST['prod_id']."'";
		$result = mysql_query($sql);
		if (! $result){die ('ERROR AL ELIMINAR EL REGISTRO'. mysql_error());}
		else{echo "REGISTRO ELIMINADO CON EXITO";}
	}
/* verificamos si selecciono modificar */
	if ($_POST['radio']=='mod'){
	//sentencia sql para modificar
		$sql = "UPDATE productos SET prod_id='".$_POST['prod_id']."', mar_id='".$_POST['mar_id']."', prod_nombre=".$_POST['prod_nombre'].", prod_presentacion=".$_POST['prod_presentacion'].", tipo_id=".$_POST['tipo_id'];
		$result = mysql_query($sql);
		if (! $result){die ('ERROR AL MODIFICAR EL REGISTRO'. mysql_error());}
		else{echo "MODIFICACION EXITOSA";}
	}
?>