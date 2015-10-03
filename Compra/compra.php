<?php
class banco{
	function comprobarydebitar_saldo_tarjeta($numero_tarjeta,$nombre_titular,$monto_necesario){
	//conexion a la base de datos

		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="TARJETA";
		$con = @mysql_connect($host,$user,$pass);
		mysql_select_db($db);
	//Consulta el monto del cliente
		$consulta = "SELECT monto_actual FROM $tabla WHERE cliente=" .$nombre_titular.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
		$Saldo=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['monto_actual'];
			$Saldo =$row['monto_actual'];
			break;

		}
		if($Saldo>=$monto_necesario){ //El saldo es suficiente entonces se debita
			$nuevoSaldo= $Saldo-$monto_necesario;
echo $nuevoSaldo;	
			$consulta = "UPDATE $tabla SET monto_actual='$nuevoSaldo' WHERE cliente=" .$nombre_titular.""; //se debita	
			$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
			echo "exito" ;	
			return true;
		}
		return false;
	}

//Llamada a la función
	function banco(){
		$this->comprobarydebitar_saldo_tarjeta(1,1,200);
	
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
	function efectuar_compra(){
		$banderaInventario=true;
		// if($banco->comprobar_saldo_tarjet($usuario->numero_tarjeta,$usuario->fecha_vencimiento,$usuario->codigo_seguridad,$usuario->nombre,$carrito->suma_total))
		// echo "<p>Si puede realizarse la compra</p>";
		// return true;
		$limite=$carrito10->num_productos;
		for($i=0;$i<$limite;$i++){//PRIMER CICLO COMPRUEBA INVENTARIO
			echo $i;
			$id = $carrito10->get_id_producto($i);
			$this->comprobar_inventario($id);
			if (!$existe){
				echo "No existe en inventario el producto: ", $carrito10->get_nombre_producto($i);
				$banderaInventario=false;
			} 
		}
		if(banderaInventario){
			for($i=0;$i<$limite;$i++){//SEGUNDO CICLO QUITA DE INVENTARIO
				echo $i;
				$id = $carrito10->get_id_producto($i);
				$this->quitar_inventario($id);
				$carrito10->elimina_producto($i);
				echo "hola.";
				$carrito10->num_productos--;
			}
		}
		$_SESSION["ocarrito"]=$carrito10;
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
		echo $id;
		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="ARTICULO";
		$con = @mysql_connect($host,$user,$pass);
		mysql_select_db($db);
	//Consulta el inventario
		$consulta = "SELECT cantidad FROM $tabla WHERE articulo=$id"; 
		echo $consulta."-";
		$resultado = mysql_query($consulta,$con) or die ( 'error' .mysql_errno());
		$Existencia=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['cantidad'];
			$Existencia =$row['cantidad'];
			break;

		}
		if($Existencia>=1){
			return true;
		}
		return false;
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
		$con = @mysql_connect($host,$user,$pass);
		mysql_select_db($db);
	//Resta uno a la cantidad 
		$consulta = "SELECT cantidad FROM $tabla WHERE articulo=".$id.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error' .mysql_errno());
		$Existencia=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['cantidad'];
			$Existencia =$row['cantidad'];
			break;

		}
		$Existencia = $Existencia-1;
		$consulta = "UPDATE $tabla SET cantidad='$Existencia' WHERE articulo=" .$id.""; //se resta uno de inventario	
		$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
		echo "exito";

	}

}

//inicio la sesión
/*session_start();
//si no esta creado el objeto carrito en la sesion, lo creo
if (!isset($_SESSION["ocarrito"])){
	$_SESSION["ocarrito"] = new carrito();
}*/


//$obj=new banco;
}
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>Compras - Game World</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Gill_Sans_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, .link1 span, .link1');
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php
if(isset($_POST['monto'])){
	$compra2 =  new compras;
	$id=$_POST['monto'];
	echo $id;
	$result = $compra2->comprobar_inventario($id);
	if($result==1)			
		echo "<script>alert('Hay existencias');</script>";
		//echo "<script>alert('Tiene saldo suficiente para la compra');</script>";
	else
		echo "<script>alert('No hay existencias');</script>";
}
if(isset($_POST['noitems'])){
	$numitem=$_POST['noitems'];
	if (!isset($_SESSION["ocarrito"]))
		$_SESSION["ocarrito"] = new carrito;		
	$compra = new compras;
	if (isset($_SESSION["ocarrito"])){
		$carrito1=$_SESSION["ocarrito"];
	}		
	for($i=0;$i<$numitem;$i++){
		$carrito1->introduce_producto($i,"producto".$i,5*$i);
	}		
	$anterior=$carrito1->num_productos;	
	echo "<div ><h1>'Productos insertados: ".$anterior."</h1>";	
	echo "<p>Comprando productos..</p>";	
	$compra->efectuar_compra();		
	$carrito1=$_SESSION["ocarrito"];	
	if($carrito1->num_productos==0)
		echo "<h1>Productos despues de compra: 0</h1>";	
	else
		echo "<h1>Productos despues de compra: ".$carrito1->num_productos."</h1>";	
}
?>
</head>
<body id="page1">
<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
<!-- HEADER -->
			<div id="header">
				<div class="row-1">
					<div class="fleft"><a href="index.html"> Game <span>World</span></a></div>
					<ul>
						<li><a href="../index.html"><img src="images/icon1-act.gif" alt="" /></a></li>
						<!--<li><a href="contact-us.php"><img src="images/icon2.gif" alt="" /></a></li> -->
						
					</ul>
				</div>
				<div class="row-2">
					<ul>
						<li><a href="../index.html" class="active">Inicio</a></li>
						<!--<li><a href="articles.php">Articulos</a></li>-->
						<!--<li><a href="contact-us.php">Contactanos</a></li> -->
					</ul>
				</div>
			</div>
<!-- CONTENT -->
			<div id="content"><div class="ic">More Website Templates at TemplateMonster.com!</div>
				<div id="slogan">
					<div class="image png"></div>
					<div class="inside">
						<h2>Game World<span>Fun forever!!! </span></h2>
						<p>Lo que quieras en nuestra web!!! Video juegos, musica y peliculas!!</p>
					</div>
				</div>
				<div class="box">
					<div class="border-right">
						<div class="border-left">
							<div class="inner">
								<h3>Bienvenido a <b>Game </b> <span>World</span></h3>
								<p>Version alpha</p>
								<div class="img-box1"><img src="images/1page-img1.jpg" alt="" />
									<h4>Prueba de existencias suficientes</h4>
									<form action="compra.php" method="post">
										<label>Ingrese un id</label></br><input type="text" id="monto" name="monto"/>&nbsp<input type="submit" id="b1" value="Comprobar existencia"/>
									</form>
								</div>
								<div class="img-box1"><img src="images/1page-img2.jpg" alt="" />
									<h4>Prueba Comprar todos los productos del carro</h4>
									<form action="compra.php" method="post">
										<label>Ingrese un Numero de Productos inicial</label></br><input type="text" id="noitems" name="noitems"/>&nbsp										
										<input type="submit" id="b2" value="Ingresar Productos"/>		
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- FOOTER -->
			<div id="footer">
				<div class="left">
					<div class="right">
						<div class="inside">Copyright &copy; All Rights Reserved.<br />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
