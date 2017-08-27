<?php
function render($viewer,$param){
    
    if (file_exists('app/viewers/'.$viewer.'.php')){
        
       include_once 'app/viewers/'.$viewer.'.php';
    } else {
    
        echo '<h3>A viewer solicitada não foi encontrada!</h3>';
        echo '<h3> 404,Viewer not found!</h3>';
    }
}