<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>StrangerThings</title>
</head>
<body>
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
                    <a class="nav-link active" aria-current="page" href="../">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="personajes.php">Personajes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mounstros.php">Mounstros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Info Serie</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] == "VISITANT" || $_SESSION["rol"] == "ADMIN")){?>
                    <h6 class="text-light me-2"><?php echo $_SESSION["nombre"];?></h6>
                    <a class="btn btn-light btn-sm" aria-current="page" href="../controllers/cerrar_sesion.php?SID=<?php echo $_SESSION["idSession"];?>">SALIR</a>
                  <?php }else{ ?>
                    <a class="btn btn-primary me-2" aria-current="page" href="form-inicio-sesion.php">Iniciar Sesion</a>
                    <a class="btn btn-primary" aria-current="page" href="form-registro.php">Registrarme</a>
                  <?php } ?>
                </form>
              </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid container-image-main d-flex justify-content-center">
        <div class="row text-center align-self-center">
            <h1 class="">STRANGER <br>THINGS</h1><br>
            <h2 class="text-light">INICIO</h2>
        </div>
    </main>
    <section class="container text-light">
        <h2>Lista de personajes</h2>
        <?php
          include_once __DIR__.'/../controllers/main.php';
          $controller = new Controller();

          foreach($controller->mostrar_actores() as $actor){
        ?>
        <article class="row mt-4">
          <div class="col-2 text-center">
            <img src="../assets/images/<?php echo $actor->get_imagen();?>" alt="" class="w-100 rounded">
            <h5>
              <?php echo $actor->get_nombre()." ".$actor->get_apellido();?> 
              <small>(<?php echo $actor->get_personaje();?>)</small>
            </h5>
          </div>
          <div class="col-10">
            <div class="row">
              <div class="d-flex">
                <h5 class="me-3">Edad: <?php echo $actor->get_edad();?></h5>
                <h5 class="me-3">Temporadas: <?php echo $actor->get_numeroTemporadas();?></h5>
                <h5 class="me-3">Genero: <?php echo $actor->get_genero();?></h5>
                <h5 class="me-3">Rol: <?php echo $actor->get_rol();?></h5>
              </div>
              <p class="col-12"><?php echo $actor->get_descripcion();?></p>
            </div>
          </div>
        </article>
        <?php } ?>
    </section>
    <footer class="container-fluid text-light bg-dark py-2">
        <div class="row">
            <p class="col-12 text-center">desarrollado por: Sebastian Pabon Lopez</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>