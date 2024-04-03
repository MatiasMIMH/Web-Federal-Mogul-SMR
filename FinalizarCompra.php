<?php
    session_start();
    if (!isset($_SESSION["carrito"])) {
        header("Location: ./index.php");
    }
    $arreglo = $_SESSION["carrito"];

    $totalFinal = 0.0;
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
    <div class="contenedorTodoFinal">
    <form class="check">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Correo</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="ejemplo123@gmail.com">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Contraseña</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Dirección</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Av. Federal 14 Esc.2 3B">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Dirección 2 (opcional)</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="...">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Ciudad/Municipio</label>
          <input type="text" class="form-control" id="inputCity" placeholder="Madrid">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">Provincia</label>
          <select id="inputState" class="form-control">
            <option selected>Madrid</option>
            <option>Álava</option>
            <option>Albacete</option>
            <option>Alicante</option>
            <option>Almería</option>
            <option>Asturias</option>
            <option>Ávila</option>
            <option>Badajoz</option>
            <option>Barcelona</option>
            <option>Burgos</option>
            <option>Cáceres</option>
            <option>Cádiz</option>
            <option>Cantabria</option>
            <option>Castellón</option>
            <option>Ciudad Real</option>
            <option>Córdoba</option>
            <option>Coruña</option>
            <option>Cuenca</option>
            <option>Girona </option>
            <option>Granada</option>
            <option>Guadalajara</option>
            <option>Guipúzcoa</option>
            <option>Huelva</option>
            <option>Huesca</option>
            <option>Islas Baleares</option>
            <option>Jaén</option>
            <option>León</option>
            <option>Lleida </option>
            <option>Lugo </option>
            <option>Madrid</option>
            <option>Málaga</option>
            <option>Murcia</option>
            <option>Navarra</option>
            <option>Ourense</option>
            <option>Palencia</option>
            <option>Las Palmas</option>
            <option>Pontevedra</option>
            <option>La Rioja</option>
            <option>Salamanca</option>
            <option>Segovia</option>
            <option>Sevilla</option>
            <option>Soria</option>
            <option>Tarragona</option>
            <option>Santa Cruz de Tenerife</option>
            <option>Teruel</option>
            <option>Toledo</option>
            <option>Valencia</option>
            <option>Valladolid</option>
            <option>Vizcaya</option>
            <option>Zamora</option>
            <option>Zaragoza</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Recordar información
          </label>
        </div>
      </div>
      <a href="./index.php">
        <button type="submit" class="btn btn-primary">Finalizar</button>
      </a>
    <a href="./Carrito.php" style="margin-left: 10px">
        <button id = "btnVolver" class="btn btn-primary">Volver al carrito</button>
    </a>

    </form>
    <div class="contenedorTFinal">
    <table class="tablaFinal table table-bordered">
      <tbody>
        <tr class="indiceTablaFinal2">
            <td class="columna35"><b>Producto</b></td>
            <td class="columna35"><b>Nombre</b></td>
            <td class="columna15"><b>Precio /ud</b></td>
            <td class="columna35"><b>Cantidad</b></td>
            <td class="columna15"><b>Precio total</b></td>
        </tr>
        <?php
          $total = 0;
            if(isset($_SESSION["carrito"])) {
              $arregloCarrito = $_SESSION["carrito"];
            for ($i=0; $i <count($arregloCarrito); $i++) {
              $total = $total + ($arregloCarrito[$i]["Precio"] * $arregloCarrito[$i]["Cantidad"]);
         ?>
        <tr class="filaTablaFinal">
          <td class="columna35 imagenTFinal">
            <img src="imagenes/<?php echo $arregloCarrito[$i]["Imagen"] ?>" alt="Image" class="imagenCarrito img-fluid">
          </td>
          <td class="columna35 product-name">
            <p class="nombreFinal"<b><?php echo $arregloCarrito[$i]["Nombre"] ?></b></p>
          </td>
          <td class="columna15"><?php echo $arregloCarrito[$i]["Precio"] ?>€</td>
            <td class="columna15"><?php echo $arregloCarrito[$i]["Cantidad"] ?></td>
          <td class="columna15"><?php $precioTotal = $arregloCarrito[$i]["Precio"] * $arregloCarrito[$i]["Cantidad"];
            echo $precioTotal;
              $totalFinal = $totalFinal + $precioTotal
              ?>€</td>
        </tr>
        <?php } } ?>
        <tr style="text-align: right; font-size: 25px">
            <td colspan="5"><b>Importe total: <?php echo $totalFinal ?>€</b></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
    <?php
      include("./footer.php")
    ?>
  </body>
</html>
