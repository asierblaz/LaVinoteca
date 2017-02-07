
function user(){

	var pass=document.getElementById('nombre');
 
	if(pass.value== "") {
		alert("Error: el usuario no puede ser vacio!");
     
      
    }
}

function confirmar(){

	var pass=document.getElementById('pass');
	var cpass=document.getElementById('cpass');

	if(pass.value!=cpass.value){
		alert("Error: la contraseña y su confirmacion no coinciden");
	}
}


function password(){

	var pass=document.getElementById('pass');

	if(pass.value.length < 5) {
        	alert("Error: la contraseña debe contener al menos 5 caracteres!");
      	}

	re = /[0-9]/;

	if(!re.test(pass.value)) {
        	alert("Error: la contraseña debe contener al menos un numero (0-9)!");
	}

	re = /[a-z]/;

	if(!re.test(pass.value )) {
		alert("Error: la contraseña debe contener al menos una letra minuscula (a-z)!"); 
	}

	re = /[A-Z]/;

	if(!re.test(pass.value )) {
		alert("Error: la contraseña debe contener al menos una letra mayuscula (A-Z)!");  
 	}
  }

function validarCampos(){

	var Aux=" ";
	var campos=document.getElementById("Formulario");

		for (i=0;i<campos.elements.length-1;i++){ 
			if(campos.elements[i].id!='correo'){
				if(campos.elements[i].type=='checkbox'){
					Aux += "NOMBRE: " + campos.elements[i].name + " "; 
                 			Aux += "VALOR: " + campos.elements[i].checked + "\n";
				}
				else{ 
				
                 			Aux += "NOMBRE: " + campos.elements[i].name + " "; 
                 			Aux += "VALOR: " + campos.elements[i].value + "\n"; 
				}	
			}
		}
			
            alert(Aux); 
	}

function validarCorreo(){
	var correcto=false;
	var correo=document.getElementById('correo').value;
	if(correo!=''){
		var split1=correo.split("@");
		if(split1.length==2){
					//alert("HE");
			var split2=split1[1].split(".");
			if(split2.length>=2){
				if(split2[split2.length-1].length>=2){
					correcto=true;
				}
			}
			if(split1[0].length==0){
				correcto=false;
			}
		}
			
	}
	if(correcto==false){
		alert("Correo incorrecto");
	}
}


