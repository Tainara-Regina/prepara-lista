<?php

//INSERE A VLIRGULA NO FINAL DE CADA UM E OS CAMPOS INDENTIFICADORES
 class ModelFormatFinal{
 
     private static $arrayFormatedEmail = array();
     private static $arrayNome = array();
     private static $arraySobrenome = array();
     private static $arrayFormatedCPF = array(); 
     
     
     private static $arrayFormatedEmailVirgula = array();
     private static $arrayFormatedNomeVirgula = array();
     private static $arrayFormatedSobrenomeVirgula = array();
     private static $arrayFormatedCPFVirgula = array();
     private static $arrayFormatedSenhaVirgula = array();
     private static $arrayFormatedCursoVirgula = array();
     private static $arrayFormatedGrupoVirgula = array();
     private static $arrayFormatedCPFfieldVirgula = array();
     private static $tamanhoArray;
     private static $senha;
     private static $curso;
     private static $grupo;
             
     
     
    function inicia($arraysFormatado,$nomeGrupo,$nomeBreveCurso,$senhaInicial){
        
        self::$arrayNome = $arraysFormatado[0];
        self::$arraySobrenome = $arraysFormatado[1];
        self::$arrayFormatedCPF = $arraysFormatado[2];
        self::$arrayFormatedEmail =$arraysFormatado[3];
        self::$grupo = $nomeGrupo;
        self::$senha = $senhaInicial;
        self::$curso = $nomeBreveCurso;
        self::$tamanhoArray=count(self::$arrayNome);
       // echo "   ///////  ESTAMOS NO MODEL FORMAT FINAL ////////";
        
        $insere = new ModelFormatFinal();
       
        $insere->insereVirgulaCPF(self::$arrayFormatedCPF);
        $insere->insereVirgulaNome(self::$arrayNome);
        $insere->insereVirgulaSobrenome(self::$arraySobrenome);
        $insere->insereVirgulaEmail(self::$arrayFormatedEmail);
        $insere->insereVirgulaEsenha(self::$senha);
        $insere->insereVirgulaEcurso(self::$curso);
        $insere->insereVirgulaEgrupo(self::$grupo);
        $insere->insereVirgulaCPFfield(self::$arrayFormatedCPF);
        
        
        
      $insere->imprimeDownload();
      // $gera_txt = new gera_txt();
      // $gera_txt->gera(self::$arrayFormatedCPFVirgula,self::$arrayFormatedSenhaVirgula,self::$arrayFormatedNomeVirgula, 
        //        self::$arrayFormatedSobrenomeVirgula,self::$arrayFormatedCursoVirgula,self::$arrayFormatedEmailVirgula, 
        //      self::$arrayFormatedCPFfieldVirgula,self::$tamanhoArray);
        return "lerolero";
    } 
   
    
    function insereVirgulaNome($arrayNome){
        
        $tamanhoArray = count($arrayNome);
        
      //  echo$tamanhoArray;
        for($i=0;$i<$tamanhoArray;$i++){
            
            $arrayNome[$i] = $arrayNome[$i].",";
            
            self::$arrayFormatedNomeVirgula[$i]=$arrayNome[$i];
        }
        
        array_unshift(self::$arrayFormatedNomeVirgula,"firstname,");

        
      //  var_dump(self::$arrayFormatedNomeVirgula);
    }
    
    //-----------------------------------------------------------------------
 
    function insereVirgulaCPF($arrayCPF){
        $tamanhoArray = count($arrayCPF);
        
    //    echo$tamanhoArray;
        for($i=0;$i<$tamanhoArray;$i++){
            
            $arrayCPF[$i] = $arrayCPF[$i].",";
            
            self::$arrayFormatedCPFVirgula[$i]=$arrayCPF[$i];
        }
        
        array_unshift(self::$arrayFormatedCPFVirgula,"username,");

        
       // var_dump(self::$arrayFormatedCPFVirgula);        
    }
    
    //-----------------------------------------------------
        
 
    function insereVirgulaSobrenome($arraySobrenome){
        $tamanhoArray = count($arraySobrenome);
        
      //  echo$tamanhoArray;
        for($i=0;$i<$tamanhoArray;$i++){
            
            $arraySobrenome[$i] = $arraySobrenome[$i].",";
            
            self::$arrayFormatedSobrenomeVirgula[$i]=$arraySobrenome[$i];
        }
        
        array_unshift(self::$arrayFormatedSobrenomeVirgula,"lastname,");

        
      //  var_dump(self::$arrayFormatedSobrenomeVirgula);        
    }
    
    //-----------------------------------------------------
        
    
    
    function insereVirgulaEmail($arrayEmail){
        $tamanhoArray = count($arrayEmail);
        
      //  echo$tamanhoArray;
        for($i=0;$i<$tamanhoArray;$i++){
            
            $arrayEmail[$i] = $arrayEmail[$i].",";
            
            self::$arrayFormatedEmailVirgula[$i]=$arrayEmail[$i];
        }
        
        array_unshift(self::$arrayFormatedEmailVirgula,"email,");
        
      //  var_dump(self::$arrayFormatedEmailVirgula);        
    }
    
    //--------------------------------------------------------------
    function insereVirgulaEsenha($Senha){
        $tamanhoArray= self::$tamanhoArray;
        
        for($i=0;$i<$tamanhoArray;$i++){
            self::$arrayFormatedSenhaVirgula[$i] = $Senha.","; 
        }
      
     array_unshift(self::$arrayFormatedSenhaVirgula,"password,");
   //  var_dump(self::$arrayFormatedSenhaVirgula);
    }
   
    //--------------------------------------------------------------
    
    function insereVirgulaEcurso($curso){
        $tamanhoArray= self::$tamanhoArray;
        
        for($i=0;$i<$tamanhoArray;$i++){
            self::$arrayFormatedCursoVirgula[$i] = $curso.","; 
        }
      
     array_unshift(self::$arrayFormatedCursoVirgula,"course1,");
   //  var_dump(self::$arrayFormatedCursoVirgula);
    }
    
   //---------------------------------------------------------------- 
    
    function insereVirgulaEgrupo($grupo){
        $tamanhoArray= self::$tamanhoArray;
        
        for($i=0;$i<$tamanhoArray;$i++){
            self::$arrayFormatedGrupoVirgula[$i] = $grupo.",";
        }
      
     array_unshift(self::$arrayFormatedGrupoVirgula,"group1,");
   //  var_dump(self::$arrayFormatedGrupoVirgula);
    }
    
    //-----------------------------------------------------------------
    
    function insereVirgulaCPFfield($arrayCPF){
        $tamanhoArray = count($arrayCPF);
        
      //  echo$tamanhoArray;
        for($i=0;$i<$tamanhoArray;$i++){
            
            $arrayCPF[$i] = $arrayCPF[$i];
            
            self::$arrayFormatedCPFfieldVirgula[$i]=$arrayCPF[$i];
        }
        
        array_unshift(self::$arrayFormatedCPFfieldVirgula,"profile_field_CPF");

        
     //   var_dump(self::$arrayFormatedCPFfieldVirgula);        
    }
    
    //-----------------------------------------------------------------
    
    function imprimeDownload(){
       // Definimos o nome do arquivo que será exportado
        
        $data = date('d.m.Y');
       $name = 'app/depositoListas/Lista'.$data.'.txt';

       
     for($i=0;$i<=self::$tamanhoArray;$i++){
         
          $text .=self::$arrayFormatedCPFVirgula[$i];
          $text.= self::$arrayFormatedSenhaVirgula[$i];
          $text.= self::$arrayFormatedNomeVirgula[$i];
          $text.= self::$arrayFormatedSobrenomeVirgula[$i];
          $text.= self::$arrayFormatedCursoVirgula[$i];
          $text.= self::$arrayFormatedEmailVirgula[$i];
          if(self::$grupo != null){
          $text .= self::$arrayFormatedGrupoVirgula[$i];
          }
          $text.= self::$arrayFormatedCPFfieldVirgula[$i];
          
          $text .=  "\r\n"; 
           
     }
 
     
     $gera_txt = new gera_txt();
     $gera_txt->gera($text,$name);
     
 

        
         //echo "<li><a href=\"preparaLista1.0\download.php\">baixar</a></li>";
         
 //echo self::$tamanhoArray;
    }
    //------------------------------------------------------------------
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        }