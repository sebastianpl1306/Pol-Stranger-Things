<?php
  session_start();
  if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "ADMIN"){
    header('Location: '."../views/personajes.php"."?mensaje=No tiene permiso para acceder a esta url");
    exit;
  }

  include_once __DIR__.'/../controllers/main.php';

  // Validar ID y cargar datos
  if (!isset($_GET["id"])) {
    header('Location: personajes.php?mensaje=ID no proporcionado');
    exit;
  }

  $id = $_GET["id"];
  $controller = new Controller();
  $personaje = $controller->mostrar_actor($id);

  if (!$personaje) {
    header('Location: personajes.php?mensaje=Personaje no encontrado');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Modificar Personaje</title>
</head>
<body>
  <?php include_once './partials/header.php'; ?>
  <div class="shadow-sm py-2 mb-4 bg-black">
    <nav class="container" aria-label="breadcrumb">
      <h2 class="font-titulos text-red">Modificar Personaje</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item"><a href="./personajes.php">Personajes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modificar personaje</li>
      </ol>
    </nav>
  </div>

  <section class="container bg-black px-4 py-2">
    <?php if (isset($_GET['mensaje'])) { ?>
        <div class="w-100 border rounded p-3 text-danger"><?php echo $_GET['mensaje']; ?></div>
    <?php } ?>
    <form action="../controllers/procesar-editar-personaje.php" class="row g-3 my-4 mb-5" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $personaje->get_id(); ?>">

      <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $personaje->get_nombre(); ?>">
      </div>

      <div class="col-md-6">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $personaje->get_apellido(); ?>">
      </div>

      <div class="col-md-6">
        <label for="edad" class="form-label">Edad:</label>
        <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $personaje->get_edad(); ?>">
      </div>

      <div class="col-md-6">
        <label for="genero" class="form-label">Género:</label>
        <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $personaje->get_genero(); ?>">
      </div>

      <div class="col-md-6">
        <label for="temporadas" class="form-label">Temporadas:</label>
        <input type="text" class="form-control" id="temporadas" name="temporadas" value="<?php echo $personaje->get_numeroTemporadas(); ?>">
      </div>

      <div class="col-md-6">
        <label for="personaje" class="form-label">Personaje:</label>
        <input type="text" class="form-control" id="personaje" name="personaje" value="<?php echo $personaje->get_personaje(); ?>">
      </div>

      <div class="col-12">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="col-12" cols="20" rows="5"><?php echo $personaje->get_descripcion(); ?></textarea>
      </div>

      <div class="col-md-6">
        <label for="rol" class="form-label">Rol:</label>
        <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $personaje->get_rol(); ?>">
      </div>

      <div class="col-md-6">
        <label for="imagen" class="form-label">Imagen (subir para reemplazar):</label>
        <input type="file" class="form-control" id="imagen" name="imagen">
        <?php if ($personaje->get_imagen()) { ?>
          <img src="../assets/images/<?php echo $personaje->get_imagen(); ?>" alt="Imagen actual" width="100" class="mt-2">
        <?php } ?>
      </div>


      <div class="col-12 mb-4">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
  </section>

  <?php include_once './partials/footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>