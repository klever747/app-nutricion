
$(document).ready(function() {

	//metodo para restablecer password
	$('.reset')	.click(function(e) {
		e.preventDefault();
		AbrirModalsRestablecer();
	});
});
 	function validateCampos(){
	 preventDefault();
     
     var ci = $("#txtcedula").val();
     var nombre = $("#txtnombres").val();
     var apellido = $("#txtapellidop").val();
     var movil = $("#txtmovil").val();
     var direccion = $("#direccion").val();
     var opcion_sexo = $("#opcion_sexo").val();
     var edad = $("#txt_edad").val();
     var ciudad = $("#ciudad").val();
     var email = $("#txtemail").val();
     var usuario = $("#txtusuario").val();
     var password = $("#txtcontrasena").val();

     if(ci.length === 0  || nombre.length === 0 || apellido.length === 0 ||   opcion_sexo.length === 0 
     	|| email.length === 0  || password.length === 0){

     	 return Swal.fire("Mensaje de Advertencia", "Rellene los campos ", "warning");
		//AbrirModalsNutricionista();
     }

};
//funcion para validar que el email no se repita en la base de datos

function validarEmail(event){

    var settings = {
      "url": $("#urlAPI").val()+"users?linkTo=email_user&equalTo="+event.target.value+"&tabla_estado=users&select=email_user",
      "method": "GET",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {

      if(response.status == 200){

      	$(this).css("border","1px solid red");
	    $(event.target).parent().children('#emailOK').html("El email ya existe");
	    $(event.target).parent().children('#validaremail').val("Incorrecto");
	    event.target.value="";
	    return;
      	    
      }
    });
  validateJS(event,"email");  
}
//funcion para validar que el numero de cedula no se repita en la base de datos

function validarCI(event){

    var settings = {
      "url": $("#urlAPI").val()+"users?linkTo=ci_user&equalTo="+event.target.value+"&tabla_estado=users&select=ci_user",
      "method": "GET",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {

      if(response.status == 200){

      	$(this).css("border","1px solid red");
	    $(event.target).parent().children('#cedulaOK').html("La CI existe");
	    $(event.target).parent().children('#validarcedula').val("Incorrecto");
	    event.target.value="";
	    return;
      	    
      }
    });
  validateJS(event,"CI");  
}
 
//funcion para validar el email
function validateJS(event,type){

	if(type == "text"){
		var pattern = /^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/;
		if(!pattern.test(event.target.value)){
			$(this).css("border","1px solid red");
      	
	         $(event.target).parent().children('#text_ok').html("Caracteres Incorrectos");
	    	 $(event.target).parent().children('#validartexto').val("Incorrecto");
	    	 event.target.value="";
	    	 return;
		}else{
			$(this).css("border","");
      	
	         $(event.target).parent().children('#text_ok').html("");
	    	 $(event.target).parent().children('#validartexto').val("");
	    	 
		}
	}
	//funcion para validar la cedula
	if(type == "CI"){
		var cedula = event.target.value;
	  array = cedula.split( "" );
	  num = array.length;
	  if ( num == 10 )
	  {
	    total = 0;
	    digito = (array[9]*1);
	    for( i=0; i < (num-1); i++ ) { mult = 0; if ( ( i%2 ) != 0 ) { total = total + ( array[i] * 1 ); } else { mult = array[i] * 2; if ( mult > 9 )
	          total = total + ( mult - 9 );
	        else
	          total = total + mult;
	      }
	    }
	    decena = total / 10;
	    decena = Math.floor( decena );
	    decena = ( decena + 1 ) * 10;
	    final = ( decena - total );
	    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
	      $(this).css("border","");
	      $("#cedulaOK").html("");
	      $("#validarcedula").val("Correcto");
	      //return true;
	    }
	    else
	    {
	      $(this).css("border","1px solid red");
	      $("#cedulaOK").html("Cedula Incorrecta");
	      $("#validarcedula").val("Incorrecto");
	    }
	  }
	  else
	  {   $(this).css("border","1px solid red");
	      $("#cedulaOK").html("Cedula Incorrecta");
	      $("#validarcedula").val("Incorrecto");
	  }
	}
	//validamos el Email
	if(type =="email"){

		var pattern = /^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

		if(!pattern.test(event.target.value)){
			$(this).css("border","1px solid red");
      	
	         $(event.target).parent().children('#emailOK').html("El email Incorrecto");
	    	 $(event.target).parent().children('#validaremail').val("Incorrecto");
	    	 event.target.value="";
	    	 return;
		}else{
			$(this).css("border","");
             $("#emailOK").html("");
             $("#validaremail").val("Correcto");
		}
	}
	//validamos el password
	if(type == "password"){
		var pattern = /^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9azA-Z]{1,}$/;
		if(!pattern.test(event.target.value)){
			$(event.target).parent().children('#passwordOk').html("El Password is wrong");
	    	$(event.target).parent().children('#validarPassw').val("Incorrecto");
	      	event.target.value="";
	      	return;

		}else{
			$(this).css("border","");
             $("#passwordOk").html("");
             $("#validarPassw").val("Correcto");
		}
	}
	//validamos la imagen
	if(type == "image"){
		var image = event.target.files[0];

		//validamos el formato
		if(image["type"] !== "image/jpeg" && image["type"] !== "image/png"){
			fncSweetAlert("error", "La foto tiene que estar en formato JPG o PNG", null);
			return;
		}
		//validamos el tamaño
		else if(image["size"] > 2000000){
			fncSweetAlert("error", "La foto tiene no tiene que pesar mas de 2MB", null);
			return;
		}
		//mostramos una imagen temporal
		else{
			
			var data = new FileReader();
			data.readAsDataURL(image);

			$(data).on("load", function(event){
				var path = event.target.result;
				$(".changeFoto").attr("src", path);
			});
		}

	}

}
//funcion para validar el ingreso solo de numeros en las cajas de texto
function validateNumber(event){
	key = event.keyCode || event.which;

	teclado = String.fromCharCode(key);
	numeros = "0123456789";
	especiales = "8-37-38-46";
	teclado_especial = false;

	for(var i in especiales){
		if(key == especiales[i]){
			teclado_especial = true;
		}
	}
	if(numeros.indexOf(teclado)== -1 && !teclado_especial){
		return false;
	}
}

//abrir el modal para restablecer contraseña
function AbrirModalsRestablecer(){
    $('#id_modal_restablecer').modal({backdrop:'static',keyboard:false});
    $('#id_modal_restablecer').modal('show');
  
}
