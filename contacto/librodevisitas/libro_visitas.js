// Verificar los datos del formulario de un nuevo comentario.
// Si encuentra algún error muestra una ventana de alerta y devuelve false.
// Si todo ha ido bien, devuelve true.
function ValidarForm(f)
{
	// Leer valores del formulario
	var nombre = f.nombre.value;
	var email = f.email.value;
	var privado = f.privado.checked;
	var comentario = f.comentario.value;
	
	var error = "";
	// Verificar que los campos obligatorios están rellenados
	if(nombre=="")
		error += "\tTu nombre es obligatorio!\n";
	if(comentario=="")
		error += "\tNo has introducido ningún comentario!\n";
	
	// Verificar el formato de la dirección de correo
	if(email != "" && !VerificarFormatoCorreo(email))
		error += "\tEl formato de la dirección de correo no es correcto!\n";
		
	// Si hay algún error, mostrar el mensaje
	if(error != "")
	{
		alert("Validación del formulario:\n" + error);
		return false;
	}
	else
		return true;
}

// Verificar el formato de una dirección de correo
// Devuelve true si el formato de la dirección de correo es correcto y false en caso contrario
function VerificarFormatoCorreo(direccion)
{
	// Asegurar que '@' aparece una única vez
	if(direccion.split("@").length != 2)
		return false;
	// Asegurar que '@' no es el primer caracter
	if(direccion.indexOf("@") == 0)
		return false;
	// Asegurar que después de '@' hay, al menos, un punto
	if(direccion.lastIndexOf(".") < direccion.lastIndexOf("@"))
		return false;
	// Asegurar que después del último punto hay, al menos, dos caracteres
	if(direccion.lastIndexOf(".") + 2 > direccion.length - 1)
		return false;
	return true;
}

// Solicitar el comentario completo asociado al identificador 'id' y
//  actualizar su contenido en la lista
function solic_coment_completo(id)
{
	// Crear el objeto XMLHttpRequest (dependiente del navegador)
	var xhr;
	if(XMLHttpRequest)
		xhr = new XMLHttpRequest();
	else
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	// Establecer el método (GET), la URL (script PHP y parámetro) y
	//  si la solicitud es asíncrona (true)
	xhr.open('GET', 'solic_coment_completo.php?id='+id, true);
	// Establecer rutina de atención (handler)
	xhr.onreadystatechange = function()
	{
		// Si la respuesta ha sido correcta
		if(xhr.readyState == 4 && xhr.status == 200)
			// Asignar el texto del comentario completo enviado
			//  por el servidor al elemento correspondiente de la lista
			document.getElementById(id).innerHTML = xhr.responseText;
	}
	// Enviar la solicitud AJAX
	xhr.send('');
}

