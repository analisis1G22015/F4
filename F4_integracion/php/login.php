<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			if($_POST["username"]=="admin" && $_POST["password"]=="123"){
				
				$user_id = null;
				$user_id = "admin";
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../home_admin.php';</script>";
								
			}
			else{
				
				$user_id=null;
				$sql1= "select * from cliente where usuario=\"$_POST[username]\" and password=\"$_POST[password]\" ";
				$query = $con->query($sql1);
				while ($r=$query->fetch_array()) {
					$user_id=$r["USUARIO"];
					break;
				}
				if($user_id==null){
					print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
				}else{
					session_start();
					$_SESSION["user_id"]=$user_id;
					print "<script>window.location='../home.php';</script>";				
				}				
			}				
		}
	}
}



?>