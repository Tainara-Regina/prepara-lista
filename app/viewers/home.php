<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Prepara Lista</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="app/JavaScript/validação_dos_campos.js" type="text/javascript"></script>
  <link href="app/css/home.css" rel="stylesheet" type="text/css"/>
  <link href="app/css/login_modal.css" rel="stylesheet" type="text/css"/>
  
  <script> 
      
  //passa os input para o endereço indicado nesta função 
      function passaParam(){
  var arquivoFile1 = $('#arquivoFile')[0].files[0]; 
  var nomeBreveCurso1 = $('#nomeBreveCurso').val();
  var senhaInicial1 = $('#senhaInicial').val();
 
            if(document.getElementById("nomeGrupo").value !== ""){
            var nomeGrupo1 = $('#nomeGrupo').val();    
            }
            
form = new FormData();
form.append('arquivoFile', arquivoFile1);
form.append('nomeBreveCurso', nomeBreveCurso1);
form.append('senhaInicial', senhaInicial1);

    if(document.getElementById("nomeGrupo").value !== ""){
       form.append('nomeGrupo', nomeGrupo1);    
         }

$.ajax({
    url: 'formata',
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
    success:function(response) {
     $("#status").html(response);
    }
});
} 




   //verifica se todos os input foram preenchidos
     // caso não,chama uma função ajax que carrega a div status 
     // com uma mensagem para preencher os campos
  function carregaStatus(){
  var arquivoFile = document.getElementById("arquivoFile").value; 
  var nomeBreveCurso = $('#nomeBreveCurso').val();
  var senhaInicial = $('#senhaInicial').val();
 
    if(document.getElementById("nomeGrupo").value !== ""){
       var nomeGrupo = $('#nomeGrupo').val();    
            }          
      if(arquivoFile !== "" && nomeBreveCurso !== "" && senhaInicial !== ""){
   
            //este ajax oculto não esta passando o input file     
 /*                  
  $.ajax({
   method: "post",
  url: 'formata/arquivoIrregular',
  enctype: "multipart/form-data",
  
  data: { 'nomeBreveCurso': nomeBreveCurso, 'senhaInicial': senhaInicial, 'arquivoFile':arquivoFile, 'nomeGrupo': nomeGrupo},
  success: function(data) {
      $("#status").html(data);
  }
});
*/
 passaParam();

//se os campos não forem todos preenchidos
   }else{
        $.ajax({
  url: 'status/preenchaTodosOsCampos',
  success: function(data) {
      $("#status").html(data);
  }
});
       
   }
             
          }
 

  </script>
  
</head>
    <body>


        <div class="col-sm-12 menu_fixed">
        <p id="myBtn">Login</p> 
            <div class="menu ">
            <ul>
                <a href="#vamos_começar"><li>Formatar Lista</li></a>
                <a href="#instrucoes"><li>Instruções</li></a>
                <a><li>Sobre</li></a>
               <a> <li>Contato</li></a>
            </ul>
          </div>        
            <div class="versao_beta"><p>Formata Lista versão BETA</p> </div>
        
        </div>
        
        <div class="div_para_rodape">
        
        <div name="instrucoes" id="instrucoes" class="container">
          
            <div class="col-sm-12 instrucoes_conteiner">
            
            <div class="col-sm-12">
    
      <h1 class="text-center margin">Bem vindo!</h1>
      <p> Aqui é possível realizar a formatação dos dados da lista de alunos automaticamente para um 
          tipo reconhecido pela plataforma Moodle. Este site é o produto final do Trabalho
          de Conclusão de Curso realizado por Tainara Regina para a obtenção do grau de 
          Bacharel em Ciência da Computação.</p>
    </div>
            
                <div  class="col-sm-12 instrucoes margin">
      <h3>Instruções de uso:</h3>
 <p>- Para iniciar, você precisa criar um arquivo no Excel contendo
     somente os seguintes dados em cada coluna: <b> nome,email,CPF.</b>
Não pode faltar nenhum dado na sua lista,caso falte ela sera recusada.
</p>

<p>- A lista deve ser salva no formato Planilha XML 2003 para que
seja reconhecida. Exemplo de lista: </p>
    </div>
    
       <div class="col-sm-12 ">
        <img class="img-responsive center-block" src="app/viewers/img/listaImg.png" alt=""/>
        </div>
            
            <div class="col-sm-12 instrucoes">
                <p> Salve a lista criada com o tipo <b>Planilha XML 2003.</b> Exemplo:</p>
            </div>
            
           <div class="col-sm-12 ">
        <img class="img-responsive center-block" src="app/viewers/img/listaImgXML.png" alt=""/>
        </div>  
        
             <div class="col-sm-12  instrucoes">
                <p> Agora sua lista está pronta para ser utilizada na aplicação(Formata Lista versão BETA).</p>
            </div>
                    
                    <div  class="col-sm-12 instrucoes margin">
           <h3>Ao carregar a lista de usuário:</h3>
        <p>- No campo <b>Delimitador CSV </b>escolha a "virgula" como opção.</p>
        <p>- No campo <b>Codificação </b> escolha a opção "UTF-8".</p>
        <p>- O campo <b>Linha de pré-visualização</b> fica a seu critério.</p>
                  </div>
                
    <div class="col-sm-12 ">
        <img class="img-responsive center-block" src="app/viewers/img/configCarregarLista.png" alt=""/>
        </div>          
           </div>
     
              <?php
              include "login_modal/login_modal.html";
              ?>

            <div name="vamos_começar" id="vamos_começar" class="col-sm-12 vamos_começar">
    
      <h1 class="text-center"> <img src="app/viewers/img/light-bulb (1).png" alt=""/>Vamos começar!</h1>
                 
            
            
      <form name="form" id="form" action="status/arquivoIrregular" method="post" enctype="multipart/form-data">
  <div class="form-group margin">
    <label for="exampleInputEmail1">Nome breve do curso</label>
    <input type="text" class="form-control" name="nomeBreveCurso" id="nomeBreveCurso" placeholder="Insira o nome breve do Curso" required>
  </div>
  <div class="form-group">
    <label for="senhaInicial">Senha inicial</label>
    <input type="text" class="form-control"  name="senhaInicial" id="senhaInicial" value="sms" placeholder="Insira a senha inicial (geralmente sms)" required>
  </div>
                
              
                <label>Utiliza grupo?</label>
            <div class="form-inline">
    <label class="radio-inline">
        <input type="radio" name="radioGrupo" id="radioSim" value="sim" onclick="validaCampos()"> Sim
</label>
<label class="radio-inline">
    <input type="radio" name="radioGrupo" id="radioNao" value="nao" onclick="validaCampos()"checked> Não
</label>

 
    <label>Grupo</label>
    <input type="text" class="form-control" name="nomeGrupo" id="nomeGrupo" placeholder="Insira o nome do grupo" disabled>
 <p class="help-block">Selecione sim ou não para indicar se utiliza grupo.</p>
    <br>
            </div>    
                
                
                
                
                
  <div class="form-group">
      <label for="exampleInputFile">Lista de aluno em XML</label>
      <input type="file" name="arquivoFile" id="arquivoFile"   accept=".xml" required>
    
  </div>
  
              
                <button type="reset" id="gerarLista" class="btn btn-primary center-block" onclick="carregaStatus()" ><h4>Gerar lista!</h4></button>
</form>
            
    
            <div id="status" name="status" class="status text-center">
                <br><br>
                <h3><img src="app/viewers/img/happy.png"> Seu arquivo será analizado...</h3>
                
            </div>
        
          </div>
        </div>
        
            <footer> <div class="ass"  > <p>  © Developed by Tainara Regina ♥ </p> </div></footer>
            </div>
        
        </body>
</html>
