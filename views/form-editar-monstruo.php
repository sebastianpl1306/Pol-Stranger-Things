<?php
include_once __DIR__.'/../controllers/main.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: monstruos.php?mensaje=ID no proporcionado');
    exit;
}

$controller = new Controller();
$monstruo = $controller->mostrar_monstruo($id);

if (!$monstruo->get_id()) {
    header('Location: monstruos.php?mensaje=Monstruo no encontrado');
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
  <title>Modificar Monstruo</title>
</head>
<body>
  <?php include_once './partials/header.php'; ?>

  <div class="shadow-sm py-2 mb-4 bg-black">
    <nav class="container" aria-label="breadcrumb">
      <h2 class="font-titulos text-red">Modificar Monstruo</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item"><a href="./monstruos.php">Monstruos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modificar monstruo</li>
      </ol>
    </nav>
  </div>

  <section class="container bg-black px-4 py-2 text-white">
    <?php if (isset($_GET['mensaje'])) { ?>
      <div class="w-100 border rounded p-3 text-danger"><?php echo $_GET['mensaje']; ?></div>
    <?php } ?>

    <form action="../controllers/procesar-modificar-monstruo.php" class="row g-3 my-4 mb-5" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $monstruo->get_id(); ?>">

      <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($monstruo->get_nombre()); ?>">
      </div>

      <div class="col-md-6">
        <label for="debilidad" class="form-label">Debilidad:</label>
        <input type="text" class="form-control" id="debilidad" name="debilidad" value="<?php echo htmlspecialchars($monstruo->get_debilidad()); ?>">
      </div>

      <div class="col-md-6">
        <label for="aparicion" class="form-label">Aparición:</label>
        <input type="text" class="form-control" id="aparicion" name="aparicion" value="<?php echo htmlspecialchars($monstruo->get_aparicion()); ?>">
      </div>

      <div class="col-md-6">
        <label for="armas" class="form-label">Armas:</label>
        <input type="text" class="form-control" id="armas" name="armas" value="<?php echo htmlspecialchars($monstruo->get_armas()); ?>">
      </div>

      <div class="col-12">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="5"><?php echo htmlspecialchars($monstruo->get_descripcion()); ?></textarea>
      </div>

      <div class="col-md-6">
        <label for="imagen" class="form-label">Imagen (subir para reemplazar):</label>
        <input type="file" class="form-control" id="imagen" name="imagen">
        <?php if ($monstruo->get_imagen()) { ?>
          <img src="../assets/images/<?php echo htmlspecialchars($monstruo->get_imagen()); ?>" alt="Imagen actual" width="100" class="mt-2">
        <?php } ?>
      </div>

      <div class="col-12 mb-4">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="monstruos.php" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </section>

  <?php include_once './partials/footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>