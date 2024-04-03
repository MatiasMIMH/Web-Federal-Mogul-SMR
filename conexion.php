<?php
  function conexion() {
    $servidor = "192.168.111.246";
    $nombreBd = "carrito";
    $usuario = "root";
    $pass = "aesmultimedia";
    $conexion = mysqli_connect($servidor,$usuario,$pass,$nombreBd);

    if ($conexion -> connect_error) {
      die("No se pudo conectar ");
    }

    return $conexion;

  }

?>
