function validaCampos(){
 
  if( document.getElementById("radioSim").checked == true){
     document.getElementById("nomeGrupo").disabled = false; 
   
  } else if (document.getElementById("radioNao").checked == true) {
       document.getElementById("nomeGrupo").disabled = true;
       document.getElementById("nomeGrupo").value = "";
      
  }
    
}