(function(){
  $('.loader').hide();
  $("#enviar").click(function() {
    var nombre = $("#nombre").val(),
      asunto = $("#asunto").val(),
      email = $("#email").val(),
      telefono = $("#telefono").val(),
      mensaje = $("#mensaje").val();
    if (nombre == "") {
      $("#nombre").focus();
      return false;
    }
    else if(asunto == ""){
      $("#asunto").focus();
      return false;
    }
    else if(email == "" ){
      $("#email").focus();
      return false;
    }
    else if(telefono == ""){
      $("#telefono").focus();
      return false;
    }
    else if(mensaje  == ""){
      $("#mensaje").focus();
      return false;
    }
    else{
      $('.loader').css('display','inline-block');
      var datos = 'nombre='+ nombre + '&asunto='+ asunto +'&email=' + email + '&telefono=' + telefono + '&mensaje=' + mensaje;
      $.ajax({
        type: "POST",
        url: "proceso.php",
        dataType:'json',
        data: datos,
        success: function(response) {
          $('.loader').hide();
          $('form input, form textarea').val('');
          if(response.success){
            $('.msg').text('Mensaje enviado.').addClass('msg_ok');
          }else{
            $('.msg').text('Hubo un error, intente nuevamente.').addClass('msg_error');
          }
        }
      })
      return false;
    }
  });
})();
