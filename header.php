<header>
  <nav class="navbar navbar-light">
    <a class="navbar-brand" href="http://www.federalmogul.com/es-ES/Paginas/Home.aspx#.XsahbDozbcd">
      <div>
        <img class="logo" alt="Federal Mogul" src="imagenes/logo.png">
      </div>
    </a>
    <div class="botones">
      <a href="index.php">
        <button class="botonesbarra fas fa-home btn btn-outline-dark"></button>
      </a>
      <a href="Tienda.php">
        <button class="botonesbarra fas fa-head-side-mask btn btn-outline-dark"></button>
      </a>
      <a href="Carrito.php">
        <button class="botonesbarra fas fa-shopping-cart btn btn-outline-dark"></button>
      </a>
      <button class="botonesbarra fas fa-user btn btn-outline-dark abrirPopup" id="abrirPopup"></button>
    </div>
    <div class="overlay" id="overlay">
      <div class="popup" id="popup">
        <a href="#" id="cerrarPopup" class="cerrarPopup">
          <i class="fas fa-times"></i>
        </a>
        <p>Inicia sesión con tu nombre de usuario y contraseña</p>
        <form action="">
          <div class="contenedor-inputs">
            <input type="text" placeholder="Nombre de usuario">
            <input type="password" placeholder="Contraseña">
          </div>
          <input type="submit" class="btn btn-secondary submit" value="Iniciar Sesión">
        </form>
      </div>
    </div>
    <script src="./js/popup.js"></script>
  </nav>
</header>