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
    <?php include_once './partials/header.php'; ?>
    <section class="text-light py-2 container-auth">
        <div class="container-form">
          <h2 class="mb-4">Inicio de Sesión</h2>
          <?php if (isset($_GET['mensaje'])) { ?>
            <div class="w-100 border border border-danger rounded p-3 mb-2 text-red"><?php echo $_GET['mensaje']?></div>
          <?php } ?>
          <form action="../controllers/procesar-inicio-sesion.php" class="row g-3" method="POST">
              <div class="col-12">
                  <label for="correo" class="form-label">Correo:</label>
                  <input type="email" class="form-control" id="correo" name="correo">
              </div>
              <div class="col-12">
                  <label for="clave" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="clave" name="clave">
              </div>
              <a href="">¿olvidaste la contraseña?</a>
              <div class="col-12 d-flex justify-content-center flex-column">
                  <button type="submit" class="btn btn-success btn-lg">Iniciar sesión</button>
                  <a href="form-registro.php" class="text-center mt-4">¿No tienes una cuenta? Regístrate</a>
              </div>
          </form>
        </div>
    </section>
    <?php include_once './partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>