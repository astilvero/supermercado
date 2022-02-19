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
	background-color: #008000;
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
<h2>INSERTAR TIPO DE PRODUCTO<h2>
 <form action="insertartipop.php" method="post">
 	<p align= center>Nombre del tipo de producto &nbsp;
    <input name="tipro_nombre" type="text" size="40">
    <br></p>
 		
 	<p align="center"><input  type="submit" id="boton" value="Enviar"></p>
 </form>

 </body>
</html>