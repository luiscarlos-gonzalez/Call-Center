<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>registroCliente</title>
        <script src="<?php echo base_url();?>Misc/js/jquery-1.6.2.min.js" language="JavaScript" type="text/javascript"></script>
        <script src="<?php echo base_url();?>Misc/js/jquery-ui-1.8.16.custom.min.js" language="JavaScript" type="text/javascript"></script>
		<link href="<?php echo base_url();?>Misc/css/smoothness/jquery-ui-1.8.16.custom.css"  type="text/css" rel="stylesheet"/>
		<meta name="author" content="Luis Carlos Gonzalez Hernandez" />
		<!-- Date: 2011-11-23 -->
		<script language="JavaScript" type="text/javascript">
			$(document).ready(function(){
				$('.buton_contestar').click(function(){
					$(this).css('display', 'none');
					$('.buton_llamar').css('display', 'block');
					$('.buton_espera').css('display', 'block');
					$('.buton_registrar').css('display', 'block');
					var id_cliente = $('#idCliente').val();
					var id_llamada;
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>index.php/app/ajax_inicia_llamada",
						data: "id_cliente="+id_cliente,
						dataType: "json",
						success: function (data){
							id_llamada = data[0].idLlamada;
						}
					});
					$('.buton_llamar').click(function(){
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>index.php/app/ajax_finaliza_llamada",
							data: "id_llamada="+id_llamada
						});
					});
				});
				$('.buton_llamar').click(function(){
					$(this).parent().css('display', 'none');
				});
				$('.buton_registrar').click(function(){
					$('#registrocliente').css('display', 'block');
				});
				$('.cerrar').click(function(){
					$(this).parent().parent().css('display', 'none');
				});
				$('#enviar').click(function (){
					var action = $('#formulario_registro_cliente')[0].action;
					var method = $('#formulario_registro_cliente')[0].method;
					var data = $('#formulario_registro_cliente').serialize();
					
					console.log(action);
					console.log(method);
					console.log(data);
					
					$.ajax({
						type: method,
						url: action,
						data: data
					});
				});
			});
		</script>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			#registrocliente{
				border: 1px solid black;
				background-color: white;
				max-width: 300px;
				display: none;
				position: absolute;
				top: 100px;
				left: 40%;
				z-index: 1001;
			}
			#llamada{
				position: relative;
				width: 60%;
				height: 150px;
				top: 0px;
				border: 1px solid black;
				margin: 0 auto 0 auto;
			}
			.cliente{
	    		position: relative;
	    		background-color:#8699A4;
    		}
	    	.nombre_cliente{
	    		color:#000000;
	    		position:absolute;
	    		top:15px;
	    		left: 15px;
	    	}
	    	.telefono_cliente{
	    		position:absolute;
	    		color:#000000;
	    		top:35px;
	    		left: 15px;
	    	}
	    	.buton_llamar{
	    		position: absolute;
	    		top: 65px;
	    		left: 15px;
	    		background-color:#710909;
	    		color:#FFFFFF;
	    		display: none;
	    	}
	    	.buton_espera{
	    		position: absolute;
	    		top: 65px;
	    		left: 105px;
	    		background-color:#1B75BB;
	    		color:#FFFFFF;
	    		display: none;
	    	}
	    	.buton_contestar{
	    		position: absolute;
	    		top: 65px;
	    		left: 15px;
	    		background-color:#710909;
	    		color:#FFFFFF;
	    	}
	    	.buton_registrar{
	    		position: absolute;
	    		top: 65px;
	    		right: 15px;
	    		background-color:#710909;
	    		color:#FFFFFF;
	    		display: none;
	    	}
		</style>
	</head>
	<body>
		<div id="registrocliente">
			<form action="<?php echo base_url();?>index.php/app/ajax_pone_cliente" id="formulario_registro_cliente" method="post">
				<label>Nombre: </label><br />
				<input type="text" name="nombre" /><br />
				<label>Apellido Materno: </label><br />
				<input type="text" name="apellidoMaterno" /><br />
				<label>Apellido Paterno: </label><br />
				<input type="apellidoPaterno"/><br />
				<label>Calle y numero: </label><br />
				<input type="text" name="calleYNumero" /><br />
				<label>Colonia: </label><br />
				<input type="text" name="colonia" /><br />
				<label>Codigo postal: </label><br />
				<input type="text" name="codigoPostal" /><br />
				<label>Estado: </label><br />
				<input type="text" name="estado" /><br />
				<label>Ciudad: </label><br />
				<input type="text" name="ciudad" /><br />
				<label>Municipio: </label><br />
				<input type="text" name="municipio" /><br />
				<label>Numero Telefonico: </label><br />
				<input type="text" name="numeroTelefonico" /><br />
				<label>Fecha de nacimiento: </label><br />
				<input type="text" name="fechaDeNacimiento" /><br />
				<label>Genero: </label><br />
				<input type="text" name="genero" /><br />
				<label>Lada: </label><br />
				<select name="Lada_idLada">
					<option>Lada 1</option>
				</select><br />
				<label>Estado civil: </label><br />
				<select name="EstadoCivil_idEstado">
					<option>Estado 1</option>
				</select><br />
				<input type="button" id="enviar" value="Enviar"/>
				<input type="button" id="cerrar" value="cerrar"/>
			</form>
		</div>
		<div id="llamada" class="cliente">
        	<span class="nombre_cliente">Antonio Salazar Castro</span>
        	<span class="telefono_cliente"> +52 444 867 23 45</span>
			<button class="buton_contestar">Contestar</button>
       		<button class="buton_llamar">Colgar</button>
        	<button class="buton_espera">Poner en espera</button>
			<button class="buton_registrar">Regitrar cliente</button>
			<input type="hidden" name="id_cliente" id="idCliente" value="3" />
		</div>
		
	</body>
</html>
