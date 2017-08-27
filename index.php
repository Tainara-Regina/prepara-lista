<?php
//da require nas paginas que contem somente require das paginas utilizadas na aplicação
require_once 'app/start.php';

//cria objeto da classe que trata os parametros passados pela url
$app = new App();