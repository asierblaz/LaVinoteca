<?php
$nombre=$_POST['nombre'];
$pass=$_POST['pass'];
$correo=$_POST['correo'];

$xml = simplexml_load_file('Usuarios.xml');
$usuario=$xml->addChild('Usuario');
$usuario->addChild('Nombre',$nombre);
$usuario->addChild('Password',md5($pass));
$usuario->addChild('Correo',$correo);
$xml->asXML('Usuarios.xml');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Comentario Nuevo</title>
	<link rel="stylesheet"  href="../estilo.css" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<a href="../../index.php"><img src="../img/13.jpg" alt="" width=100%></a>
    </head>
	<br><br>
	<body>
	<?php
	echo "Datos introducidos";
echo "<br>";
echo "<a href=\"../index.php\"><br> Regresar a la pagina anterior $x</a>";
?>
</body>
</html>
