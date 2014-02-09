

<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo TITULO; ?></title>
		<meta name="Description" content="Página web MVC" /> 
		<meta name="Keywords" content="mediateca MVC lopandpe" /> 
		<meta name="Generator" content="netbeans php" /> 
	 	<meta name="Origen" content="lopandpe" /> 
		<meta name="Author" content="lopandpe" /> 
		<meta name="Locality" content="Madrid, Espa�a" /> 
		<meta name="Lang" content="es" /> 
		<meta name="Viewport" content="maximum-scale=10.0" /> 
		<meta name="revisit-after" content="1 days" /> 
		<meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
		<meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 
		
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="favicon.ico" rel="icon" type="image/x-icon" /> 
		
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/principal.css" />
                <link rel="stylesheet" type="text/css" href="recursos/css/<?php echo \core\Distribuidor::get_controlador_instanciado(); ?>.css" />
		<style type="text/css" >
			/* Definiciones hoja de estilos interna */
		</style>

		<script type="text/javascript" src=""></script>
		
		<script type="text/javascript" >
			/* l�neas del script */
			
		</script>
		
	</head>

	<body>
            <img id="full-screen-background-image" alt="fondo de pantalla" src="<?php echo URL_ROOT; ?>recursos/imagenes/fondo.jpg"  />
	
		<!-- Contenido que se visualizar� en el navegador, organizado con la ayuda de etiquetas html -->
                <div id="wrapper">
		<div id="encabezado">
                    <h1><?php echo TITULO ?></h1>
                    <ul id="menu">
                        <li><a href="<?php echo URL_ROOT; ?>inicio">Inicio</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>hemeroteca">Hemeroteca</a></li>

                        
                    </ul>
                </div>
		
		

		<div id="view_content">

			Parece que te has perdido. Vuelve a empezar.
                        
                    </br></br>
                  <?php 
//                  var_dump($datos);
                  ?>
		</div> 

	
		<div id="pie">
			<hr />
			Documento creado por lopandpe.
		</div>
		
                </div>
	</body>

</html>
