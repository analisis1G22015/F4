<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) && isset($_POST["cantidad"])&& isset($_POST["empresa"])&& isset($_POST["categoria"]) && isset($_POST["descripcion"]) && isset($_POST["precio"])){
		if($_POST["nombre"]!=""&& $_POST["cantidad"]!="" &&$_POST["empresa"]!="" &&$_POST["categoria"]!=""&&$_POST["descripcion"]!=""&&$_POST["precio"]!=""){
			include "conexion.php";
			
			
			$target_path = "../imagenes/";
			$target_path = $target_path . basename( $_FILES['imagen']['name']);
			if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) 
			{ 
				$miniatura_ancho_maximo = 100;
				$miniatura_alto_maximo = 100;
				$info_imagen = getimagesize($target_path);
				$imagen_ancho = $info_imagen[0];
				$imagen_alto = $info_imagen[1];
				$imagen_tipo = $info_imagen['mime'];
				$file = explode('.',basename($target_path));
				echo $file[0];
				$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
				switch ( $imagen_tipo ){
					case "image/jpg":
					case "image/jpeg":
						$imagen = imagecreatefromjpeg( $target_path );
						break;
					case "image/png":
						$imagen = imagecreatefrompng( $target_path );
						break;
					case "image/gif":
						$imagen = imagecreatefromgif( $target_path );
						break;
				}
				imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
				$target_path_t="../imagenes/".$file[0]."_thumb.jpg";
				imagejpeg( $lienzo, $target_path_t, 90 );
				
				$sql = "INSERT INTO articulo (EMPRESA, CANTIDAD, DESCRIPCION, IMAGEN, PRECIO, NOMBRE) VALUES (\"$_POST[empresa]\", \"$_POST[cantidad]\", \"$_POST[descripcion]\", \"$target_path\", \"$_POST[precio]\", \"$_POST[nombre]\");";
				$query = $con->query($sql);
				
				
				$sql2= "select articulo from articulo where empresa=$_POST[empresa] and cantidad=$_POST[cantidad] and descripcion=\"$_POST[descripcion]\" and imagen=\"$target_path\" and precio=$_POST[precio] and nombre=\"$_POST[nombre]\";";
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
}



?>