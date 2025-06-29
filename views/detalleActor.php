<?php
  require_once __DIR__ . '/../class/Favorito.php';
  session_start();

  // Obtener el ID desde la URL
  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

  if (isset($_SESSION["usuario_id"])) {
    $favorito = new Favorito();
    $favorito->setUsuarioId($_SESSION['usuario_id']);
    $favorito->setActorId($id);
  
    $existe = $favorito->existe();
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
        <h2 class="font-titulos text-red">Detalle personaje</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="./personajes.php">Personajes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detalle personaje</li>
        </ol>
      </nav>
    </div>

    <section class="container h-screen bg-black p-4">
      <article class="row">
        <?php
          include_once __DIR__.'/../controllers/main.php';
          $controller = new Controller();
          $actor = $controller->mostrar_actor($id);
        ?>
        <div class="col-5">
          <img src="../assets/images/<?php echo $actor->get_imagen();?>" alt="" class="img-fluid rounded">
        </div>
        <div class="col-7 p-4">
          <h1 class="font-titulos text-red"><?php echo $actor->get_nombre()." ".$actor->get_apellido();?></h1>
          <p class="h4">(<?php echo $actor->get_personaje();?>)</p>
          <div class="d-flex flex-column my-4">
            <span><strong>Edad:</strong> <?php echo $actor->get_edad();?></span>
            <span><strong>Cantidad de temporadas en las que aparece:</strong> <?php echo $actor->get_numeroTemporadas();?></span>
            <span><strong>Rol del personaje:</strong> <?php echo $actor->get_rol();?></span>
          </div>
          <p><strong>Descripción</strong></p>
          <p><?php echo $actor->get_descripcion();?></p>
        </div>
      </article>

      <div class="row justify-content-between">
        <!-- Botón Añadir a favoritos (solo para usuarios registrados) -->
        <?php if (isset($_SESSION["rol"])) { ?>
          <div class="col-6 d-flex align-items-center">
            <form action="../controllers/procesar-agregar-favorito.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?= $_SESSION['usuario_id'] ?>">
              <input type="hidden" name="actor_id" value="<?php echo $actor->get_id(); ?>">
              <button type="submit" class="btn btn-outline-warning">
                <?= $existe ? '💔 Quitar de Favoritos' : '❤️ Agregar a Favoritos' ?>
              </button>
            </form>
          </div>
        <?php } ?>

        <!-- Botones Editar/Eliminar (solo para admin) -->
        <?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] == "ADMIN")) { ?>
          <div class="col-6 text-end mb-3">
            <form action="../controllers/procesar-eliminar-personaje.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este personaje?');">
              <input type="hidden" name="id" value="<?php echo $actor->get_id(); ?>">
              <a href="./form-editar-personaje.php?id=<?php echo $actor->get_id(); ?>" class="btn btn-warning">Editar</a>
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        <?php } ?>
      </div>
    </section>

    <?php include_once './partials/footer.php'; ?>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/obtenerPersonajes.js"></script>
</body>
</html>
