<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>New Web Project</title>
        <script src="<?php echo base_url();?>Misc/js/jquery-1.6.2.min.js" language="JavaScript" type="text/javascript"></script>
        <script src="<?php echo base_url();?>Misc/js/jquery-ui-1.8.16.custom.min.js" language="JavaScript" type="text/javascript"></script>
		<link href="<?php echo base_url();?>Misc/css/smoothness/jquery-ui-1.8.16.custom.css"  type="text/css" rel="stylesheet"/>
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
    	})
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
    </body>
</html>
