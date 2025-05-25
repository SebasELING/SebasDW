<?php
    include('conexion.php');

    //capturar variables
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    //nueva instancia
    $datos=new basedatos();
    $resultado=$datos->login($usuario,$clave);
    $array=mysqli_fetch_array($resultado);

    //validar usuario y clave
    if ($array['registros']>=1) {
        session_start();
        $_SESSION['username']=$usuario;
        //dirige a la pagina principal
        header("location:ingreso.php");
    } else {
        echo"Datos incorrectos";
    }
    
?>