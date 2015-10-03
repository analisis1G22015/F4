<?php
session_start();
class LoginTEst extends PHPUnit_framework_TestCase{

	public $valar;
	//public $valor;
	public $temporal_nombre="francisco";
	public $temporal_apellido="francisco";
	public $temporal_mail="francisco";	
	public function setUp(){
		$_SESSION["nombre"]="hola";
		$_SESSION["apellido"]="hola";
		$_SESSION["email"]="hola";
		$this->valar="francisco";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://localhost/pruebas/lyr/php/registro.php");
		curl_setopt($ch, CURLOPT_POSTFIELDS,"test=1&nombre=".$this->temporal_nombre."&apellido=".$this->temporal_apellido."&email=".$this->temporal_mail);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		$server_output=curl_exec($ch);
		curl_close($ch);
	}

	public function testlogin(){
		$this->valor = $_SESSION["nombre"];		
		$this->assertTrue("francisco" == $this->valar);
		$this->valor = $_SESSION["apellido"];		
		$this->assertTrue("francisco" == $this->valar);
		$this->valor = $_SESSION["email"];		
		$this->assertTrue("francisco" == $this->valar);
	}
}
?>
