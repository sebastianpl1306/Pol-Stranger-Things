<?php
  session_start();
  if(!isset($_SESSION["rol"]) && $_SESSION["rol"] != "ADMIN"){
    header('Location: '."../views/personajes.php"."?mensaje=No tiene permiso para acceder a esta url");
  }
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
        <h2 class="font-titulos text-red">Agregar monstruo</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="./monstruos.php">Monstruos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Agregar monstruo</li>
        </ol>
      </nav>
    </div>
    <section class="container h-screen bg-black px-4 py-2">
        <?php if (isset($_GET['mensaje'])) { ?>
            <div class="w-100 border rounded p-3"><?php echo $_GET['mensaje']?></div>
        <?php } ?>
        <form action="../controllers/procesar-crear-monstruo.php" class="row g-3 my-4 mb-5" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <label for="nombreMonstruo" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombreMonstruo" name="nombreMonstruo">
            </div>
            <div class="col-12">
                <label for="descripcionMonstruo" class="form-label">Descripción:</label>
                <textarea name="descripcionMonstruo" id="descripcionMonstruo" class="col-12" cols="20" rows="5"></textarea>
            </div>
            <div class="col-12">
                <label for="debilidad" class="form-label">Debilidad:</label>
                <textarea name="debilidad" id="debilidad" class="col-12" cols="20" rows="5"></textarea>
            </div>
            <div class="col-12">
                <label for="primeraAparicion" class="form-label">Primera Aparición:</label>
                <input type="text" class="form-control" id="primeraAparicion" name="primeraAparicion">
            </div>
            <div class="col-12">
                <label for="armas" class="form-label">Armas:</label>
                <textarea name="armas" id="armas" class="col-12" cols="20" rows="5"></textarea>
            </div>
            <div class="col-12">
                <label for="imagenMonstruo" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagenMonstruo" name="imagenMonstruo">
            </div>
            <div class="col-12 mb-4">
                <button type="submit" class="btn btn-secondary">Agregar</button>
            </div>
        </form>
    </section>
    <?php include_once './partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>