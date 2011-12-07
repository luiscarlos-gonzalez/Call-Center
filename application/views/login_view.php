<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>
			Login Innova Call Center
		</title>
		<link href="<?php echo base_url();?>screen.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div id="login">
		    <?php
		        if($this->session->userdata('username')){
		            echo 'Redirecciona a la pagina principal si ya se inicio session';
		            echo '<a href="'.base_url().'index.php/login/salir/">Salir</a>';
		        }else{
		    ?>
			<h1 id="acceder">Acceder</h1>
			<form method="POST" action="<? echo base_url(); ?>index.php/login/acceder">
				<label for="usuario" id="labelUsuario">Usuario: </label><br />
				<input name="usuario" type="text" id="usuario" /><br />
				<label for="contrasena" id="labelContrasena">Contraseña: </label><br />
				<input type="password" name="contrasena" id="contrasena" /><br />
				<?php echo validation_errors('<p id="errores">', '</p>'); ?>
				<input type="checkbox" name="recordar" id="recordar"/>
				<label for="recordar" id="labelRecordar"> Recordarme</label><br />
				<input type="submit" id="accederBoton" value="Acceder" />
			</form>
			<?php } ?>
		</div>
	</body>
</html>
