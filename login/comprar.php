<?php
	session_start();
	$Usuario = $_SESSION['Nombre'];
	$Cava = $_POST['Cava'];
	$Chacoli = $_POST['Chacoli'];
	$Ribeiro = $_POST['Ribeiro'];
	$Ribera = $_POST['Ribera'];
	$Rioja = $_POST['Rioja'];
	$Toro = $_POST['Toro'];
	$Val = $_POST['Valdepeñas'];

	$xml = simplexml_load_file('Cesta.xml');

	$Usuario = $xml->addChild('Usuario',$Usuario);
	$Usuario->addChild('Cava',$Cava);
	$Usuario->addChild('Chacoli',$Chacoli);
	$Usuario->addChild('Ribeiro',$Ribeiro);
	$Usuario->addChild('Ribera',$Ribera);
	$Usuario->addChild('Rioja',$Rioja);
	$Usuario->addChild('Toro',$Toro);
	$Usuario->addChild('Valdepeñas',$Val);

	$xml->asXML('Cesta.xml');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Comentario Nuevo</title>
	<link rel="stylesheet"  href="../estilo.css" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<a href="conectado.html"><img src="../img/13.jpg" alt="" width=100%></a>
    </head>
	<br><br>
	<body>
	<?php
	echo "Pedido Realizado";
echo "<br>";
echo "<a href=\"conectado.html\">Pagina del usuario $x</a>";
?>
</body>
</html>