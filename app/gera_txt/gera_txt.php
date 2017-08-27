<?php
class gera_txt{
    
    function gera($text,$name){
        // Definimos o nome do arquivo que será exportado
                  
$file = fopen($name, 'w');
fwrite($file, $text);
fclose($file);
    }
    
 }


