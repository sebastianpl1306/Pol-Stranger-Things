<?php
  session_start();
  if(isset($_SESSION["rol"])){
    $nombre = $_SESSION["rol"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
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
                    <a class="nav-link active" aria-current="page" href="./">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="views/personajes.php">Personajes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="views/mounstros.php">Mounstros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Info Serie</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] == "VISITANT" || $_SESSION["rol"] == "ADMIN")){?>
                    <h6 class="text-light me-2"><?php echo $_SESSION["nombre"];?></h6>
                    <a class="btn btn-light btn-sm" aria-current="page" href="controllers/cerrar_sesion.php?SID=<?php echo $_SESSION["idSession"];?>">SALIR</a>
                  <?php }else{ ?>
                    <a class="btn btn-primary me-2" aria-current="page" href="views/form-inicio-sesion.php">Iniciar Sesion</a>
                    <a class="btn btn-primary" aria-current="page" href="views/form-registro.php">Registrarme</a>
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
        <article class="row mt-4">
            <h3 class="col-12">STRANGER THINGS</h3>
            <div class="col-4">
                <img src="./assets/images/fondo.jpg" alt="" class="w-100">
            </div>
            <div class="col-7">
                <p>Stranger Things es una serie de televisión web estadounidense de suspenso y ciencia ficción coproducida y distribuida por Netflix.Escrita y dirigida por los hermanos Matt y Ross Duffer, y producida ejecutivamente por Shawn Levy,se estrenó en la plataforma Netflix el 15 de julio de 2016. La serie recibió críticas positivas por parte de la prensa especializada, que elogió la interpretación, caracterización, ritmo, atmósfera y el claro homenaje al Hollywood de la década de los ochenta, con referencias a películas de Steven Spielberg,Wes Craven, John Carpenter, Stephen King, Rob Reiner y George Lucas, entre otros, incluyendo varias películas, anime y videojuegos.</p><a href="https://es.wikipedia.org/wiki/Stranger_Things">ver mas info</a>
            </div>
        </article>
    </section>
    <section class="container-fluid text-light">
        <article class="row mt-5 bg-dark vh-100 justify-content-md-center">
            <h3 class="col-12 text-center">Trailer</h3>
            <div class="col-10 text-center">
                <iframe class="container-video-trailer" src="https://www.youtube.com/embed/x7Yq9MJUqjY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </article>
    </section>
    <section class="container text-light">
        <article class="row my-4">
            <h3 class="col-12">PROYECTO</h3>
            <p>Este proyecto pretende realizar el desarrollo de una aplicación que permitirá mostrar la información de los protagonistas de la serie de Netflix Stranger Things con el fin de dar a conocer a los fans una recopilación de todos los que forman parte de dicha serie. Para el desarrollo de este proyecto se crea un modelo que nos permite conocer la arquitectura de nuestro proyecto y guiándonos por esta misma, se realiza la instalación y configuración de nuestro servidor usando una maquina virtual manejada con el sistema operativo Linux Ubuntu. Una vez configurada la maquina virtual se realiza la instalación de MySQL y PHP MyAdmin para poder realizar el manejo de nuestra base de datos.</p>
            <img src="./assets/images/fondo2.jpg" alt="">
        </article>
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