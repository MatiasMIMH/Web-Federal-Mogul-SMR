<?php
$conexion = mysqli_connect("192.168.111.246","root","aesmultimedia","carrito");

if ($conexion -> connect_error) {
    die("No se pudo conectar ");
}

$query = "SELECT * FROM productos ORDER BY id ASC ";

$result = mysqli_query($conexion, $query);

if ($result === false) {
    die("Error en la consulta: ".mysqli_error($conexion));
}

?>

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
    <div class="bloquebusqueda border">
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <input
            class="form-control mr-sm-2"
            type="Buscar"
            placeholder="Buscar"
            aria-label="Buscar"
          />
          <button class="btn btn-outline-success my-2 my-sm-0 fas fa-search" type="submit"></button>
        </form>
      </nav>
    </div>
    <div class="row bloque-tarjetas">

      <?php
      while($row = $result->fetch_array()) {

          $id = $row['id'];
          $name = $row['nombre'];
          $price = $row['precio'];
          $image = $row['imagen'];

      ?>

    <div class="tarjetamascarillas">
        <img src="imagenes/<?php echo $image ?>" alt="<?php echo $name ?>">
        <hr class="hr-masc">
        <div class="contenedor">
            <p><?php echo $name ?></p>
            <br>
        </div>
        <div class="precio">
            <?php echo $price ?>€/ud
        </div>
        <div class="bloque-ver-mas">
            <a href="Producto.php?id=<?php echo $row["id"] ?>">
                <button class="butt-ver-mas" type="button" name="Ver mas">
                    Ver más
                </button>
            </a>
        </div>
    </div>
  <?php } ?>

    </div>
    <?php
      include("./footer.php")
    ?>
  </body>
</html>
