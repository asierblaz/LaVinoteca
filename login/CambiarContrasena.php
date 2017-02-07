<?php

session_start();
$error = false;
if (isset($_POST['cambiar'])){
	$Nombre = $_SESSION['Nombre'];
	$vieja = md5($_POST['AContraseña']);
	$nueva = md5($_POST['NContraseña']);
	$c_nueva = md5($_POST['CNContraseña']);

	$xmlObject = new SimpleXMLElement('Usuarios.xml', 0, true);

	foreach ($xmlObject->children() as $node) {
        	if(($vieja == $node->Password)&&($Nombre ==$node->Nombre)){
			if ($nueva == $c_nueva){
				$node->Password = $nueva;
				$xmlObject->asXML('Usuarios.xml');
				header('Location: conectado.html');//enlace a la pagina para comprar vinos
				die;
			}
		}
	}
	$error = true;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Cambiar contraseña</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet"  href="../estilo.css" />
		<link href="/img/favicon.ico" rel='icon' type='image/x-icon'/>
    <a href="conectado.html"><img src="../img/13.jpg" alt="" width=100%></a>
	</head>
    <body>
	<h1>Cambiar Contraseña</h1>
	<form id='form' method='POST' action="">
	<?php
		if($error){
			echo '<script language="javascript">alert("usuario y/o contraseña erroneos");</script>'; //lanza una alerta "el usuario o la contraseña esta mal"
		}
	?>
			<p>Contraseña antigua: <input type="password" id='Contraseña' name='AContraseña' onBlur='javascript:validarCorreo()'></p>
			<p>Contraseña nueva: <input type="password" name='NContraseña' id='CNContraseña' onBlur='javascript:password()' ></p>
			<p>Confirmar Contraseña: <input type="password" name='CNContraseña' id='NContraseña' onBlur='javascript:confirmar()'></p>
			<p><input type='submit' value="Cambiar contraseña" name="cambiar"></p>
			
		</form>

		<a href="conectado.html"><br> Regresar a la página anterior</a>
	<body>
</html>
