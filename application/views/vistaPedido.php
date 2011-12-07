<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>vistaPedido</title>
		<meta name="author" content="Luis Carlos González Hernández" />
		<script src="<?php echo base_url();?>Misc/js/jquery-1.6.2.min.js"></script>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			#tabla_pedido{
				position: relative;
				margin: 0 auto 0 auto;
				border-collapse: collapse;
				border-spacing: 0px 0px;
				table-layout: auto;
				width: 70%;
			}
			.informacion_producto{
				width: 700px;
				height: 200px;
				border-right: 0px;
				position:relative;
			}
			.informacion_producto_celda{
				width: 70%;
				height:30%;
				left: 150px;
				top: -40px;
				position:relative;
			}
			.boton_eliminar{
				position:relative;
				top: -30px;
				left: 150px;
			}
			.imagen_producto{
				position:relative;
				top: 50px;
				left: -150px;
			}
			.nombre_producto{
				position:relative;
				top: -60px;
				left: 10px;
			}
			#subtotal{
				text-align: center;
			}
			#iva{
				text-align: center;
			}
			#total{
				text-align: center;
			}
			#metodopago{
				border: 1px solid black;
				padding: 10px;
				background-color: white;
				max-width: 300px;
				position: absolute;
				top: 150px;
				left: 50%;
				margin: 0 auto 0 auto;
				display: none;
			}
			#tajetadecredito{
				display: none;
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
		<script language="JavaScript" type="text/javascript">
			$(document).ready(function (){
				$('#metodo').change(function(){
					var tipodepago = $(this).val();
					if(tipodepago == "0"){
						$('#tajetadecredito').css('display', 'block');
					}else{
						$('#tajetadecredito').css('display', 'none');
					}
				});
				$('#cerrar').click(function(){
					$(this).parent().parent().css('display', 'none');
				});
				$('#formas').click(function(){
					$('#metodopago').css('display', 'block');
				});
				$('#enviar').click(function (){
					window.location.replace("<?php echo base_url();?>index.php/app/");
				});
				$('#eliminar').click(function (){
					var id_cliente = $(this).prev().val();
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>index.php/app/ajax_elimina_producto",
						data: "id_productio="+id_cliente,
						dataType: "json",
						async: false,
						success: function (data){
							window.location.replace("<?php echo base_url();?>index.php/app/pedido/<?php $this->uri->segment(3)?>");
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div id="header">
			<img src="<?php echo base_url();?>Misc/g3082.png" width="200px" />
		</div>
		<form action="algodeprueba" method="post">
			<table border=1 id="tabla_pedido" summary="Muestra la informacion del pedido">
				<thead>
					<tr>
						<td colspan="2">Pedido:</td>
					</tr>
				</thead>
				<tbody>
						
					<?php
						foreach ($pedidos as $pedido) {
							echo '	<tr>
							<td class="informacion_producto">
								<b class="nombre_producto">'.$pedido->nombre.'</b>
								<img src="'.base_url().'Misc/'.$pedido->foto.'"  width="100px" height="100px" class="imagen_producto" alt="Imagen del producto"/>
								<p class="informacion_producto_celda">'.$pedido->descripcion.'</p>
								<input type="hidden" name="eliminar" value="'.$pedido->descripcion.'" />
								<input type="submit" id="eliminar" class="boton_eliminar" value="Eliminar" />
								<input type="hidden" value="id_producto" name="id_pedido"/>
							</td>
							<td>
								<span>$'.$pedido->precio.'</span>
							</td>
						</tr>';
						}
					?>
				</tbody>
				<tfoot>
					<tr>
						<td rowspan="3" colspan="2">
							<input type="button" id="formas" value="Formas de pago" />
						</td>
						<td id="subtotal">
							Subtotal: <?php echo $totales[0]->subtotal ?>
						</td>
					</tr>
					<tr>
						<td id="iva">
							Iva: <?php echo $totales[0]->iva ?>
						</td>
					</tr>
					<tr>
						<td id="total">
							Total: <?php echo $totales[0]->total ?>
						</td>
					</tr>
				</tfoot>
			</table>
		</form>	
		<div id="metodopago">
			<form action="algo" method="post">
				<select name="metodo" id="metodo">
					<option value="1">Contra entrega</option>
					<option value="0">Tarjeta de credito</option>
				</select>
				<div id="tajetadecredito">
					<label for="nombre">Nombre: </label><br />
					<input name="nombre" type="text" id="nombre" /><br />
					<label for="direccion">Direccion: </label><br />
					<textarea name="direccion" id="direccion"></textarea><br />
					<label for="numerodetarjeta">Numero de tarjeta:</label><br />
					<input type="text" name="numerotarjeta" id="numerodetarjeta" /><br />
					<label for="codigo">Codigo:</label><br />
					<input type="text" name="codigo" id="codigo" /><br />
				</div><br />
				<input type="button" id="enviar" value="enviar" />
				<input type="button" id="cerrar" value="cerrar" id="cerrar"/>
			</form>
		</div>
	</body>
</html>
