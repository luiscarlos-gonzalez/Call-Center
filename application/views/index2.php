<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>New Web Project</title>
        <script src="<?php echo base_url();?>Misc/js/jquery-1.6.2.min.js" language="JavaScript" type="text/javascript"></script>
        <script src="<?php echo base_url();?>Misc/js/jquery-ui-1.8.16.custom.min.js" language="JavaScript" type="text/javascript"></script>
		<link href="<?php echo base_url();?>Misc/css/ui-lightness/jquery-ui-1.8.16.custom.css"  type="text/css" rel="stylesheet"/>
    <script language="JavaScript" type="text/javascript">
    	$(document).ready(function(){
		    		$('.buton_llamar').click(function (){
		    			var cliente = $(this).parent();
		    			var id_cliente = cliente.find('#idCliente').val();
		    			var id_llamada = "";
		    			var id_pedido = "";
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>index.php/app/ajax_inicia_llamada",
							data: "id_cliente="+id_cliente,
							dataType: "json",
							async: false,
							success: function (data){
								var regresado = data;
								id_llamada = data.ultima_llamada[0].idLlamada;
								id_pedido = data.ultimo_pedido[0].idPedido;
							}
						});
		    			window.location.replace("<?php echo base_url();?>index.php/app/levanta_pedido/"+ id_cliente + "/" + id_llamada + "/" + id_pedido);
		    		});
		    		$('#buscador_agenda').keypress(function(){
		    			var buscando = $('#buscador_agenda')[0].value;
		    			var clientes = $('.cliente');
		    			clientes.each(function(){
		    				var nombre = $(this).find('.nombre_cliente').text();
		    				console.log(buscando)
		    				console.log(nombre.indexOf(buscando));
		    				if(nombre.indexOf(buscando) == -1){
		    					$(this).css('display', 'none');
		    				}else{
		    					$(this).css('display', 'block');
		    				}
		    			});
		    		});
					$('.buton_contestar').click(function(){
						$(this).css('display', 'none');
						$('.buton_llamar').css('display', 'block');
						$('.buton_espera').css('display', 'block');
						$('.buton_registrar').css('display', 'block');
				});
				$('.buton_registrar').click(function(){
					$('#registrocliente').css('display', 'block');
				});
				$('#cerrar').click(function(){
					$(this).parent().parent().css('display', 'none');
				});
				$("#fechaDeNacimiento").datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true, yearRange: '1900:2020' });
				$('#enviar').click(function (){
					var action = $('#formulario_registro_cliente')[0].action;
					var method = $('#formulario_registro_cliente')[0].method;
					var data = $('#formulario_registro_cliente').serialize();
					var id_cliente = "";
					var id_pedido = "";
					var id_llamada = "";
					
					console.log(action);
					console.log(method);
					console.log(data);
					
					$.ajax({
						type: method,
						url: action,
						data: data,
						dataType: "json",
						async: false,
						success: function(data){
							var d = data;
							id_cliente = data[0].idCliente;
						}
					});
					
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>index.php/app/ajax_inicia_llamada",
						data: "id_cliente="+id_cliente,
						dataType: "json",
						async: false,
						success: function (data){
							var regresado = data;
							id_llamada = data.ultima_llamada[0].idLlamada;
							id_pedido = data.ultimo_pedido[0].idPedido;
						}
					});
					window.location.replace("<?php echo base_url();?>index.php/app/levanta_pedido/"+ id_cliente + "/" + id_llamada + "/" + id_pedido);

					$(this).parent().parent().css('display', 'none');
				});
		
    	});
    </script>
    <style type="text/css">
    	*{
    		margin: 0;
    		padding: 0;
    	}
    	#agenda{
    		position:relative;
    		margin: 0 auto 0 auto;
    		top: 200px;
    		width: 800px;
    		height: 500px;
    		border: 3px solid black;
    		overflow-x:hidden;
    		overflow-y: auto;
    		-moz-border-radius: 15px;
    	}
    	.cliente{
    		position: relative;
    		float: left;
    		width: 100%;
    		height: 100px;
    		background-color:#A19B91;
    		top: 30px;
    		-moz-border-radius: 5px;
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
    		background-color:#008000;
    		color:#FFFFFF;
    	}
    	#buscador_agenda{
    		position:absolute;
    		top: 0px;
    		left: 0px;
    		font-size: 100%;
    		height: 30px;
    		width: 100%;
    	}
			#header{
				position:relative;
				top: 0px;
				left: 0px;
				height: 200px;
				width: 100%;
				background: -moz-linear-gradient(bottom, rgb(0,0,0) 0%, rgb(230,23,23) 67%);
			}
			#header img{
				position: absolute;
				top: 50px;
				left: 50px;
			}    		
			#registrocliente{
				border: 1px solid black;
				background-color: white;
				width:400px;
				-moz-border-radius: 10px;
				display: none;
				position: absolute;
				top: 100px;
				left: 40%;
				z-index: 1001;
				padding: 20px;
			}
			#registrocliente input{
				width: 100%;
			}
			#llamada{
				position: absolute;
				width: 60%;
				height: 150px;
				top: 50px;
				left: 20%;
				border: 1px solid black;
				margin: 0 auto 0 auto;
			}
			.cliente{
	    		position: relative;
    			background-color:#A19B91;
    			-moz-border-radius: 5px;
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
	    		display: block;
	    	}
	    	.buton_registrar{
	    		position: absolute;
	    		top: 65px;
	    		right: 15px;
	    		background-color:#710909;
	    		color:#FFFFFF;
	    		display: block;
	    	}
    </style>		
    </head>
    <body>
		<div id="header">
			<img src="<?php echo base_url();?>Misc/g3082.png" width="200px" />
		</div>
        <div id="agenda">
        	<input type="text" name="query_buscador" id="buscador_agenda" />
        	<?php
        		foreach ($clientes as $cliente) {
        			echo '
        				<div class="cliente">
        					<span class="nombre_cliente">'.$cliente->nombre.' '.$cliente->apellidoPaterno.' '.$cliente->apellidoMaterno.'</span>
        					<span class="telefono_cliente">'.$cliente->numeroTelefonico.'</span>
        					<input type="hidden" name="id_cliente" id="idCliente" value="'.$cliente->idCliente.'" />
        					<button class="buton_llamar" >Llamar</button>
        				</div>';
				}
        	?>
        </div>
        <div style="width: 100%; height: 100%;background-color: black; display: block;position: absolute; top: 0px; left: 0px; opacity: .9;" ></div>
		<div id="llamada" class="cliente">
			<span class="nombre_cliente">Numero desconocido</span>
				        	<span class="telefono_cliente">555 12 34 56</span>
							<button class="buton_contestar">Contestar</button>
				       		<button class="buton_llamar">Colgar</button>
				        	<button class="buton_espera">Poner en espera</button>
							<button class="buton_registrar">Regitrar cliente</button>
						</div>
						
		<div id="registrocliente">
			<form action="<?php echo base_url();?>index.php/app/ajax_pone_cliente" id="formulario_registro_cliente" method="post">
				<label>Nombre: </label><br />
				<input type="text" name="nombre" /><br />
				<label>Apellido Materno: </label><br />
				<input type="text" name="apellidoMaterno" /><br />
				<label>Apellido Paterno: </label><br />
				<input type="text" name="apellidoPaterno"/><br />
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
				<input type="text" id="fechaDeNacimiento" name="fechaDeNacimiento" /><br />
				<label>Genero: </label><br />
				<input type="text" name="genero" /><br />
				<label>Lada: </label><br />
				<select name="Lada_idLada">
					<?php 
						foreach ($ladas as $lada) {
							echo '<option value="'.$lada->idLada.'">'.$lada->lada.'</option>';
						}
					?>
				</select><br />
				<label>Estado civil: </label><br />
				<select name="EstadoCivil_idEstado">
					<?php 
						foreach ($estados as $estado) {
							echo '<option value="'.$estado->idEstado.'">'.$estado->estadoCivil.'</option>';
						}
					?>
				</select><br />
				<input type="button" id="enviar" value="Enviar"/>
				<input type="button" id="cerrar" value="cerrar"/>
			</form>
		</div>
    </body>
</html>
