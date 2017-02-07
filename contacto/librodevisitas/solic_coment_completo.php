<?php
	require_once("libro_visitas.inc");
	
	// Verificar que ha sido enviado el 'id' que identifica al comentario
	//  y que existe el fichero XML con la lista de comentarios
	if(isset($_GET['id']) && file_exists($CMT_FILE))
	{
		$id=$_GET['id'];
		// Cargar el fichero XML con la lista de comentarios
		$bl=simplexml_load_file($CMT_FILE);
		// Recorrer la lista de comentarios hasta encontrar el del 'id' dado
		foreach($bl->visita as $visita)
		{
			if($visita['id'] == $id)
			{
				// Devolver el comentario encontrado y terminar
				echo($visita->comentario);
				break;
			}
		}
	}
?>
