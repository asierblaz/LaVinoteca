<?php
	require_once('libro_visitas.inc');
	
	// Guardar los datos del forumulario y quitar los espacios en blanco (trim)
	$nombre=trim($_POST['nombre']);
	$email=trim($_POST['email']);
	$privado=isset($_POST['privado']);
	$comentario=trim($_POST['comentario']);

	// Validar los datos del formulario
	$error = ValidarFormServ($nombre, $email, $comentario);
	if($error == '')
		// Guardar comentario en la base de datos (Fichero XML)
		if(!GuardarComentario($nombre, $email, $privado, $comentario))
			$error = '<li>No se ha podido guardar el comentario en la base de datos!</li>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Comentario Nuevo</title>
	<link rel="stylesheet"  href="../../estilo.css" />
	<a href="../../index.php">
    <img src="../img/13.jpg" alt="" width=100%></a>
	<br><br>
	<?php
		if($error=='')
			echo '<title>Gracias por dejar tu comentario</title>';
		else
			echo '<title>Error al recoger el comentario</title>';
	?>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	</head>
	<body>
	<?php
		if($error != '')
		{
			echo('<h1>Ha habido un error al recoger el comentario</h1>');
			echo("<ul>$error</ul>");
		}
		else
		{
			echo('<h1>Gracias por dejar tu comentario</h1>');
		}
	?>
	<br>
		<a href="nuevo_coment.html">Regresar a la pagina anterior</a>.
	</body>
</html>
