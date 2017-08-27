
      <?php

 $senhaInicial = $_POST["senhaInicial"];
 $nomeBreveCurso = $_POST["nomeBreveCurso"];
 $arquivoFile = $_FILES["arquivoFile"]['tmp_name'];
 
if(isset($_POST["nomeGrupo"]) ){
    $nomeGrupo = $_POST["nomeGrupo"];
 
     
 } else {
     $nomeGrupo = null;
 } 
 
 //verifica se o usuario pussui cadastro
 $buscaCadastro = new LogarUsuario;
$buscaCadastro->verificar_existencia_de_usuario("tay@tay.com",'123123');
 $buscaCadastro->usuario;

// preciso verificar se o usuario possui permissão

 print_r($buscaCadastro->usuario);
 exit();
 
 
 // faz a chamada do lado de fora para o metodo que inicia tudo
$inicio= new Formata();
$inicio->validate($arquivoFile,$senhaInicial,$nomeBreveCurso,$nomeGrupo); 



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