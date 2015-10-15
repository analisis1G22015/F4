<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) && isset($_POST["cantidad"])&& isset($_POST["empresa"])&& isset($_POST["categoria"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["imagen"])){
		if($_POST["nombre"]!=""&& $_POST["cantidad"]!="" &&$_POST["empresa"]!="" &&$_POST["categoria"]!=""&&$_POST["descripcion"]!=""&&$_POST["precio"]!="" && $_POST["imagen"]!=""){
			include "conexion.php";
			
			$sql = "INSERT INTO articulo (EMPRESA, CANTIDAD, DESCRIPCION, IMAGEN, PRECIO, NOMBRE) VALUES (\"$_POST[empresa]\", \"$_POST[cantidad]\", \"$_POST[descripcion]\", \"$_POST[imagen]\", \"$_POST[precio]\", \"$_POST[nombre]\");";
			$query = $con->query($sql);
			
			
			$sql2= "select articulo from articulo where empresa=$_POST[empresa] and cantidad=$_POST[cantidad] and descripcion=\"$_POST[descripcion]\" and imagen=\"$_POST[imagen]\" and precio=$_POST[precio] and nombre=\"$_POST[nombre]\";";
			$query = $con->query($sql2);
			$articulo = "";
			while ($r=$query->fetch_array()) {
				$articulo = $r["articulo"];
				break;
			}
			
			
			$sql1 = "INSERT INTO categoria_articulo (CATEGORIA, ARTICULO) VALUES (\"$_POST[categoria]\", \"$articulo\");";
			$query = $con->query($sql1);
			
			
			if($query!=null){
				print "<script>alert(\"El producto fue ingresado correctamente\");window.location='../index.php';</script>";
			}
		}
	}
}



?>