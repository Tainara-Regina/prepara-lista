<?php
//Este Model faz a validação,verifica se o arquivo é XML ou não
//Verifica se o arquivo possui todas as celulas preenchidas,caso não tenha o arquivo não é aceito
//Se possuir campos a mais na tabela, tb não é aceito
// Caso o arquivo esteja totalmente prechido a lista é aceita e passada para o model ModelFormat
//que faz a 
 //include_once "../Controller/ControllerFormat.php";

 class ModelValidate {
     private static $simpleXml;
     private static $allNumRow = 0; // numero de linhas que o arquivo possui
     private static $firstNumCell = 0;// armazena a quantidade de celulas da primeira linha 
     private static $numCellWithValue = 0;
     private static $numCellOverFlow = 0;
     private static $numRowsAccepted = 0;
     
     
   public function ModelLoad($fileXml) {
        /*Carrega o arquivo recebido pelo input file e manda para static $simpleXml*/
       $xml = new DOMDocument();
       $xml->load($fileXml);
 
       
       
      
        self::$simpleXml=$xml;
        $count= new ModelValidate();
        //Chama os metodo que realizam a contagem de linhas e de celulas 
        $count->ModelCountRow(self::$simpleXml);
        $count->ModelCountCell(self::$simpleXml);
        return $count->ModelValidation(self::$simpleXml);
    }
      //Conta a quantidade de linhas existentes(incluindo as que contem celulas vazias)
      private function ModelCountRow($xmlReadToCountRow){
        $rows = $xmlReadToCountRow->getElementsByTagName('Row');
        foreach ($rows as $nums){
      //Atribui a quantidade de linha que o arquivo possui em $numRow  
        self::$allNumRow++; 
             }
           //  echo ' // numero de Rows '.self::$allNumRow.' // ';
         }
  
    //Conta quantas celulas existem na primeira linha 
    private function ModelCountCell($xmlReadToCountCell){
      $row = $xmlReadToCountCell->getElementsByTagName('Row')->item(0);                      
      $cells = $row->getElementsByTagName('Cell');
      foreach ($cells as $cell){      
//echo $cell->nodeValue;
if($cell->nodeValue){
     //Atribui a quantidade de celulas que a linha indicada do arquivo possui em $numCell
self::$firstNumCell++;
}
  
      }
   //  echo ' //Numero de Cells '.self::$firstNumCell.' // ';
      }
    
//Etapa em que as celulas são validadas    

 private function ModelValidation($xmlReadToValidation){
    self::$firstNumCell;
    self::$numCellWithValue;
    $rows=$xmlReadToValidation->getElementsByTagName('Row');
    foreach ($rows as $row){
        $cells = $row->getElementsByTagName('Cell');
        foreach ($cells as $cell){
         //se a celula possuir valor,soma mais 1 para$numCellWithValue que é a quantidade de celulas que possuem valor   
            if($cell->nodeValue){
                self::$numCellWithValue++;
            }
            //ao sair deste foreach,verifica se as celulas da linha que possuem valor são
            // iguais ou maior do que o numero de celulas necessarias,se sim ele aceita
            //ou se a linha possui celulas vazias,ele aceita
            //se a linha possuir campos a mais ela tambem não é aceita
        }
    if(self::$numCellWithValue===self::$firstNumCell || self::$numCellWithValue == 0){
         //echo ' ||| numero de cheios  '.self::$numCellWithValue;
       // echo '  Linha Aceita |||';
        //conta o numero de linhas que foram consideradas aceitas
        self::$numRowsAccepted++;
       self::$numCellWithValue=0;
    }
    
    elseif(self::$numCellWithValue>self::$firstNumCell){
      //  echo '   A linha contem mais valores do que deveria '.self::$numCellWithValue.' não aceita ||||  ';
        self::$numCellWithValue=0;
        self::$numCellOverFlow++;
        }    
    else{
     //   echo ' ||| numero de cheios '.self::$numCellWithValue;
        // echo '    Sua lista contem campos obrigatorios vazios,não sera possivel prepara-la ||||  ';
        self::$numCellWithValue=0;
    }
        //checagem aki???
        
        } 
   //  echo '    numero de vazios  '.self::$numCellWithValue; 
   //  echo '    numero de Row Total aceitas  '.self::$numRowsAccepted; 
     
     //Se a quantidade de 
   
     if(self::$numRowsAccepted===self::$allNumRow){
    //posso informar ao usuario que a lista foi aceita
    //e em qual etapa a lista se encontra
    
   // echo '!!!!!!!! PARABENS!SE CHEGOU ATÉ AKI É POR QUE SUA LISTA NÃO CONTEM CAMPOS VAZIOS,FOI ACEITA E SERA PREPARADA !!!!!!';
  //  echo ' sua lista sera direcionada para a formatação';
    //CASO A LISTA SEJA ACEITA,O VALOR SERA RETORNADO PARA O CONTROLLERVALIDATE QUE VAI CHAMAR O CONTROLLERTABLE
   
    return array('numRowsAccepted'=>self::$numRowsAccepted,'firstNumCell'=>self::$firstNumCell,self::$simpleXml);
    //return self::$simpleXml;// array();
}else{
    $vazia=self::$allNumRow-self::$numRowsAccepted;
  //  echo"!!! DESCULPE,MAIS SUA LISTA CONTEM $vazia CAMPOS FORA DO PADRAO E NÃO PODE SER PREPARADA,REVISE A LISTA E ENVIE NOVAMENTE !!!!";
    return $vazia;
}
       
  
    }
  
    
      }