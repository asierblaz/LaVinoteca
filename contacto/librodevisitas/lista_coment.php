<?php
	require_once("libro_visitas.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Comentarios</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="libro_visitas.css" type="text/css" />
		<link rel="stylesheet"  href="../estilolistacoment.css" />		
		<script type="text/javascript" src="libro_visitas.js"></script>
		<link href="../../img/favicon.ico" rel='icon' type='image/x-icon'/>
   <a href="../../index.php"><img src="../img/13.jpg" alt="" width=100%></a>
	    
	</head>
	<body>
		<div id="cabecera">
		<ul class="nav">
			<li><a href="../../index.php">Home</a></li>
			<li><a>Denominaciones</a>
				<ul>
					<li><a href="../../denominaciones/Rioja.html">Rioja</a></li>
	        			<li><a href="../../denominaciones/Chacoli.html">Chacoli</a></li>
	        			<li><a href="../../denominaciones/RiberaDeDuero.html">Ribera de Duero</a></li>
					<li><a href="../../denominaciones/Toro.html">Toro</a></li>
					<li><a href="../../denominaciones/Cava.html">Cava</a></li>
					<li><a href="../../denominaciones/Valdepeñas.html">Valdepeñas</a></li>
	        			<li><a href="../../denominaciones/Ribeiro.html">Ribeiro</a>
				</ul>
			</li>
		
			<li><a href="">Nuestra actividad</a>
		    		<ul>
					<li><a href="../../actividad/Cata.html">Cata</a></li>
					<li><a href="../../actividad/Degustacion.html">Degustación</a></li>
					<li><a href="../../actividad/HoyDescorchamos.html">Hoy descorchamos...</a></li>
		    		</ul>
	   
		   <li><a href="">Contacto</a>
				<ul>
					<li><a href="../Localizacion.html">Localización</a></li>
		       			<li><a href="../QuienesSomos.html">Quienes somos</a></li>
		        		<li><a href="../Contacto.html">Contacta con nosotros</a></li>
		       <li><a href="nuevo_coment.html">Dejanos tu Opinión</a><ul>
            <li><a href="lista_coment.php">Lista de Comentarios</a></li>   
	       			</ul></li>
	    		</ul>
	   	</div>

	
		<br><br><br><br>        
        
			<h1 id="titulo">Comentarios</h1>		
		<?php
			if(!file_exists($CMT_FILE))
			{
				echo('<p>El libro de visitas está vació. Si quieres ser el primero en escribir un comentario haz click <a href="nuevo_coment.html">aquí</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($CMT_FILE)))
			{
				echo('<p>Ha habido algún error al leer el libro de visitas. Perdona las molestias.</p>');
			}
			else
			{
			?>
			<br>
			<p> <p style="text-align: center;">A continuación se listan todos los comentarios recibidos hasta ahora. Para volver al menú principal haz click <a href="nuevo_coment.html">aquí</a>.</p> </p><br>
			<table border="1" class="comentarios">
			<?php
				$cont=0;
				foreach($bl->visita as $visita)
				{
					// Para mostrar el comentario en curso se ha de cumplir alguna de estas 2 condiciones:
					//  (si se cumple la primera, la segunda no será evaluada)
					//   · No se ha especificado ningun nombre de usuario en 'nombre_busq'
					//   · Coincide el nombre de usuario de 'nombre_busq' y el del comentario en curso
					//      (se pasan los dos a minúsculas antes de comparar)
					if(!isset($_POST['nombre_busq']) ||
					   (strtolower($_POST['nombre_busq']) == strtolower($visita->nombre)) )
					{
						$cont++;
						echo('<tr class="cabecera_comentario">');
						echo('<td>');
						echo('<span class="fecha">'.$visita->fecha.'</span>');
						echo('<span class="nombre">'.$visita->nombre.'</span>');
						if($visita->email && ($visita->email['mostrar']=="si"))
							echo('<span class="email">&lt;'.$visita->email.'&gt;</span>');
						echo('</td>');
						echo('</tr>');
						echo('<tr class="comentario">');
						echo('<td id="'.$visita['id'].'">');
						// Si el comentario es menor que el tamaño máximo permitido, mostrarlo completo
						if(strlen($visita->comentario) <= $TAM_COMENT)
							echo($visita->comentario);
						// Si no, mostrarlo parcialmente y añadir enlace para solicitarlo completo
						else
							echo(substr($visita->comentario,0,$TAM_COMENT).'... <a href="javascript:solic_coment_completo(\''.$visita['id'].'\');" class="mas">[Mostrar comentario completo]</a>');
						echo('</td>');
						echo('</tr>');
					}
				}
				// Mostrar un mensaje de aviso si no se ha encontrado ningún comentario del usuario especificado
				if($cont==0)
					echo('No se ha encontrado ningún comentario del usuario: '.$_POST['nombre_busq']);
			}
		?>
		</table>
		<br><br><br>
	</body>
</html>
