<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo TITULO; ?></title>
		<meta name="Description" content="Página web modelo MVC" /> 
		<meta name="Keywords" content="palabras en castellano e ingles separadas por comas" /> 
		<meta name="Generator" content="netbeans php" /> 
	 	<meta name="Origen" content="horgaral" /> 
		<meta name="Author" content="horgaral" /> 
		<meta name="Locality" content="Madrid, España" /> 
		<meta name="Lang" content="es" /> 
		<meta name="Viewport" content="maximum-scale=10.0" /> 
		<meta name="revisit-after" content="1 days" /> 
		<meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
		<meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 
		
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="favicon.ico" rel="icon" type="image/x-icon" /> 
		
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/principal.css" />
		<style type="text/css" >
			/* Definiciones hoja de estilos interna */
		</style>

		<script type="text/javascript" src=""></script>
		
		<script type="text/javascript" >
			/* l�neas del script */
			
		</script>
		
	</head>

	<body>
            <img id="fondo" alt="fondo de pantalla" src="<?php echo URL_ROOT; ?>recursos/imagenes/fondo.jpg"  />
	
		<!-- Contenido que se visualizar� en el navegador, organizado con la ayuda de etiquetas html -->
		
                <div id="encabezado">
                    <h1><?php echo TITULO ?></h1>
                </div>
		
                <div id="id_menu"
                    <ul>
                            <li><a class="inicio" href="?menu=inicio&submenu=index">Inicio</a></li>
                            <li><a class="inicio"href="?menu=mediateca&submenu=index">Mediateca</a></li>

                    </ul>
		</div>

		<div id="view_content">

			<?php
				echo $datos['view_content'];
			?>
			
		</div>

	
		<div id="pie">
			<hr />
			</br>
			Documento creado por Alvaro Horcajuelo Garcia. <a href="mailto:alvarito_hg82@hotmail.com">Contactar</a><br />
			Fecha última actualización: 9 de febrero de 2014.
		</div>
		
                </div>
	</body>

</html>
