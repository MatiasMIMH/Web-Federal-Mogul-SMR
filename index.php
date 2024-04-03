<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/efeed1d9ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css?uuid=<?php echo uniqid();?>">
    <title>Federal Mogul</title>
  </head>
  <body>
    <?php
      include("./header.php")
    ?>
    <div class="cover d-flex justify-content-center align-items-center flex-column">
      <h1>Federal Mogul</h1>
      <p>Mascarillas de calidad</p>
    </div>
    <br>
    <hr class="hrarriba">
    <div class="bloquemascarilla">
        <div class="imagenmascarilla">
            <img src="imagenes/mascarillainicio.png" alt="MascarillaInicio">
        </div>
        <div class="textomascarilla">
            <p>Aquí podrá encontrar mascarillas de calidad a buen precio. Eliga la que más le guste.</p>
            <a href="Tienda.php">
                <button class="botontienda btn btn-lg" type= "button" name="Ver tienda">Ver tienda</button>
            </a>
        </div>

    </div>
    <?php
    include("./footer.php")
    ?>
  </body>
</html>
