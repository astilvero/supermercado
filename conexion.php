<?php 
 // crear una clase
 class Conexion{

//atributos
    private $db = 'mysql:host=localhost;dbname=supermercados';
   	private $user = 'usuario';
 	private $pass = 'contraseña';

 	public function Conectar(){
 		try{
 $base = new PDO($this->db, $this->user, $this->pass);
 $base->exec("SET CARACTER SET UTF-8");

 if($base){

 	 
	  //echo 'conexion realizada';
	   return $base;
 	  	}
 }catch (Exception $e){
 	echo 'error de conexion'.$e->getMessage();
 }

} }
?>
