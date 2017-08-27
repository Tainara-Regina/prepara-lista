<?php
Class Status{
    
     public function index(){
         echo "<h3><img src='app/viewers/img/kiss.png'> Not Found 404!</h3>";
        
    }
    public function arquivoIrregular(){
        //TESTE
        //render("arquivoIrregular");
        echo "ronaldo";
         echo $_POST["nomeBreveCurso"];
        echo $_POST["senhaInicial"];
        echo $_POST["arquivoFile"];
        
    }
   
    
    public function arquivoComCampoFaltando(){
        //chama a viwer passada como parametro
        render("arquivoComCampoFaltando","");
    }
    
    public function arquivoFinal(){
        //chama a viwer passada como parametro
        render("arquivoFinal","");
    }
    
    
     
    public function preenchaTodosOsCampos(){
        //chama a viwer passada como parametro
        render("preenchaTodosOsCampos","");
    }

     public function arquivoAceito(){
        //chama a viwer passada como parametro
        render("arquivoAceito","");
    }
    
    
    }