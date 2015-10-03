<?php
class db{
	function consulta($id){
		if($id===1||$id===2||$id===3||$id===4) return 0;
		else return 5;
	}
}
class compras{
	var $banco;
	var $carrito10;
	var $usuario;
	function compras(){
		//$banco=new banco;
		if (isset($_SESSION["ocarrito"])){
			$carrito10=$_SESSION["ocarrito"];
		}
		if (isset($_SESSION["usuario"])){
			//$carrito1=$_SESSION["usuario"];
		}
	}
	
/*
METODO PARA PROBAR 
comprobar_inventario(id)
Si el id es del 1-4 (NO HAY EN EXISTENCIA)
debe retornar false
Si el id es de 5-10 (SI HAY EXISTENCIA) **VER BASE DE DATOS
debe retornar true
*/	
	
	function comprobar_inventario($id){
		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="ARTICULO";		
		/*$con = @mysql_connect($host,$user,$pass);
		return true;
		mysql_select_db($db);
	//Consulta el inventario
		$consulta = "SELECT cantidad FROM $tabla WHERE articulo=".$id.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error' .mysql_errno());
		$Existencia=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['cantidad'];
			$Existencia =$row['cantidad'];
			break;

		}*/
		$db1=new db;
		$Existencia=$db1->consulta($id);	
		if($Existencia>=1){
			return true;
		}
		return false;
	}
}
class compraTest extends PHPUnit_Framework_TestCase
{
	function test_comprobar_inventario(){
		$compra=new compras;
		$this->assertEquals(true,$compra->comprobar_inventario(7));
//		$this->assertEquals(true,true);
	}
}