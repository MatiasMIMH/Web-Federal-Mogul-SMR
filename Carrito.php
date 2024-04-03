<?php
    include"conexion.php";
    $conexion = conexion();
    session_start();

  if(isset($_SESSION["carrito"])){
    if(isset($_GET["id"])){
      $arreglo = $_SESSION["carrito"];
      $encontro = false;
      $numero = 0;
      for ($i=0; $i <count($arreglo); $i++) {
        if($arreglo[$i]["Id"] == $_GET["id"]) {
          $encontro = true;
          $numero = $i;
        }
      }
      if ($encontro == true) {
        $arreglo[$numero]["Cantidad"] = $arreglo[$numero]["Cantidad"] + 1;
        $_SESSION["carrito"] = $arreglo;
      }else {
        $nombre = "";
        $precio = "";
        $total = $precio * $arreglo[$numero]["Cantidad"];
        $imagen = "";
        $res = $conexion -> query("select * from productos where id =".$_GET["id"])or die($conexion -> error);
        $fila = mysqli_fetch_row($res);
        $nombre = $fila["1"];
        $precio = $fila["3"];
        $imagen = $fila["4"];
        $total = $fila["5"];
        $arregloNuevo = array(
            "Id" => $_GET["id"],
            "Nombre" => $nombre,
            "Precio" => $precio,
            "Imagen" => $imagen,
            "Cantidad" => 1,
            "Total" => $total
        );
        array_push($arreglo, $arregloNuevo);
        $_SESSION["carrito"] = $arreglo;
      }
    }
  }else{
    if(isset($_GET["id"])){
      $nombre = "";
      $precio = "";
      $imagen = "";
      $res = $conexion -> query("select * from productos where id =".$_GET["id"])or die($conexion -> error);
      $fila = mysqli_fetch_row($res);
      $nombre = $fila["1"];
      $precio = $fila["3"];
      $imagen = $fila["4"];
      $total = $fila["5"];
      $arreglo[] = array(
        "Id" => $_GET["id"],
        "Nombre" => $nombre,
        "Precio" => $precio,
        "Imagen" => $imagen,
        "Cantidad" => 1,
        "Total" => $total
      );
      $_SESSION["carrito"] = $arreglo;
    }
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
    <div class="tituloCarrito">
      <h2>Mi carrito</h2>
    </div>
    <hr>
    <table class="tabla table table-bordered">
      <tbody>
        <?php
          $total = 0;
            if(isset($_SESSION["carrito"])) {
              $arregloCarrito = $_SESSION["carrito"];
            for ($i=0; $i <count($arregloCarrito); $i++) {
              $total = $total + ($arregloCarrito[$i]["Precio"] * $arregloCarrito[$i]["Cantidad"]);
         ?>
        <tr class="filaTabla">
          <td class="product-thumbnail">
            <img src="imagenes/<?php echo $arregloCarrito[$i]["Imagen"] ?>" alt="Image" class="imagenCarrito img-fluid">
          </td>
          <td class="product-name">
            <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]["Nombre"] ?></h2>
          </td>
          <td><?php echo $arregloCarrito[$i]["Precio"] ?>€</td>
          <td>
            <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="<?php echo $arregloCarrito[$i]["Cantidad"] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
          </td>
          <td><?php echo $arregloCarrito[$i]["Precio"] * $arregloCarrito[$i]["Cantidad"] ?>€</td>
          <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arregloCarrito[$i]["Id"];?>">X</a></td>
        </tr>
        <?php } } ?>
      </tbody>
    </table>
      <div class="seguirCompra">
        <a href="./Tienda.php">
          <button class="btn btn-secondary" type="button" name="seguirCompra">Continuar con la compra</button>
        </a>
        <div class="cuadroTotal">
          Total: <?php echo $total ?>€
        </div>
        <a href="./Carrito.php">
          <button class="btn btn-secondary" type="button" name="actualizarCarrito">Actualizar carrito</button>
        </a>
        <a href="./FinalizarCompra.php">
          <button class="btn btn-dark finalizarCompra" type="button" name="finalizar">Finalizar compra</button>
        </a>
      </div>
    <?php
    include("./footer.php")
    ?>
    <script>
      $(document).ready(function(){
        $(".btnEliminar").click(function(event){
          event.preventDefault();
          var id = $(this).data("id");
          var boton = $(this)
          $.ajax({
            method:"POST",
            url:"./EliminarCarrito.php",
            data:{
              id:id
            }
        }).done(function(respuesta){
          boton.parent("td").parent("tr").remove();
        });
      });
    });
    </script>
  </body>
</html>
