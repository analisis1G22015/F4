<?php
session_start();
class PersonTEst extends PHPUnit_framework_TestCase{

	public $test;
	public function setUp(){
		$this->test = $_SESSION["uno"];
	}

	public function testName(){
		$this->assertTrue("Hola" == $this->test);
	}
}
?>
