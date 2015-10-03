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
quitar_inventario($id)
A este metodo sólo va a llegar si  comprobar_inventario(id)= true
si id es 5
la cantidad del articulo 5 ahorita es 10 entonces después del metodo la cantidad debe ser 9 **VER BASE DE DATOS
*/

	function quitar_inventario($id){
		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="ARTICULO";
		//$con = @mysql_connect($host,$user,$pass);
		//mysql_select_db($db);
	//Resta uno a la cantidad 
		//$consulta = "SELECT cantidad FROM $tabla WHERE articulo=".$id.""; 
		//$resultado = mysql_query($consulta,$con) or die ( 'error' .mysql_errno());
		$db1=new db;
		$resultado=$db1->consulta($id);
		$Existencia=$resultado;		
		$Existencia = $Existencia-1;
		echo $resultado."-".$Existencia;
		//$consulta = "UPDATE $tabla SET cantidad='$Existencia' WHERE articulo=" .$id.""; //se resta uno de inventario	
		//$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
		echo "exito";
		return $Existencia;

	}
}
class compraTest extends PHPUnit_Framework_TestCase
{
	function test_quitar_item(){
		$compra=new compras;
		$db1=new db;
		$resultado=$db1->consulta(7);
		$this->assertEquals($resultado-1,$compra->quitar_inventario(7));
	}
}