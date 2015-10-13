<?php
class enviar_email{
	function mail($v1,$v2,$v3,$v4){
		return true;
	}
	function enviar_email(){		
		$nombre = 'uno';
		$email = 'a@a.c';
		$mensaje = 'mensaje';
		$para = 'hildaeunicer@gmail.com';
		$titulo = 'ASUNTO DEL MENSAJE';
		$header = 'From: ' . $email;
		$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

		
			if ($this->mail($para, $titulo, $msjCorreo, $header)) {
				return true;
			} else {
				return false;
			}
		
	}	
}
class formularioTest extends PHPUnit_Framework_TestCase
{		
	function test_productos_en_carrito(){					
        $envia=new enviar_email;

		$this->assertEquals(false,$envia->enviar_email("","","",""));
	}
}