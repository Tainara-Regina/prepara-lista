<?php

//ESTA CLASSE COLOCA CADA DADO EM SUA DETERMINADA ARRAY (CPF,NOME,SOBRENOME,ETC.) 
//ALEM DE FORLATAR OS DASOS COM INSERIR O 0 A ESQUERDA NO CPF E COLOCAR EM LETRA MAIUSCULA A INICIAL DE CADA NOME
 class ModelFormat{
     
    private static $numRowsAccepted;
    private static $firstNumCell;
    private static $simpleXml;
    private static $tableFisrtNameAndLastName = array();
       private static $arrayFormatedCPF = array(); 
       private static $arrayFormatedEmail = array();
       private static $arrayNomeAndSobrenome = array();
       private static $arrayNome = array();
       private static $arraySobrenome = array();
    
    
     
    public function inicia($arrayReturned,$fileXml) {
        self::$numRowsAccepted=$arrayReturned['numRowsAccepted'];
        self::$firstNumCell=$arrayReturned['firstNumCell'];
        self::$simpleXml= new DOMDocument();
        self::$simpleXml->load($fileXml);
   
      
       // echo '!!!! sua lista esta na etapa de tratamento,aguarde por favor  !!!!';
     
        $modelFormat = new ModelFormat();
        
       $modelFormat->listarEmail(self::$simpleXml);
       $modelFormat->listarCPF(self::$simpleXml);
       $modelFormat->listarNomeEsobrenome(self::$simpleXml);
       $modelFormat->explodeNomeSobrenome(self::$arrayNomeAndSobrenome);
    //RETORNA TODOS OS ARRAYS FOTMATADOS PARA O CONTROLLER FORMAT QUE CHAmaRA A ETAPA SEGUINTE DE TRATAMETO
       return array(self::$arrayNome,self::$arraySobrenome,self::$arrayFormatedCPF,self::$arrayFormatedEmail);
    }
                 
   //--------------------------------------------------------------------------------------======      
        // ESTA OK
     function listarCPF($simpleXml){
        
     for($j=0;$j<self::$firstNumCell;$j++){    
     for($i=0;$i<self::$numRowsAccepted;$i++){
        $row = $simpleXml->getElementsByTagName('Row')->item($i);   
         $cells = $row->getElementsByTagName('Cell')->item($j);
         //Elimina o erro por conter cell vazia 
         error_reporting(0);
          //verifica o proximo valor 
         
          $nodeValue = $cells->nodeValue;
          if( preg_match( '/[0-9]/' , $nodeValue ) && !strripos($nodeValue,"@")){
           
              $nodeValue = preg_replace("/[^0-9]/", "", $nodeValue);
              
               if(strlen($nodeValue)<11){
                  // echo "menor que 11";
                    
                    $nodeValue= trim($nodeValue);
                   array_push(self::$arrayFormatedCPF,str_pad($nodeValue, 11, '0', STR_PAD_LEFT));
                      
               }else{
                    $nodeValue= trim($nodeValue);
                  array_push(self::$arrayFormatedCPF,$nodeValue);                  
               }
          // echo $nodeValue;
           }
    
    }
     }  
              
        // var_dump(self::$arrayFormatedCPF);
    }
    
    //-------------------------------------------------------------------------------------------------        
     //ESTA OK
        function listarEmail($simpleXml){
        
        for($j=0;$j<self::$firstNumCell;$j++){    
     for($i=0;$i<self::$numRowsAccepted;$i++){
        $row = $simpleXml->getElementsByTagName('Row')->item($i);   
         $cells = $row->getElementsByTagName('Cell')->item($j);
         //Elimina o erro por conter cell vazia 
         error_reporting(0);
          //verifica o proximo valor 
         
          $nodeValue = $cells->nodeValue;
          if(is_string($nodeValue) && strripos($nodeValue,"@")){
           
              $nodeValue= strtolower($nodeValue);
              $nodeValue= trim($nodeValue);
              array_push(self::$arrayFormatedEmail,$nodeValue);
          
           }
    }
     }  
              
       //  var_dump(self::$arrayFormatedEmail);
        
        }
      
        
 //--------------------------------------------------------------------------------------------------       
 //ESTA TOTALMENTE OK!!
        
        function listarNomeEsobrenome($simpleXml){
        
        for($j=0;$j<self::$firstNumCell;$j++){    
     for($i=0;$i<self::$numRowsAccepted;$i++){
        $row = $simpleXml->getElementsByTagName('Row')->item($i);   
         $cells = $row->getElementsByTagName('Cell')->item($j);
         //Elimina o erro por conter cell vazia 
         error_reporting(0);
          //verifica o proximo valor 
         
          $nodeValue = $cells->nodeValue;
                  
          //SE NÃO CONTER ALGARISMOS DE 0-9 E NÃO ENCONTRAR UMA POSIÇÃO NA STRING DE VALOR @
          if(!preg_match( '/[0-9]/' , $nodeValue ) && !strripos($nodeValue,"@")){
            
          $filtro = strtoupper (preg_replace('/\s+/', '', $nodeValue));    
              
             if(!preg_match("/^NOME$/", $filtro) && !preg_match("/^CPF$/", $filtro) && !preg_match("/^EMAIL$/", $filtro)
                      && !preg_match("/^EMAILS/", $filtro) && !preg_match("/^NOMES$/", $filtro) && !stristr($filtro,"-")&& !empty($filtro)){
                   
                 //TRANSFORMA O INICIO DE CADA PALAVRA EM MAIUSCULO 
                 $nodeValue = ucwords(strtolower($nodeValue));
              
                //FILTRO PARA SUBISTITUIR DE,DA,DO,DOS,DAS MAIUSCULO POR MINUSCULO 
                $nodeValue = str_replace(" De "," de ",$nodeValue);
                $nodeValue = str_replace(" Da "," da ",$nodeValue);
                $nodeValue = str_replace(" Do "," do ",$nodeValue);
                $nodeValue = str_replace(" Dos "," dos ",$nodeValue);
                $nodeValue = str_replace(" Das "," das ",$nodeValue);
  
                
                $nodeValue = str_replace("Á","á",$nodeValue);
                $nodeValue = str_replace("À","à",$nodeValue);
                $nodeValue = str_replace("Ã","ã",$nodeValue);
                $nodeValue = str_replace("Â","â",$nodeValue);
                 
                $nodeValue = str_replace("É","é",$nodeValue);
                $nodeValue = str_replace("È","è",$nodeValue);
                $nodeValue = str_replace("Ê","ê",$nodeValue);
                
                $nodeValue = str_replace("Í","í",$nodeValue);
                $nodeValue = str_replace("Ì","ì",$nodeValue);
                
                $nodeValue = str_replace("Ó","ó",$nodeValue);
                $nodeValue = str_replace("Ò","ò",$nodeValue);
                $nodeValue = str_replace("Õ","õ",$nodeValue);
                $nodeValue = str_replace("Ô","ô",$nodeValue);
                
                $nodeValue = str_replace("Ú","ú",$nodeValue);
                $nodeValue = str_replace("Ù","ù",$nodeValue);
                $nodeValue = str_replace("Û","û",$nodeValue);
                
                //FORÇO PARA TRANSFORMA O INICIO DE CADA PALAVRA EM MAIUSCULO 
                 // $nodeValue = ucwords(strtolower($nodeValue));
                
                  $nodeValue= trim($nodeValue);
                 array_push(self::$arrayNomeAndSobrenome,$nodeValue);
              
                      }
        
           }
    }
     }  
        // var_dump(self::$arrayNomeAndSobrenome); 
        
        }
   
    //----------------------------------------------------------------------------------------------    
    //Esta ok
    //esta etapa separa o nome do sobrenome
        
        function explodeNomeSobrenome($arrayNomeSobrenome){
            $tamanhoArray = count($arrayNomeSobrenome);
            
            for($i=0;$i<$tamanhoArray;$i++){
                $nomeSeparadoArray = explode(' ',$arrayNomeSobrenome[$i],2);
                
               
                array_push(self::$arrayNome,trim($nomeSeparadoArray[0]));
               array_push(self::$arraySobrenome,trim($nomeSeparadoArray[1]));
                   
            }
           // var_dump(self::$arraySobrenome);
        
            
            }
        
         
        
            }
            

 //-------------------------------------------------------------------------------------------------------
