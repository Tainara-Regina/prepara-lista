<?php
session_start();

Class logar_base{
 
  public function validar_login($email,$senha){
         $buscaCadastro = new LogarUsuario;
       $buscaCadastro->verificar_existencia_de_usuario($email,$senha);
	 
	 if($buscaCadastro->usuario != false ){
	 		 $_SESSION['logado'][0] = $email;
echo strip_tags("true");

	  }else{
echo strip_tags("false");
	  	  
	  }
     }

}

?>