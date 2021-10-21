<?php
    $host="localhost:3307";
    $user="root";
    $pass="";
    $bd="bd_encuesta";
    
    $conexion = new mysqli($host,$user,$pass,$bd);

    // Check connection
    if ($conexion -> connect_errno) {
      echo "Failed to connect to MySQL: " . $conexion -> connect_error;
      exit();
    }
    
?>