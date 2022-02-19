<?php 
error_reporting(0);
//llamar archio de conexion
require_once('conexion.php');

?>

<html>
<head>
	<title>Insertar cliente</title>
<style type="text/css">
body {
	background-color: #E033FF;
	margin: 12;
  padding: 10px;
}
h2{
text-align:center;color:#FCFCFD;
}

input#boton{
width:100px;
height:30px;
color:#FCFCFD;
background-color: #000101;
}
</style>
	</head>
<body>

<br>
<h2>INSERTAR PRODUCTO<h2>
 <form action="insertarprod.php" method="post">
 	<p align= center>Marca &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="mar_id" id="select">
    
	<?php
      $conn = new conexion();
	  $llamarMetodo = $conn->Conectar();
	  $sql = "SELECT * FROM marca";
	  $stmt = $llamarMetodo->prepare($sql);
	  $stmt ->execute();
		
	  while ($fila = $stmt->fetch()){
      ?> 
      <option value="<?php echo "$fila[0]";?>"><?php echo "$fila[1]";?></option><?php }?></select></label>
    <br></p>
	<p align= center>Nombre del producto &nbsp;
    <input name="prod_nombre" type="text" size="40">
    <br></p>
 	<p align= center>Presentación del producto &nbsp;&nbsp;
    <input name="prod_presentacion" type="text" size="40">
    <br></p>
 	<p align= center>Tipo de producto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="tipro_id" id="select">
    
	<?php
      $conn = new conexion();
	  $llamarMetodo = $conn->Conectar();
	  $sql = "SELECT * FROM tipo_producto";
	  $stmt = $llamarMetodo->prepare($sql);
	  $stmt ->execute();
		
	  while ($fila = $stmt->fetch()){
      ?> 
      <option value="<?php echo "$fila[0]";?>">
      <?php echo "$fila[0]";?></option><?php }?></select></label>
    <br></p>
	
 	<p align="center"><input  type="submit" id="boton" value="Insertar"></p>
	<p><a href="/supermercado/index.php">Visualizar productos</a> </p>
	
 </form>

 </body>
</html>