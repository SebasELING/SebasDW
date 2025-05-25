<?php
  	include("conexion.php");

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
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

	<div class="container bg-light margin-top">
        <table class="table table-bordered">
            <!--Encabezado de la tabla-->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CELULAR</th>
					<th>CORREO</th>    
					<th>PRESUPUESTO</th>    
					<th>DESTINO</th>    
					<th>OBSERVACIONES</th>    
					<th>FECHA</th>
					<th>Acción</th>                          
                </tr>
            </thead>

            <!--cuerpo de tabla-->
            <tbody>
                <?php
                    //se crea una instancia
                    $tabla = new basedatos();
                    //se llama a la función leer_tabla() y se guardar en la variable
                    $listado=$tabla->leer_tabla();
                    //se realiza el while y se recorren los registros y se guarda en $row
                    while ($row=mysqli_fetch_object($listado)){
                        //se descomponen los campos de la tabla y se guanda en variables
                        $id=$row->res_id;
                        $nombre=$row->res_nombre;
                        $celular=$row->res_celular;
						$correo=$row->res_correo;
						$presupuesto=$row->res_presupuesto;
						$destino=$row->res_destino;
						$observaciones=$row->res_observaciones;
						$fecha=$row->res_fecha;
                ?>

                <!--SE IMPRIME LAS FILAS Y COLUMNAS CON LOS DATOS DE LA CONSULTA-->
                <tr>
                    <td> <?php echo $id;  ?> </td>
                    <td> <?php echo $nombre;  ?> </td>
                    <td> <?php echo $celular;  ?> </td>
					<td> <?php echo $correo;  ?> </td>
					<td> <?php echo $presupuesto;  ?> </td>
					<td> <?php echo $destino;  ?> </td>
					<td> <?php echo $observaciones;  ?> </td>
					<td> <?php echo $fecha;  ?> </td>
					<td> 
						<a href="eliminar_reserva.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"> <i class="material-icons">&#xE92B;</i>  </a> 
						 
						<a href="actualizar_reserva.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

					</td>

                </tr>

                    <?php
                        }//cierre del ciclo while
                    ?>


            </tbody>


        </table>
		<button class="btn btn-warning" onclick="window.location.href='index.php'">Insertar nuevo</button>

    </div>


  

	
		


</body>
</html>