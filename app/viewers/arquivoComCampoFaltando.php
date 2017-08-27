<!DOCTYPE html>
<html>
    <head>
        <title>Arquivo Irregular</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style> #status{
        background-color: #FFC4C4;    
}</style>
        
    </head>
    <body>
        <h3><img src="app/viewers/img/calm.png"> <?php if($param>1){ echo 'Desculpe mas este arquivo contêm ';}else 
            {echo 'Desculpe mas este arquivo contém ';}; ?> 
            <?php echo $param; if($param>1){ echo ' campos irreguares<br>(campos obrigatorios vazios ou campos a mais no arquivo). ';}else
                {echo ' campo irreguar<br>(campo obrigatorio vazio ou campo a mais no arquivo). ';}; ?> </h3>
       <h3>Faça uma verificação nos dados do arquivo e tente novamente. </h3>
    </body>
</html>
