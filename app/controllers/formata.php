<?php
 session_start();
  $senhaInicial = $_POST["senhaInicial"];
 $nomeBreveCurso = $_POST["nomeBreveCurso"];
 $arquivoFile = $_FILES["arquivoFile"]['tmp_name'];
 

if(isset($_POST["nomeGrupo"]) ){
    $nomeGrupo = $_POST["nomeGrupo"];
      
 } else {
     $nomeGrupo = null;
 } 



 //isso foi só para fazer teste de conexão
 // e verifica se o usuario pussui cadastro
 

 // print_r($buscaCadastro->usuario);
 // exit();
 
//isso tambem foi só para fazer teste de conexão
 // if($buscaCadastro->usuario = false){
 //  render("arquivoRealizeLogin");
 //  exit();
 // }

// isso é para fazer:
// chamar aki metodo do controller de tratamento de acesso e permissao que verifica se o usuario
// esta logado(este verifica de existe session criada com os dados do usuario) 
//caso não esteja,p trocho a seguir precisa ser chamado:
 // render("arquivoRealizeLogin");
 //  exit();

 // faz a chamada do lado de fora para o metodo que inicia tudo
 // de tido estiver ok,é o primeiro passo da aplicação


if(isset($_SESSION['logado'])){

date_default_timezone_set('America/Sao_Paulo');

 $data = date("Y-m-d");
 $horario = date('H:i:s');

 $buscaCadastro = new RegistraInformacoesAcesso;
       $buscaCadastro->registra_acesso($_SESSION['logado'][0],$data,$horario);


$inicio= new Formata();
$inicio->validate($arquivoFile,$senhaInicial,$nomeBreveCurso,$nomeGrupo); 
}else{
  render("arquivoRealizeLogin");
}


Class Formata {
   public  $senhaInicial;
   public  $nomeBreveCurso;
   public  $arquivoFile;
   public  $nomeGrupo; 
    
   
    public function index(){
        //echo "<h3><img src='app/viewers/img/kiss.png'> Not Found 404!</h3>";
    }
      
   
   
  
        function validate($arquivoFile,$senhaInicial,$nomeBreveCurso,$nomeGrupo){
        
        $this->senhaInicial = $senhaInicial;
        $this->nomeBreveCurso = $nomeBreveCurso;
        $this->arquivoFile = $arquivoFile;
        //echo $this->nomeGrupo = $nomeGrupo;      
            
            libxml_use_internal_errors(true);
        if($arquivoFile){
            //simplexml_load_file faz a leitura só de arquivo xml
            if(simplexml_load_file($arquivoFile)){
          //    echo 'esta ok!O arquivo é XML';
              /*instancia objeto que recebe o arquivo XML e desencadeia
               * a instacia de varios objetos aninhados no Modelprepara 
               * que faz a verificação e prepara para formatação
               */
      $modelValidate = new ModelValidate();  
     $arrayReturned = $modelValidate->ModelLoad($arquivoFile);

      //caso a lista não seja aceita o valor retornado sera false
     
      if(is_int($arrayReturned)){
          render("arquivoComCampoFaltando",$arrayReturned);
         
          //Caso a lista não seja aceita,o valor retornado sera false
          //echo '  || A sua lista não foi aceita e o valor retornado pelo validate foi igual a false ||  ';
          // AKI PODE REDIRECIONAR PARA A VIWER INDEX
      }else{
           
     // var_dump($arrayReturned);
     // echo  '   |||   A lista esta sendo enviada para tratamento    |||  ';
          echo'<script> render();</script>';
      //render("arquivoAceito","");
     
      //O MODELFORMAT SEPARA OS DADOS PARA ARRAY E FORMATA(INICIO DE NOME MAIUSCULO,INCLUI 0 A ESQUERDA NO CPF,ETC.)
   $format = new ModelFormat($arrayReturned,$arquivoFile);
   $listaFormatada=$format->inicia($arrayReturned, $arquivoFile);
   
   $formatFinal = new ModelFormatFinal();
   $link=$formatFinal->inicia($listaFormatada,$nomeGrupo,$nomeBreveCurso,$senhaInicial);
   //echo $link;
   
   if($link=="lerolero"){
       echo'<script>setTimeout(renderFinal, 5000);</script>';
     // render("ArquivoFinal","");
       }
      }   
      
            }else{
                echo 'O arquivo não é do tipo XML;Certifique-se que inseriu o arquivo correto'; 
            }      
        }else{
            echo 'insira um arquivo!';   
}
        
}
    
    
   
    
    
}