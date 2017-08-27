<?php
 
 $data = date('d.m.Y');
       
 
        $FILENAME = 'Lista'.$data.'.txt';
        $FILEPATH = "app/depositoListas/{$FILENAME}";
 
        header("Content-Type: application/txt");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename={$FILENAME}");
       
         readfile($FILEPATH);
        
 