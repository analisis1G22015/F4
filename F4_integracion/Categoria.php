<html>
	<head>
		<title>Carga de Categoria</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar_admin.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Carga de categoria</h2>

		<form role="form" name="Categoria" action="php/Categoria.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="nombre">Nombre de Categoria</label>
		    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoria">
		  </div>
		  <div class="form-group">
		    <label for="imagen">Imagen</label>
			<input type="file" class="form-control" id="imagen" name="imagen" >		    
		  </div>

		  <button type="submit" class="btn btn-default">Cargar</button>
		</form>
</div>
</div>
</div>
		<script src="js/valida_categoria.js"></script>
	</body>
</html>