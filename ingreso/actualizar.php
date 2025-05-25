<?php
	      $message='';
		  if (isset($_GET['id'])){
				  $id=intval($_GET['id']);
			  } else {
				  header("location:listar.php");
		  }

		  session_start();
		$usuario=$_SESSION['username'];
		if (isset($usuario)) {
		} else {
			header("location:index.html");
		}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Krona+One|Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="img/favicon.png" type="image/png" />

	<title>-Turismo del mundo-</title>
</head>

<body>

	<header>
		<div class="menu-contenedor">
			<img src="img/logotipo.png" width="67px" height="45px">
			<a href="#">Precios</a>
			<a href="#">Promociones</a>
			<a href="#">Tarjeta Gold</a>
			<a href="index.html">Cotizaciones</a>
			<a href="salir.php">Salir</a>
		</div>
	</header>

	<section class="contenedor">
		<div class="contenedor-form">
		
		<?php
			//código para actualizar la tabla proveedores
			include ("conexion.php");
			$reserva= new basedatos();
			//consultar el dato del registro específico por el ID 
			$datos_reserva=$reserva->seleccionar_reserva($id);

			//Se llama en método para actualizar
			if(isset($_POST) && !empty($_POST)){
				//se capturan las variables por el método POST
				$id=intval($_POST['id']);
				$nombre=$_POST['nombre'];
				$celular=$_POST['celular'];
				$email=$_POST['email'];
				$observaciones=$_POST['observaciones'];
				$fecha=$_POST['fecha'];

				//llamar el método de actualizar enviando los parmámetros
				$res = $reserva->actualizar_reserva($id,$nombre,$celular,$email,$fecha,$observaciones);

				//configuración del mensaje
				if($res){
					$message= "Datos actualizados con éxito";
					$class="alert alert-success";
					$datos_reserva=$reserva->seleccionar_reserva($id);
				}else{
					$message="Error al actualizar los datos";
					$class="alert alert-danger";
				}

			
			}// fin IF



		?>
               
      
			<form method="post">
			  <div class="form-group">
			    <label for="nombre">Nombre Completo</label>
			    <!--En es input se carga el ID de la reserva y se esconde la caja de texto -->
				<input type="hidden" name="id" id="id" class='form-control' value="<?php echo $datos_reserva->res_id;?>" >
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $datos_reserva->res_nombre;?>" >
			  </div>

			  <div class="form-group">
			    <label for="celular">Número de celular</label>
			    <input type="text" class="form-control" id="celular" name="celular" required value="<?php echo $datos_reserva->res_celular;?>">
			  </div>

			  <div class="form-group">
			    <label for="email">Correo Electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@example.com" required value="<?php echo $datos_reserva->res_correo;?>">
			  </div>

			  <div class="form-group">
			    <label for="fecha">Fecha del viaje</label>
			    <input type="date" class="form-control" id="fecha" name="fecha"  required value="<?php echo $datos_reserva->res_fecha;?>">
			  </div>

			  <div class="form-group">
			    <label for="Observaciones">Observaciones:</label>
			    <textarea class="form-control" id="observaciones" name="observaciones" rows="2"> <?php echo $datos_reserva->res_observaciones;?> </textarea>
			  </div>

			<!-- Se crea un DIV y se le asigna la clase, y se imprime el mensaje -->
			<div class="<?php echo $class?>">
				<?php 
					echo $message;
				?>
			</div>	


			


			  <center>
			  	<button type="submit" class="btn btn-info">Actualizar Registro</button>
			  	<a class="btn btn-warning" onclick="window.location.href='listar.php'">Listar Registros</a>
			  </center>

			 </form>

		</div>
	</section>

	
		


</body>
</html>