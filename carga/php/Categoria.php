<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST["nombre"]) && isset($_POST["imagen"])){
		if($_POST["nombre"]!=""&& $_POST["imagen"]!=""){
			$_SESSION["uno"]="Hola";
			echo "Adios";			
		}
	}
}



?>
