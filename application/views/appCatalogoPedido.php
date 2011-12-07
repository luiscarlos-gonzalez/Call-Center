<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>New Web Project</title>
        <script src="<?php echo base_url();?>Misc/js/jquery-1.6.2.min.js" language="JavaScript" type="text/javascript"></script>
        <script src="<?php echo base_url();?>Misc/js/jquery-ui-1.8.16.custom.min.js" language="JavaScript" type="text/javascript"></script>
		<link href="<?php echo base_url();?>Misc/css/ui-lightness/jquery-ui-1.8.16.custom.css"  type="text/css" rel="stylesheet"/>
		<style type="text/css">
			*{
				margin: 0px;
				padding: 0px;
			}
			body{
				width: 100%;
				height: 100%;
			}
			#app{
				width: 70%;
				height: 900px;
				margin: 0 auto 0 auto;
				border: 1px solid black;
				position: relative;
			}
			#llamada{
				position: relative;
				width: 60%;
				height: 150px;
				top: 0px;
				border: 1px solid black;
				margin: 0 auto 0 auto;
			}
			#catalogo{
				position: relative;
				margin: 0 auto 0 auto;
				width: 80%;
				height: 700px;
				border: 1px solid black;
				overflow-y: auto;
			}
			#carrito{
				position: absolute;
				width: 150px;
				right: 10px;
				top: 10px;
				height: 60px;
				border: 1px solid black;
				-moz-border-radius: 5px;
			}
			.producto{
				margin: 5px;
				background-color:#E0F2BE;
				width: 170px;
				height: 200px;
				float: left;
			}
			#productos{
				position: absolute;
				left: 0px;
				top:0px;
				width: 100%;
				height 100%;
			}
			.cliente{
	    		position: relative;
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
	    	}
	    	.buton_espera{
	    		position: absolute;
	    		top: 65px;
	    		left: 105px;
	    		background-color:#1B75BB;
	    		color:#FFFFFF;
	    	}
	    	.imagen_producto{
	    		position: absolute;
	    		top: 10px;
	    		left: 35px;
	    	}
	    	.nombre_producto{
	    		position: absolute;
	    		top:111px;
	    		left: 8.5px;
	    		width: 90%;
	    		text-align: center;
	    		height: 15%;
	    		font-size: 70%;
	    	}
	    	.descripcion_producto{
	    		position: absolute;
	    		top:140px;
	    		left: 8.5px;
	    		width: 90%;
	    		height: 20%; 
	    		font-size: 70%;
	    	}
	    	#buscador_producto{
				position: relative;
				margin: 0 auto 0 auto;
	    		font-size: 100%;
	    		height: 30px;
				width: 80%;
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
				position: relative;
				width: 60%;
				height: 150px;
				top: 0px;
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
	    		display: block;
	    	}
	    	.buton_espera{
	    		position: absolute;
	    		top: 65px;
	    		left: 105px;
	    		background-color:#1B75BB;
	    		color:#FFFFFF;
	    		display: block;
	    	}
	    	.buton_contestar{
	    		position: absolute;
	    		top: 65px;
	    		left: 15px;
	    		background-color:#710909;
	    		color:#FFFFFF;
	    		display: none;
	    	}
	    	.buton_registrar{
	    		position: absolute;
	    		top: 65px;
	    		right: 15px;
	    		background-color:#710909;
	    		color:#FFFFFF;
	    		display: block;
	    	}
	    	#carrito span{
	    		position: absolute;
	    		margin: 0 auto 0 auto;
	    		top: 10px;
	    		left: 50%;
	    	}
	    	#carrito a{
	    		position: relative;
	    		margin: 0 auto 0 auto;
	    		left: 5px;
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
		</style>
		<script type="text/javascript" language="JavaScript">
			$(document).ready(function(){
				$(".draggable").draggable({revert: true});
				$(".droppable").droppable({
					drop: function(event,  ui){
						var id_producto = ui.draggable[0].lastElementChild.value;
						var id_pedido = $('#id_pedido').val();
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>index.php/app/ajax_pone_producto_pedido",
							data: "Pedido_idPedido="+id_pedido+"&Producto_idProducto=" + id_producto,
							success: function(data){
								var numero = data.numero;
									$('#carrito').find('span').detach();
								$('#carrito').append('<span>'+numero+'</span>');
							},
							dataType: "json"
						});
					}	
				});
				$('#buscador_producto').keypress(function(){
	    			var buscando = $('#buscador_producto')[0].value;
	    			var clientes = $('.producto');
	    			clientes.each(function(){
	    				var nombre = $(this).find('.nombre_producto').text();
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
				});
				$('.buton_llamar').click(function(){
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>index.php/app/ajax_finaliza_llamada",
						data: "id_llamada="+ <?php echo $this->uri->segment(4);?>
					});
					window.location.replace("<?php echo base_url();?>index.php/app/");
				});
				$('.buton_registrar').click(function(){
					$('#registrocliente').css('display', 'block');
				});
				$('#cerrar').click(function(){
					$(this).parent().parent().css('display', 'none');
				});
				$("#fechaDeNacimiento").datepicker({dateFormat: 'yy-mm-dd', changeMonth: true,changeYear: true, yearRange: '1900:2020'});
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
						data: data,
					});
					
					$(this).parent().parent().css('display', 'none');
				});
			});
		</script>
    </head> 
    <body>
		<div id="header">
			<img src="<?php echo base_url();?>Misc/g3082.png" width="200px" />
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
		<input type="hidden" value="<?php echo $this->uri->segment(5);?>" name="id_pedido" id="id_pedido"/>
		<div id="app">
			
			<?php 
				foreach ($clientes as $cliente) {
					echo '
						<div id="llamada" class="cliente">
				        	<span class="nombre_cliente">'.$cliente->nombre.' '.$cliente->apellidoPaterno.' '.$cliente->apellidoMaterno.'</span>
				        	<span class="telefono_cliente">'.$cliente->numeroTelefonico.'</span>
							<button class="buton_contestar">Contestar</button>
				       		<button class="buton_llamar">Colgar</button>
				        	<button class="buton_espera">Poner en espera</button>
							<button class="buton_registrar">Regitrar cliente</button>
							<input type="hidden" name="id_cliente" id="idCliente" value="'.$cliente->idCliente.'" />
						</div>';
				}
			?>
			
			
			<input type="text" name="query_buscador" id="buscador_producto" />
			<div id="catalogo">
				<div id="productos">
					<?php 
						foreach($productos as $producto){
							echo'
								<div class="producto draggable">
									<img src="'.base_url().'Misc/'.$producto->foto.'"  width="100px" height="100px" class="imagen_producto" alt="Imagen del producto"/><br />
									<b class="nombre_producto">'.$producto->nombre.'</b><br />
									<p class="descripcion_producto">'.$producto->descripcion.'</p>
									<input type="hidden" class="id_producto" name="Producto_idProducto" value="'.$producto->idProducto.'" />
								</div>';
							
						}
					?>
				<div id="carrito" class="droppable">
					<a id="boton_carrito" href="<?php echo base_url(); ?>index.php/app/pedido/<?php echo $this->uri->segment(5);?>"><img src="<?php echo base_url();?>Misc/cart.jpg" width="50px" /></a>
				</div>
				
			</div>
		</div>
        
    </body>
</html>