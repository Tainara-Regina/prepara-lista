

  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js";
  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js";


  
  function render(){
       document.getElementById("gerarLista").disabled = true;
   $.ajax({
  url: 'status/arquivoAceito',
  success: function(data) {
      $("#status").html(data);
  }
});



  }
 
  
  function renderFinal(ola){
 document.getElementById("gerarLista").disabled = false;
   $.ajax({
  url: 'status/arquivoFinal',
  success: function(data) {
      $("#status").html(data);
  }
});
  }
 
      