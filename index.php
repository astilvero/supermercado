<html>
<head>
  <title>Tabla</title>

<!-- Latest compiled and minified JavaScript -->

<script type="text/javascript">
  function visualizar(frm){
    frm.action="producto.php",frm.submit();
  }
  
  
</script>

<body>

 <table class="table">
  <thead class="thead-inverse">
    <script type="text/javascript">
	function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recorremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}
</script>
	<tr>
      <th><input type="checkbox" name="Caja[<?php echo "$fila[1]" ?>]" value="Caja[<?php echo "$fila[1]" ?>]" onclick="marcar(this);"</th>
      <th>Id</th>
      <th>N# Marca</th>
      <th>Nombre del producto</th>
      <th>Presentación producto</th>
	  <th>Tipo de producto</th>
	<th>Modificar</th>
	<th>Eliminar</th>	  
    </tr>
  </thead>
  <tbody>
  <form method="post" name="form1" action='ejecuta.php'>
  
  <?php
	  require_once("conexion.php");
	  $conn = new conexion();
	  $llamarMetodo = $conn->Conectar();
	  $sql = "SELECT * FROM producto";
	  $stmt = $llamarMetodo->prepare($sql);
	  $stmt ->execute();
		
	  while ($fila = $stmt->fetch()){
      ?> 
 	<tr>
      <td><input type="radio" name="Caja[<?php echo "$fila[0]" ?>]" value="Caja[<?php echo "$fila[0]" ?>]"></td>
      <td ><?php echo "$fila[0]"; ?></td>
	  <td ><?php echo "$fila[1]"; ?></td>
      <td><?php echo "$fila[2]"; ?></td>
	  <td><?php echo "$fila[3]"; ?></td>
	  <td><?php echo "$fila[4]"; ?></td>
	   <td><center><input type='radio' name='radio' value='mod'/></center></td>
	   <td><center><input type='radio' name='radio' value='elim'/></center></td></tr>  
       </tr>
  
	  <?php } ?>
	  
   </form>
  </tbody>

</table>
  <p>
    
  </p>
  <input type='submit' value='Ejecuta'></form>
  <div class="col-md-4"><a href="javascript:visualizar(document.forms['form1']);">Volver</a></div>

</body>
</html>
