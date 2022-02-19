<script type="text/javascript">
  function continuar(frm){
    frm.action="index3.php",frm.submit();
  }

</script>
<form id="form1" name="form1" method="post" action="">
  <p>
    <?php
	include("conexion.php");
		
		$nuevo = array_keys ($_POST['Caja']);

		foreach ($nuevo as $prod_nombre){
		$result= con("select * from producto where prod_nombre='$prod_nombre'");

		$arreglo=mysql_fetch_array($result);
		?>
		<table >
		<tr>
		 <td ><?php echo $arreglo[0]; ?></td>
		 <td><?php echo $arreglo[1]; ?></td>
		 <td><?php echo $arreglo[2]; ?></td>
		 <td><?php echo "$".$arreglo[5]; ?></td>	
		</tr>
		</table>
 <?php } ?>
 
</p>
  <p>
    <label>
    <input name="Caja" type="hidden" id="Caja" value="<?php echo $nombre; ?>" />
    </label>
</p>
</form>
<p><a href="index.php">volver ..</a></p>
<p><a href="javascript:continuar(document.forms['form1']);">continue</a></p>
