<?php
$nombre = $_POST['nombre'];

$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$para = 'hildaeunicer@gmail.com';
$titulo = 'ASUNTO DEL MENSAJE';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

if ($_POST['submit']) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Gracias por su mensaje');

</script>";
} else {
echo 'Falló el envio';
}
}
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>Contacto - Game World</title>
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


<style type="text/css">
label {
display:block;
margin-top:20px;
letter-spacing:1px;
}
.formulario {

}
form {
margin:0 auto;
width:400px;
}

input, textarea {
width:380px;
height:27px;
background:#666666;
border:2px solid #f6f6f6;
padding:10px;
margin-top:5px;
font-size:20px;
color:#ffffff;
}

textarea {
height:150px;
}


</style>



<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, .link1 span, .link1');
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

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
								<h3> <b>Formulario de </b> <span>Contacto</span></h3>
				<div>
									<form action="formulario.php" method="post">
<label for="nombre">Nombre:</label>
<input id="nombre" type="text" name="nombre" placeholder="Nombre y Apellido" required="" />
<label for="email">Email:</label>
<input id="email" type="email" name="email" placeholder="ejemplo@correo.com" required="" />
<label for="mensaje">Mensaje:</label>
<textarea id="mensaje" name="mensaje" placeholder="Mensaje" required=""></textarea>
<input style="width:85px;
height:40px;
border-radius: 28px;
margin-top:20px;
cursor:pointer;" id="submit" type="submit" name="submit" value="Enviar" />
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