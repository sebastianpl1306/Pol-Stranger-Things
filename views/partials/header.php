<?php
// index.php o config.php
define('BASE_URL', '/Pol-Stranger-Things/');
?>

<header class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/personajes.php">Personajes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/monstruos.php">Monstruos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/temporadas.php">Temporadas</a>
              </li>
            </ul>
            <form class="d-flex">
              <?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] == "VISITANT" || $_SESSION["rol"] == "ADMIN")){?>
                <h6 class="text-light me-2"><?php echo $_SESSION["nombre"];?></h6>
                <a class="btn btn-light btn-sm" aria-current="page" href="<?php echo BASE_URL; ?>controllers/cerrar_sesion.php?SID=<?php echo $_SESSION["idSession"];?>">SALIR</a>
              <?php }else{ ?>
                <a class="btn btn-primary me-2" aria-current="page" href="<?php echo BASE_URL; ?>views/form-inicio-sesion.php">Iniciar Sesion</a>
                <a class="btn btn-primary" aria-current="page" href="<?php echo BASE_URL; ?>views/form-registro.php">Registrarme</a>
              <?php } ?>
            </form>
          </div>
        </div>
    </nav>
</header>