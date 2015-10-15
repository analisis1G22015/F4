<html>
	<head>
		<title>Carga de Productos</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Carga de Productos</h2>

		<form role="form" name="login" action="php/Productos.php" method="post">
		  <div class="form-group">
		    <label for="nombre">Nombre del Producto</label>
		    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto">
		  </div>
		  <div class="form-group">
		    <label for="Cantidad">Cantidad</label>
		    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
		  </div>
		  <div class="form-group">
		    <label for="empresa">Empresa</label>
		    
			<SELECT value= "empresa" class="form-control" id="empresa" name="empresa">
			<?php
			include "php/conexion.php";
			$sql1= "SELECT empresa, nombre FROM empresa;";
			$query = $con->query($sql1);
			while($row = $query->fetch_array())
			{
			echo'<OPTION VALUE="'.$row['empresa'].'">'.$row['nombre'].'</OPTION>';
			}
			
			?>
		    </SELECT>
			
		  </div>
		  <div class="form-group">
		    <label for="categoria">Categoria</label>
			
			<SELECT value= "categoria" class="form-control" id="categoria" name="categoria">
			<?php
			include "php/conexion.php";
			$sql1= "SELECT categoria, nombre FROM categoria;";
			$query = $con->query($sql1);
			while($row = $query->fetch_array())
			{
			echo'<OPTION VALUE="'.$row['categoria'].'">'.$row['nombre'].'</OPTION>';
			}
			
			?>
		    </SELECT>
			
		  </div>
		  <div class="form-group">
		    <label for="descripcion">Descripcion</label>
		    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
		  </div>
		  <div class="form-group">
		    <label for="precio">Precio</label>
		    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
		  </div>
		  <div class="form-group">
		    <label for="imagen">Imagen</label>
		    <input type="text" class="form-control" id="imagen" name="imagen" placeholder="imagen">
		  </div>

		  <button type="submit" class="btn btn-default">Cargar</button>
		</form>
</div>
</div>
</div>
		<script src="js/valida_productos.js"></script
	</body>
</html>