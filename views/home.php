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
    <?php include_once './views/partials/header.php'; ?>
    <main class="container-fluid container-image-main d-flex justify-content-center">
      <video src="https://occ-0-2612-3933.1.nflxso.net/so/soa6/420/1834751395176401921.mp4?v=1&amp;e=1748429250&amp;t=Upe3eGdm0Xrs8KenfjfEUv4T1jE" class="default-ltr-cache-1uvi23e" autoplay muted playsinline></video>
      <div class="row text-center align-self-center content-main">
        <h1 class="">STRANGER <br>THINGS</h1><br>
        <p class="text-white">Encuentra toda la información relacionada a la serie de Netflix Stranger Things</p>
      </div>
    </main>
    <section class="container">
        <article class="row mt-4">
          <div class="col-4">
            <img src="./assets/images/fondo.jpg" alt="" class="w-100 rounded">
          </div>
          <div class="col-7">
              <h3 class="col-12 text-white">STRANGER THINGS</h3>
              <div>
                <span class="badge rounded-pill bg-dark">2022</span>
                <span class="badge rounded-pill bg-dark">4 Temporadas</span>
                <span class="badge rounded-pill bg-dark">16+</span>
                <span class="badge rounded-pill bg-dark">Sci-fi</span>
              </div>
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
    <section class="container">
        <article class="row my-4">
            <h3 class="col-12">PROYECTO</h3>
            <p>Este proyecto pretende realizar el desarrollo de una aplicación que permitirá mostrar la información de los protagonistas de la serie de Netflix Stranger Things con el fin de dar a conocer a los fans una recopilación de todos los que forman parte de dicha serie. Para el desarrollo de este proyecto se crea un modelo que nos permite conocer la arquitectura de nuestro proyecto y guiándonos por esta misma, se realiza la instalación y configuración de nuestro servidor usando una maquina virtual manejada con el sistema operativo Linux Ubuntu. Una vez configurada la maquina virtual se realiza la instalación de MySQL y PHP MyAdmin para poder realizar el manejo de nuestra base de datos.</p>
            <img src="./assets/images/fondo2.jpg" alt="">
        </article>
    </section>
    <?php include_once './views/partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>