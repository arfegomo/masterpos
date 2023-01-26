  $(document).ready(function(){
  //Desactiva la funcion F5 actualizar página
  $(function() {
   $(document).keydown(function(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 116) {
     e.preventDefault();
     jError("Función no disponible");
    }
   });
  });
  //fin

});