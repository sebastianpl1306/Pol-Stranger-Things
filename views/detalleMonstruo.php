
<?php 
    session_start();

    // Obtener el ID desde la URL
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
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
    <?php include_once './partials/header.php'; ?>
    <div class="shadow-sm py-2 mb-4 bg-black">
      <nav class="container" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h2 class="font-titulos text-red">Detalle monstruos</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="./monstruos.php">Monstruos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detalle personaje</li>
        </ol>
      </nav>
    </div>
    <section class="container h-screen bg-black p-4">
      <article class="row">
        <?php
          include_once __DIR__.'/../controllers/main.php';
          $controller = new Controller();

          $monstruo = $controller->mostrar_monstruo($id);
        ?>
          <div class="col-5">
            <img src="../assets/images/<?php echo $monstruo->get_imagen();?>" alt="" class="img-fluid rounded">
          </div>
          <div class="col-7 p-4">
            <h1 class="font-titulos text-red"><?php echo $monstruo->get_nombre()?></h1>
            <div class="d-flex flex-column my-4">
              <span><strong>Debilidad:</strong> <?php echo $monstruo->get_debilidad();?></span>
              <span><strong>Armas:</strong> <?php echo $monstruo->get_armas();?></span>
            </div>
            <p><strong>Descripción</strong></p>
            <p><?php echo $monstruo->get_descripcion();?></p>
          </div>
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
    <script src="../assets/js/obtenerPersonajes.js"></script>
</body>
</html>