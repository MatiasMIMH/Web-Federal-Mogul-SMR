<?php
    $conexion = mysqli_connect("192.168.111.246","root","aesmultimedia","carrito");
    if( isset($_GET['id'])){
        $resultado = $conexion ->query("select * from productos where id=".$_GET['id'])or die($conexion->error);
        if(mysqli_num_rows($resultado) > 0 ){
            $fila = mysqli_fetch_row($resultado);
        }else{
            header("Location: ./Tienda.php");
        }
    }else{
        header("Location: ./Tienda.php");
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
    <div class="tarjetaProducto">
      <h2><?php echo $fila[1] ?></h2>
      <div class="espacioproducto">
        <img src="./imagenes/<?php echo $fila[4] ?>" alt="<?php echo $fila[1] ?>">
            <div class="descripcionProducto">
                <p><?php echo $fila[2] ?>
                    <hr>
                    <div class="precioProducto">
                        <h2><?php echo $fila[3] ?>€</h2>
                    </div>
                </p>
            </div>
                <a href="Carrito.php?id=<?php echo $fila[0] ?>">
                    <button type="button" name="añadir" class="btn btn-secondary">Añadir al carrito</button>
                </a>
            </div>
        </div>
        <?php
            include("./footer.php")
        ?>
    </body>
</html>
