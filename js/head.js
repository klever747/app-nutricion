/*=============================================
Función para formatear Inputs
=============================================*/

function fncFormatInputs(){

    if(window.history.replaceState){
        window.history.replaceState( null, null, window.location.href );     
    }
    
}

/*=============================================
Función para Notie Alert
=============================================*/

function fncNotie(type, text){

	notie.alert({
	   
	    type: type,
	    text: text,
	    time: 10

    })

}

/*=============================================
Función Sweetalert
=============================================*/

function fncSweetAlert(type, text, url){

	switch (type) {

		/*=============================================
		Cuando ocurre un error
		=============================================*/

		case "error":

		if(url == null){

		  	Swal.fire({
	            icon: 'error',
	            title: 'Error',
	            text: text
	        }) 

	    }else{

	    	Swal.fire({
	            icon: 'error',
	            title: 'Error',
	            text: text
	        }).then((result) => {

    	 		if (result.value) { 

    	 			window.open(url, "_top");

    	 		}

	        }) 

	    }

        break;

        /*=============================================
		Cuando es correcto
		=============================================*/

		case "success":

		if(url == null){

		  	Swal.fire({
	            icon: 'success',
	            title: 'Success',
	            text: text
	        }) 

	    }else{

	    	Swal.fire({
	            icon: 'success',
	            title: 'Success',
	            text: text
	        }).then((result) => {

    	 		if (result.value) { 

    	 			window.open(url, "_top");

    	 		}

	        }) 

	    }

        break;

        /*=============================================
		Cuando estamos precargando
		=============================================*/

		case "loading":

		  Swal.fire({
            allowOutsideClick: false,
            icon: 'info',
            text:text
          })
          Swal.showLoading()

        break;  

        /*=============================================
		Cuando necesitamos cerrar la alerta suave
		=============================================*/

		case "close":

		 	Swal.close()
		 	
		break;

	}

}