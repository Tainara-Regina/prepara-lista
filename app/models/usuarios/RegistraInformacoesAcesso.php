<?php
require_once  'app/DAO/DAO';
 class RegistraInformacoesAcesso extends DAO {

public $usuario;

function registra_acesso($email,$data,$horario){
  
try{
$query =self::$conn->prepare(
  "INSERT INTO acesso_sistema (email,data,horario) VALUES (:email,:data,:horario)");

   $query->bindValue(':email', $email);
   $query->bindValue(':data', $data);
   $query->bindValue(':horario', $horario);
   $query->execute();


   }catch (Exception $ex) {
               echo "Falha na inserção do relatorio de acesso. Erro->$ex";
                  }  
  

}
}


?>
