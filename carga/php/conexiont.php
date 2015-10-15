<?php
include("conexion.php");
class Conect extends PHPUnit_framework_TestCase{

	public $host;
	public $user;
	public $password;
	public $bdd;
	public function setUp(){
		$this->host = "localhost";
		$this->user = "julio";
		$this->password="julio123";
		$this->bdd="ayd";
	}

	public function testName(){
		$this->assertTrue("localhost" == $this->host);
		$this->assertTrue("julio" == $this->user);
		$this->assertTrue("julio123" == $this->password);
		$this->assertTrue("ayd" == $this->bdd);
	}
}
?>
