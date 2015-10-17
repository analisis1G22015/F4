<nav class="navbar navbar-default" role="navigation">
<div class="container">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><b>GAME WORLD</b></a>
  </div>

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="./Productos.php">Carga de Productos</a></li>
      <li><a href="./Categoria.php">Carga de Categoria</a></li>
    </ul>
	
	 <ul class="nav navbar-nav">
      <?php if(!isset($_SESSION["user_id"])):?>
      <li><a href="./Productos.php">Carga de Productos</a></li>
      <li><a href="./Categoria.php">Carga de Categoria</a></li>
    <?php else:?>
      <li><a href="./php/logout.php">SALIR</a></li>
    <?php endif;?>
    </ul>

  </div>
</div>
</nav>