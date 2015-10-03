<?php
session_start();
if(isset($_GET["test"]))
{
	$user=$_GET["usuario"];
	$pass=$_GET["password"];
	$_SESSION["usr"]=$user;
	$_SESSION["pas"]=$pass;
	echo $user.$pass;
}
else
{
	if(!empty($_POST)){
		if(isset($_POST["username"]) &&isset($_POST["password"])){
			if($_POST["username"]!=""&&$_POST["password"]!=""){
				include "conexion.php";
			
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
