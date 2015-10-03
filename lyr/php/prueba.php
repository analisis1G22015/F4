<?php
session_start();
class LoginTEst extends PHPUnit_framework_TestCase{

	public $valar;
	//public $valor;
	public $temporal_u="francisco";
	public $temporal_p="francisco";
	public function setUp(){
		$_SESSION["usuario"]="hola";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://localhost/pruebas/lyr/php/login.php");
		curl_setopt($ch, CURLOPT_POSTFIELDS,"test=1&usuario=".$this->temporal_u."&password=".$this->temporal_p);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		$server_output=curl_exec($ch);
		curl_close($ch);
		$this->valar="francisco";
	}

	public function testlogin(){
		$this->valor = $_SESSION["usuario"];		
		$this->assertTrue("francisco" == $this->valar);
	}
}


?>
