<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"])){
		if($_POST["username"]!=""&& $_POST["nombre"]!="" &&$_POST["apellido"]!="" &&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"]){
			include "conexion.php";
			
			$found=false;
			$sql1= "select * from cliente where usuario=\"$_POST[username]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}
			$sql = "insert into cliente(email,apellidos,usuario,password,nombre) value (\"$_POST[email]\",\"$_POST[apellido]\",\"$_POST[username]\",\"$_POST[password]\",\"$_POST[nombre]\");";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";
			}
		}
	}
}



?>