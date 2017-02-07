<?php
	$error =false;//variable para control de error
	if (isset($_POST['login'])){
		$Nombre = preg_replace('/[^A-Za-z]/', '', $_POST['Nombre']);//Asignamos a la variable nombre el usuario del form "no aceptamos caracteres que no sean letras"
		$Nom = preg_replace('/[^A-Za-z]/', '', $_POST['nombre']);
		$password = md5($_POST['password']);//Asignamos a la variable password el valor encriptado con md5 de la contraseña introducida en el form
		if (file_exists('login/' . $Nombre. 'Usuarios.xml')){//comprobamos la existencia del fichero xml	

			$xmlObject = new SimpleXMLElement('login/Usuarios.xml', 0, true);

			foreach ($xmlObject->children() as $node) {
        			/*print ("Nombre=".$node->Nombre);    //Este codigo es para comprobar que entraba y ver los usuarios, contraseñas y correos de los usuarios.
        			print ("  Password=".$node->Password);
				print ("  Correo=".$node->Correo);
        			print ("<p><hr>");*/
		
				if(($password == $node->Password)&&($Nom ==$node->Nombre) ){//vomparamos las contraseña introducida y la del xml
					session_start();//iniciamos la sesion
					$_SESSION['Nombre'] = $Nom;//variable de sesion nombre = usuario logeado
					header('Location: login/conectado.html');//enlace a la pagina para comprar vinos
					die;
				}
			}
		}
		$error =true;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>La Vinoteca</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet"  href="estilo.css" />
		<link href="/img/favicon.ico" rel='icon' type='image/x-icon'/>
			<a href="index.php"><img src="img/13.jpg" alt="" width=100%></a>
	</head>
    <body>	
<div id="total">
		<box id="cabezal">    
			<div id="cabecera">
				<ul class="nav">
					<li><a href="index.php">Home</a></li>
					<li><a>Denominaciones</a>
						<ul>
							<li><a href="denominaciones/Rioja.html">Rioja</a></li>
	        					<li><a href="denominaciones/Chacoli.html">Chacoli</a></li>
	       		 				<li><a href="denominaciones/RiberaDeDuero.html">Ribera de Duero</a></li>
							<li><a href="denominaciones/Toro.html">Toro</a></li>
							<li><a href="denominaciones/Cava.html">Cava</a></li>
							<li><a href="denominaciones/Valdepeñas.html">Valdepeñas</a></li>	
	        					<li><a href="denominaciones/Ribeiro.html">Ribeiro</a>
						</ul>
					</li>
		
					<li><a href="">Nuestra actividad</a>
				    		<ul>
							<li><a href="actividad/Cata.html">Cata</a></li>
							<li><a href="actividad/Degustacion.html">Degustación</a></li>
							<li><a href="actividad/HoyDescorchamos.html">Hoy descorchamos...</a></li>
				    		</ul>
					</li>
		   
					<li><a href="">Contacto</a>
						<ul>
							<li><a href="contacto/Localizacion.html">Localización</a></li>
				       			<li><a href="contacto/QuienesSomos.html">Quienes somos</a></li>
				        		<li><a href="contacto/Contacto.html">Contacta con nosotros</a></li>
				       			<li><a href="contacto/librodevisitas/nuevo_coment.html">Danos tu Opinión</a>
								<ul>
				        				<li><a href="contacto/librodevisitas/lista_coment.php">Lista de Comentarios</a></li>   
		       						</ul>
							</li>
			    			</ul>
					</li>
				</ul>
			</div>
		</box>
	<br><br><br><br>

		<div class="inicio">
			<p id="inicio">
				<h2><u>Inicio </u></h2>
			</p>
			<br>
		</div>
		<br><br>
	
		<div class="titulo1">
			<div id="titulo1">
				<b>"Beati hispani quibus vivere est bibere"<br><br>
	
				Bienvenido a La Vinoteca el club de vinos virtual</b>
			</div>
			<br>
			<div class="slider">
				<ul>
					<li><img src="img/5.jpg" width="750" height="300" alt=""></li>	
					<li><img src="img/2.jpg" width="750" height="300" alt=""></li>
            				<li><img src="img/1.jpg" width="750" height="300" alt=""></li>
       					<li><img src="img/4.jpg" width="750" height="" alt=""></li>
				</ul>  
        		</div>
		</div>	
	
		<div class="login" >
			<div id="login">
				<form method="post" action= "">
					<p>Nombre:<br> <input type='text' id='Nombre' name='nombre' onBlur='javascript:user()' placeholder="Usuario" size="15px"></p>
					<p>Password:<br> <input type='password' name='password' id='password' onBlur='javascript:password()' placeholder="contraseña"  size="15px" ></p><br>
					<?php
						if($error){
							echo '<script language="javascript">alert("contraseñsa erroneas");</script>';//lanza una alerta "el usuario o la contraseña esta mal"
						}
					?>
					<p><input type='submit' value='Entrar' name="login"></p>
						
				</form><br>
					<a href="login/Registrar.html" ><h5>¿Aún no te has registrado?<h5></a>
					
			</div>		
		</div>
	
	</div>


</body>
</html>



