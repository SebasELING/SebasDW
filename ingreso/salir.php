<?php
    //cierra la sesion
    session_start();
    session_destroy();
    header("location:index.html");
    exit();

?>