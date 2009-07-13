
$(document).ready(function() {

   // Interceptamos el evento submit
    $('#frontendform').submit(function() {
  // Enviamos el formulario usando AJAX
        Inscribe();
        return false;
    });
})
function Inscribe(){

      var url = $("#urlAjax").val()+"frontManage.php";
      if ($("#emailInput").val() == ""){
          alert("Introduce un titulo de newsletter antes de guardar");
      }else{
          $.ajax({
                type: "POST",
                url: url,
                data: "show=SaveIns&email="+$("#emailInput").val()+"&newsletter="+$("#newsletterHidden").val()+"&lista="+$("#listSuscribes").val(),
                beforeSend: function(objeto){
                                     $("#resultado").html('<img  src="'+$("#loadingurl").val()+'" >');
                },
                success: function(datos){
                    $("#resultado").html(datos);
                }
          });
     }
}